<?php

use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\Gallery;
use App\Models\Tour;
use Faker\Core\Number;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Client
Route::get('/', function () {
    return view('client/home');
});
Route::view('/danh-muc', 'client/category');
//Admin
Route::get('/admin/home', function () {
    return view('/admin/home/index');
})->name('admin.home');
/* category*/
/*
    show
    create
    store
    edit
    update
    delete
*/
// show 
Route::get('admin/category', function () {
    $listCate = DB::table('categories')->get();
    return view('/admin/category/index', ['data' => $listCate]);
})->name('admin.category.show');

// create
Route::get('admin/category/create', [CategoryController::class, 'create'])
    ->name('admin.category.create');
//store
Route::post('admin/category', function () {
    $data = request()->except('_token');
    $img = $_FILES['image'];
    $img_url = config('global.APP_URL_IMG') . uniqid() . "-" . $img['name'];
    move_uploaded_file($img['tmp_name'], $img_url);
    $data['image'] = $img_url;
    Category::create($data);
    return redirect()->route('admin.category.show');
})->name('admin.category.store');

// edit
Route::get('admin/category/edit/{id}', function ($id) {
    $data = DB::table('categories')->find($id);
    return view('admin/category/edit', ['data' => $data]);
})->name('admin.category.edit');

//update
Route::post('admin/category/edit/{id}', function ($id) {
    $data = request()->except('_token');
    if (empty($data['image'])) {
        unset($data['image']);
    } else {
        $img = $_FILES['image'];
        $img_url = config('global.APP_URL_IMG') . uniqid() . "-" . $img['name'];
        move_uploaded_file($img['tmp_name'], $img_url);
        $data['image'] = $img_url;
    }
    $cate = Category::find($id);
    $cate->update($data);
    return redirect()->route('admin.category.show');
})->name('admin.category.update');

//delete
Route::get('admin/category/delete/{id}', function ($id) {
    $cate = Category::find($id);
    $cate->delete();
    return redirect()->route('admin.category.show');
})
    ->name('admin.category.delete');
/*Tour*/
//show
Route::get('/admin/tour', function () {
    $listTours = Tour::all();
    $listPictures = Gallery::all();
    foreach ($listTours as $tour) {
        foreach ($listPictures as $pic) {
            if ($tour['id'] == $pic['tour_id']) {
                $tour['image'] = $pic['link_image'];
                break;
            }
        }
    }
    return view('admin/tour/index', ['data' => $listTours]);
})->name('admin.tour.show');
// create
Route::get('admin/tour/create', function () {
    return view('admin/tour/create');
})->name('admin.tour.create');

//store
Route::post('admin/tour', function () {
    $tour = request()->except('_token', 'image');
    $idTour = Tour::create($tour)->id;
    $images = $_FILES['image'];
    for ($i = 0; $i < count($images['name']); $i++) {
        $url_img = config('global.APP_URL_IMG') . uniqid() . "-" . $images['name'][$i];
        if (!move_uploaded_file($images['tmp_name'][$i], $url_img)) {
            echo "Lỗi trong quá trình upload ảnh";
        };
        Gallery::create([
            'link_image' => $url_img,
            'tour_id' => $idTour
        ]);
    }
    return redirect()->route('admin.tour.show');
})->name('admin.tour.store');

// edit
Route::get('admin/tour/edit/{id}', function ($id) {
    $data = Tour::find($id);
    $listCate = Category::all();
    $listImages = Gallery::where('tour_id', $id)->get();
    return view('admin/tour/edit', ['data' => $data, 'dataImage' => $listImages, 'list_cate' => $listCate]);
})->name('admin.tour.edit');

//update
Route::post('admin/tour/edit/{id}', function ($id) {
    $data = request()->except('_token','img_delete','image');
    $listDeleteImage = request()->input('img_delete');
    $tour = Tour::find($id);
    $tour->update($data);
    if(request()->hasFile('image')){
        $listImage = request()->image;
        for($i=0;$i<count($listImage);$i++){
            $newImageName = uniqid() . '-' . request()->name . '.' . $listImage[$i]->extension();
            $listImage[$i]->move(public_path('uploads/images'),$newImageName);
            Gallery::create([
                'link_image'=>"uploads/images/$newImageName",
                'tour_id'=>$id
            ]);
        }
    }
    if (!empty($listDeleteImage)) {
        $stringDeleteImage = trim($listDeleteImage, '-');
        $listDeleteImage = explode('-', $stringDeleteImage);
        foreach ($listDeleteImage as $item) {
            $idImg = (int)$item;
            $gallery = Gallery::find($idImg);
            $gallery->delete();
        }
    }
    return redirect()->route('admin.tour.edit',['id'=>$id]);
})->name('admin.tour.update');

//delete
Route::get('admin/tour/delete/{id}', function ($id) {
    $tour = Tour::find($id);
    $tour->delete();
    return redirect()->route('admin.tour.show');
})->name('admin.tour.delete');

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tour;
use App\Models\Category;
use App\Models\Gallery;
use App\Http\Requests\Admin\Tour\StoreRequest;
use App\Http\Requests\Admin\Tour\StoreEditRequest;
class TourController extends Controller
{
    public function index()
    {
        $listTours = Tour::paginate(4);
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
    }

    public function show()
    {
    }

    public function create()
    {
        $listCate = Category::all();
        return view('admin/tour/create',['listCate'=>$listCate]);
    }

    public function store(StoreRequest $request)
    {
        $tour = $request->except('_token', 'image');
        // dd($tour);
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
        return redirect()->route('admin.tour.index');
    }

    public function edit($id)
    {
        $data = Tour::find($id);
        $listCate = Category::all();
        $listImages = Gallery::where('tour_id', $id)->get();
        return view('admin/tour/edit', ['data' => $data, 'dataImage' => $listImages, 'list_cate' => $listCate]);
    }

    public function update(StoreEditRequest $request, $id)
    {
        $data = $request->except('_token', 'img_delete', 'image');
        $listDeleteImage = $request->input('img_delete');
        $tour = Tour::find($id);
        $tour->update($data);
        if ($request->hasFile('image')) {
            $listImage = $request->image;
            for ($i = 0; $i < count($listImage); $i++) {
                $newImageName = uniqid() . '-' . $request->name . '.' . $listImage[$i]->extension();
                $listImage[$i]->move(public_path(config('global.APP_URL_IMG')), $newImageName);
                Gallery::create([
                    'link_image' => config('global.APP_URL_IMG')."$newImageName",
                    'tour_id' => $id
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
        return redirect()->route('admin.tour.index');
    }

    public function delete($id)
    {
        $tour = Tour::find($id);
        if(!$tour){
            return redirect()->route('admin.tour.index');
        }
        $tour->delete();
        $galleries = Gallery::where('tour_id',$id)->get();
        for($i=0;$i<count($galleries);$i++){
            unlink($galleries[$i]->link_image);
        }
        Gallery::where('tour_id',$id)->delete();
        return redirect()->route('admin.tour.index');
    }
}

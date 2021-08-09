<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\StoreEditRequest;
class CategoryController extends Controller
{
    public function index()
    {
        $listCate = Category::all();
        $listCate->load(['tours']);
        return view('/admin/category/index', ['data' => $listCate]);
    }

    public function show()
    {
    }

    public function create()
    {
        return view('admin/category/create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        if (request()->hasFile('image')) {
            $img = request()->image;
            $img_url = request()->name . "-" . uniqid() . "." . $img->extension();
            $img->move(public_path(config('global.APP_URL_IMG')), $img_url);
            $data['image'] = config('global.APP_URL_IMG') . $img_url;
        }else{
            $data['image']="";
        }
        Category::create($data);
        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        $data = Category::find($id);
        return view('admin/category/edit', ['data' => $data]);
    }

    public function update(StoreEditRequest $request ,$id)
    {
        $data = $request->except('_token');
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
        return redirect()->route('admin.category.index');
    }

    public function delete($id)
    {
        $cate = Category::find($id);
        $cate->delete();
        $tours = Tour::where('category_id',$id);
        $tours->delete();
        return redirect()->route('admin.category.index');
    }
}

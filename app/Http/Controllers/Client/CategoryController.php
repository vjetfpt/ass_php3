<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id){
        $listCate = Category::all();
        $cate = Category::find($id);
        if(!$cate){
            echo "Danh mục không tồn tại" ;
            die();
        }
        $listTour = Tour::where('category_id',$id)->get();
        $listTour->load(['galleries']);
        foreach($listTour as $tour){
            foreach($tour->galleries as $gall){
                $tour->img=$gall['link_image'];
                break;
            }
        }
        return view('client/category',['cate'=>$cate,'listCate'=>$listCate,
                                       'listTour'=>$listTour]);
    }
}

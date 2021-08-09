<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use App\Models\Gallery;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index(){
        $listCate = Category::all();
        if(request()->has('search')){
            $search = request()->input('search');
            $tours = Tour::where('name','LIKE',"%$search%")->paginate(3);
        }else{
            $tours = Tour::paginate(3);
        }
        $listPictures = Gallery::all();
        foreach ($tours as $tour) {
            foreach ($listPictures as $pic) {
                if ($tour['id'] == $pic['tour_id']) {
                    $tour['image'] = $pic['link_image'];
                    break;
                }
            }
        }
        return view('client/tourAll',['listCate'=>$listCate,'tours'=>$tours]);
    }
    public function show(Tour $tour)
    {
        $listCate = Category::all();
        $listTourRelated = Tour::where('category_id', $tour->category_id)
                    ->where('id','<>',$tour->id)->take(5)->get();
        $listTourRelated->load(['galleries']);
        foreach ($listTourRelated as $tourR) {
            foreach ($tourR->galleries as $gall) {
                $tourR->img = $gall['link_image'];
                break;
            }
        }
        return view('client/tour', [
            'listCate' => $listCate, 'tour' => $tour,
            'listTourRelated' => $listTourRelated
        ]);
    }
}

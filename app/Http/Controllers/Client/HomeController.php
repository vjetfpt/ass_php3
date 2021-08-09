<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;
use App\Models\Gallery;
class HomeController extends Controller
{
    public function index(){
        $listCate = Category::all();
        $listCateTake = Category::take(3)->get();
        $listTourTake = Tour::take(8)->get();
        $listPictures = Gallery::all();
        foreach ($listTourTake as $tour) {
            foreach ($listPictures as $pic) {
                if ($tour['id'] == $pic['tour_id']) {
                    $tour['image'] = $pic['link_image'];
                    break;
                }
            }
        }
        return view('client/home',['listCate'=>$listCate,'listTourTake'=>$listTourTake,
                            'listCateTake'=>$listCateTake]);
    }
}

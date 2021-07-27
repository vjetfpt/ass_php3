<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function show(Tour $tour){
        $listCate = Category::all();
        return view('client/tour',['listCate'=>$listCate]);
    }
}

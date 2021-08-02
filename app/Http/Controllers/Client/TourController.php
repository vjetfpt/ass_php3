<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
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

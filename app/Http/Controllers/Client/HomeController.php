<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $listCate = Category::all();
        return view('client/home',['listCate'=>$listCate]);
    }
}

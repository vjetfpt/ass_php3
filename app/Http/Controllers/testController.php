<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function test(){
        $listCate = Category::all();
        $listCate->load(['tours']);
        return view('test')->with('listCate',$listCate);
    }
}

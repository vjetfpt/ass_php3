<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $listOrder = Order::all();
        return view('admin/order/index',['listOrder'=>$listOrder]);
    }
    public function show()
    {
    }

    public function create()
    {
    }

    public function store()
    {
    }

    public function edit()
    {
    }

    public function update()
    {

    }

    public function delete()
    {

    }
}

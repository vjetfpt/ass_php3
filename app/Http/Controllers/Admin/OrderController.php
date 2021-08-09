<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InfoOrderer;
use App\Models\Order;
use App\Models\OrderDetail;
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
    
    public function delete(Order $order)
    {
        $order->delete();
        $details = OrderDetail::where('order_id',$order->id);
        $details->delete();
        $orderer = InfoOrderer::where('id',$order->info_orderer_id);
        $orderer->delete();
        return redirect()->route('admin.order.index');
    }
}

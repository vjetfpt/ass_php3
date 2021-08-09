<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\InfoOrderer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Client\Cart\InfoPayStore;
class CartController extends Controller
{
    // public function __construct()
    // {
    // }
    public function add()
    {
        $request = request()->except('_token');
        $id = $request['tour_id'];
        if (!session()->has('cart')) {
            session(['cart' => [['tour_id' => $id, 'status' => false]]]);
        } else {
            $check = 0;
            $listCart = session()->get('cart');
            foreach ($listCart as $cart) {
                if ($id == $cart['tour_id']) {
                    $check = 1;
                }
            }
            if ($check == 0) {
                session()->push('cart', ['tour_id' => $id, 'status' => 'false']);
            }
        }
        return redirect()->route('client.cart.show');
    }
    public function show()
    {
        // check các tour_id đưa về status false
        if (Session::has('cart')) {
            $listCart = Session::get('cart');
            for ($i = 0; $i < count($listCart); $i++) {
                if ($listCart[$i]['status'] == true) {
                    $listCart[$i]['status'] = false;
                }
            }
            session()->put('cart', $listCart);
            $listCart = Session::get('cart');
            $arr_id = array();
            foreach ($listCart as $cart) {
                array_push($arr_id, $cart['tour_id']);
            }
            $listTour = Tour::whereIn('id', $arr_id)->get();
            // lấy ảnh đầu tiên trong gallery
            $listTour->load(['galleries']);
            foreach ($listTour as $tour) {
                foreach ($tour->galleries as $gall) {
                    $tour->img = $gall['link_image'];
                    break;
                }
            }
        }
        else{
            $listTour=null;
        }
        $listCate = Category::all();
        //
        return view('client/cart', ['listCate' => $listCate, 'listTour' => $listTour]);
    }
    public function delete($id)
    {
        $listCart = Session::get('cart');
        $listNewCart = [];
        foreach ($listCart as $cart) {
            if ($cart['tour_id'] == $id) {
                continue;
            }
            array_push($listNewCart, $cart);
        }
        session()->put('cart', $listNewCart);
        if(empty($listNewCart)){
            session()->forget('cart');
        }
        return redirect()->route('client.cart.show');
    }
    public function saveChange()
    {
        $data = request()->except('_token');
        if (!Session::has('cart')) {
            dd("Giỏ hàng đang trống");
        }
        $listCart = Session::get('cart');
        for ($i = 0; $i < count($listCart); $i++) {
            if ($listCart[$i]['tour_id'] == $data['tour_selected']) {
                $listCart[$i]['status'] = true;
                $listCart[$i]['amount_person'] = $data['amount_person'];
                $listCart[$i]['amount_child1'] = $data['amount_child1'];
                $listCart[$i]['amount_child2'] = $data['amount_child2'];
            }
        }
        session()->put('cart', $listCart);
        return redirect()->route('client.cart.pay');
    }
    public function infoPay()
    {
        $listCate = Category::all();
        if (!session()->has('cart')) {
            dd("Không có tour nào được chọn");
        }
        $listCart = Session::get('cart');
        $tourSelected = [];
        foreach ($listCart as $cart) {
            if ($cart['status'] == true) {
                array_push($tourSelected, $cart);
            }
        }
        $tourSelected = $tourSelected[0];
        $infoTour = Tour::find($tourSelected['tour_id']);
        return view('client/pay', [
            'listCate' => $listCate, 'tour' => $infoTour, 'amount_person' => $tourSelected['amount_person'],
            'amount_child1' => $tourSelected['amount_child1'],
            'amount_child2' => $tourSelected['amount_child2']
        ]);
    }
    public function store(InfoPayStore $request)
    {
        $orderer = $request->only(['orderer'])['orderer'];
        $order = $request->only(['order'])['order'];
        $info_person = $request->except('_token', 'orderer', 'order');
        $id_orderer = InfoOrderer::create($orderer)->id;
        $order['info_orderer_id'] = $id_orderer;
        $id_order = Order::create($order)->id;
        foreach ($info_person as $person) {
            $person['order_id'] = $id_order;
            OrderDetail::create($person);
        }
        $listCart = [];
        foreach (Session::get('cart') as $cart){
            if($cart['status']!== true){
                array_push($listCart,$cart);
            }
        }
        session()->put('cart', $listCart);
        return redirect()->route('client.cart.invoice',['order'=>$id_order]);
    }
    public function invoice(Order $order){
        $listCate = Category::all();
        return view('client/invoice',['listCate'=>$listCate,'order'=>$order]);
    }
}

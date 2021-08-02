<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function add()
    {
        $request = request()->except('_token');
        $id = $request['tour_id'];
        if (!session()->has('cart')) {
            session(['cart' => [['tour_id' => $id,'status'=>'false']]]);
        } else {
            $check = 0;
            $listCart = session()->get('cart');
            foreach ($listCart as $cart) {
                if ($id == $cart['tour_id']) {
                    $check = 1;
                }
            }
            if ($check == 0) {
                session()->push('cart', ['tour_id' => $id,'status'=>'false']);
            }
        }
        return redirect()->route('client.cart.show');
    }
    public function show()
    {
        $listCate = Category::all();
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
        //

        return view('client/cart', ['listCate' => $listCate, 'listTour' => $listTour]);
    }
    public function delete($id){
        $listCart = Session::get('cart');
        for($i=0;$i<count($listCart);$i++){
            if($listCart[$i]['tour_id']==$id){
                unset($listCart[$i]);
            }
        }
        session()->put('cart',$listCart);
        return redirect()->route('client.cart.show');
    }
}

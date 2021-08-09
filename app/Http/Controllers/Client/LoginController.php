<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index(){
        $listCate = Category::all();
        return view('client/login',['listCate'=>$listCate]);
    }
    public function store(Request $request){
        $data = $request->only([
            'email',
            'password'
        ]);
        $result= Auth::attempt($data);
        if($result === false){
            session()->flash('error','Sai email hoặc mật khẩu');
            return back();
        }
        return redirect()->route('client.home.index');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('client.home.index');
    }
}

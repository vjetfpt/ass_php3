<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index(){
        return view('admin/login/index');
    }
    public function store(Request $request){
        $data = $request->except('_token');
        $result= Auth::attempt($data);
        if($result === false){
            session()->flash('error','Sai email hoặc mật khẩu');
            return back();
        }
        return redirect()->route('admin.home');
    }
}

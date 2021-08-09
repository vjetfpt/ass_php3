<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        $listCate = Category::all();
        return view('client/register',['listCate'=>$listCate]);
    }
    public function store(){
        $data = request()->except('_token','password_confirmation');
        $data['role']=config('common.role.member');
        $data['password'] = bcrypt($data['password']);
        User::create($data);
        return redirect()->route('client.login');
    }
}

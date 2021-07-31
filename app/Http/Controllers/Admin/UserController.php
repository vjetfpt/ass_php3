<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Http\Requests\Admin\User\StoreEditRequest;

class UserController extends Controller
{
    public function index()
    {
        $listUser = User::all();
        return view('admin/user/index')->with('listUser',$listUser);
    }

    public function show()
    {
    }

    public function create()
    {
        return view('admin/user/create');
    }

    public function store(StoreRequest $request)
    {
        $data = $request->except('_token');
        if(!isset($data)){
            dd("Không tìm thấy dữ liệu");
        }
        $data['password']=bcrypt($data['password']);
        User::create($data);
        return redirect()->route('admin.user.index');
    }

    public function edit(User $user)
    {
        return view('admin/user/edit',['user'=>$user]);
    }

    public function update(StoreEditRequest $request,User $user)
    {
        $data = $request->except('_token');
        if(!isset($data)){
            dd("Không tìm thấy dữ liệu");
        }
        if(empty($data['password'])){
            unset($data['password']);
        }
        else{
            $data['password']=bcrypt($data['password']);
        }
        $user->update($data);
        return redirect()->route('admin.user.index');
    }

    public function delete(User $user)
    {
        if(!isset($user)){
            return redirect()->route('admin.user.index');
        }
        $user->delete();
        return redirect()->route('admin.user.index');
    }
}

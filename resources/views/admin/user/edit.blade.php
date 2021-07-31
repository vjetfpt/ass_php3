@extends('layout/admin/layout')
@section('title','Sửa tài khoản')
@section('content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm tài khoản</h4>
            <form class="forms-sample" method="post" 
                    action="{{route('admin.user.update',['user'=>$user->id])}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">Họ tên</label>
                    <input type="text" class="form-control" name="name" value="{{$user->name}}" 
                           id="exampleInputUsername1" placeholder="Nhập tên">
                    @error('name')
                        <span id="check-name" class="validate-warning">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" value="{{$user->email}}"
                            id="exampleInputEmail1" placeholder="Nhập email">
                    @error('email')
                        <span id="check-name" class="validate-warning">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" value="{{$user->phone}}"
                            id="exampleInputUsername1" placeholder="Nhập số điện thoại">
                    @error('phone')
                        <span id="check-name" class="validate-warning">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" value="{{$user->address}}"
                            id="exampleInputUsername1" placeholder="Nhập địa chỉ">
                    @error('address')
                        <span id="check-name" class="validate-warning">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <b>Phần quyền</b>
                    <label for="inpMember" class="inp-check-radio">
                        <input type="radio" name="role" 
                               value="{{config('common.role.member')}}" id="inpMember"
                               {{$user->role==config('common.role.member')?"checked":""}}/>
                        Khách hàng
                    </label>
                    <label for="inpAdmin2" class="inp-check-radio">
                        <input type="radio" name="role" value="{{config('common.role.admin2')}}" id="inpAdmin2"
                        {{$user->role==config('common.role.admin2')?"checked":""}}/>
                        Công tác viên
                    </label>
                    <label for="inpAdmin" class="inp-check-radio">
                        <input type="radio" name="role" value="{{config('common.role.admin1')}}" id="inpAdmin"
                        {{$user->role==config('common.role.admin1')?"checked":""}}/>
                        Quản trị viên
                    </label>
                    @error('role')
                        <span id="check-name" class="validate-warning">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Mật khẩu">
                </div>
                <div class="form-group">
                    <label for="exampleInputConfirmPassword1">Xác thực mật khẩu</label>
                    <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="Xác thực">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Thay đổi</button>
                <button type="reset" class="btn btn-light">Đặt lại</button>
            </form>
        </div>
    </div>
</div>
@endsection
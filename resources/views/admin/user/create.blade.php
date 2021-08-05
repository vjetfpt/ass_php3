@extends('layout/admin/layout')
@section('title','Thêm tài khoản')
@section('content')
<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Thêm tài khoản</h4>
            <form class="forms-sample" method="post" action="{{route('admin.user.store')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputUsername1">Họ tên</label>
                    <input type="text" class="form-control" name="name" 
                           id="exampleInputUsername1" placeholder="Nhập tên" value="{{old('name')}}" />
                    @error('name')
                        <span id="check-name" class="validate-warning">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="email" 
                            id="exampleInputEmail1" placeholder="Nhập email" value="{{old('email')}}">
                    @error('email')
                        <span id="check-name" class="validate-warning">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" 
                            id="exampleInputUsername1" placeholder="Nhập số điện thoại"
                            value="{{old('phone')}}" />
                    @error('phone')
                        <span id="check-name" class="validate-warning">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputUsername1">Địa chỉ</label>
                    <input type="text" class="form-control" name="address" 
                            id="exampleInputUsername1" placeholder="Nhập địa chỉ"
                            value="{{old('address')}}"/>
                </div>
                <div class="form-group">
                    <b>Phần quyền</b>
                    <label for="inpMember" class="inp-check-radio">
                        <input type="radio" name="role" value="{{config('common.role.member')}}" id="inpMember" checked/>
                        Khách hàng
                    </label>
                    <label for="inpAdmin2" class="inp-check-radio">
                        <input type="radio" name="role" value="{{config('common.role.admin2')}}" id="inpAdmin2"/>
                        Công tác viên
                    </label>
                    <label for="inpAdmin" class="inp-check-radio">
                        <input type="radio" name="role" value="{{config('common.role.admin1')}}" id="inpAdmin"/>
                        Quản trị viên
                    </label>
                    @error('role')
                        <span id="check-name" class="validate-warning">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mật khẩu</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Mật khẩu">
                    @error('password')
                        <span id="check-name" class="validate-warning">{{$message}}</span>
                    @enderror
                </div>
                <!-- <div class="form-group">
                    <label for="exampleInputConfirmPassword1">Xác thực mật khẩu</label>
                    <input type="password" class="form-control" name="password_confirmation"
                            id="exampleInputConfirmPassword1" placeholder="Xác thực">
                    @error('password_confirmation')
                        <span id="check-name" class="validate-warning">{{$message}}</span>
                    @enderror
                </div> -->
                <button type="submit" class="btn btn-primary mr-2">Tạo</button>
                <button type="reset" class="btn btn-light">Đặt lại</button>
            </form>
        </div>
    </div>
</div>
@endsection
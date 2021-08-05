@extends('layout/client/layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="container why-us">
            <h3 class="heading-title">Đăng nhập</h3>
            <div class="row">
                <div id="sidebar-main" class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="well">
                                <h2>Khách hàng mới</h2>
                                <p><strong>Đăng ký</strong></p>
                                <p>Bằng việc tạo tài khoản bạn có thể mua sắm nhanh hơn, theo dõi trạng thái đơn hàng, và
                                    theo dõi đơn hàng mà bạn đã đặt.</p> <a href="register.html" class="btn btn-primary">Tiếp tục</a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="well">
                                <h2>Khách hàng cũ</h2>
                                <p><strong>Tôi là khách hàng cũ</strong></p>
                                <form action="{{route('client.login')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="control-label" for="input-email">Địa chỉ Email</label>
                                        <input type="text" name="email" value="" placeholder="Địa chỉ Email" id="input-email" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="input-password">Mật khẩu</label>
                                        <input type="password" name="password" value="" placeholder="Mật khẩu" id="input-password" class="form-control" />
                                        <a href="#">Quên mật khẩu?</a>
                                    </div>
                                    @if(session()->has('error'))
                                    <p class="text-danger text-align-right">
                                        {{session()->get('error')}}
                                    </p>
                                    @endif
                                    <input type="submit" value="Đăng nhập" class="btn btn-primary" />
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
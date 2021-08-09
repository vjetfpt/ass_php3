@extends('layout/client/layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="container why-us">
            <div class="row">
                <div id="sidebar-main" class="col-sm-12">
                    <h1>Đăng ký tài khoản</h1>
                    <p>Nếu bạn đã đăng ký tài khoản với chúng tôi, vui lòng <a href="login.html">đăng nhập</a>.</p>
                    <form action="{{route('client.register.store')}}" method="post" class="form-horizontal">
                        @csrf
                        <fieldset id="account">
                            <legend>Chi tiết tài khoản</legend>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-firstname">Họ & Tên đệm</label>
                                <div class="col-sm-10">
                                    <input type="text" name="name" value="" placeholder="Họ & Tên đệm" id="input-firstname" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-email">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" value="" placeholder="Email" id="input-email" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-telephone">Điện thoại</label>
                                <div class="col-sm-10">
                                    <input type="tel" name="phone" value="" placeholder="Điện thoại" id="input-telephone" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-address">Địa chỉ</label>
                                <div class="col-sm-10">
                                    <input type="text" name="address" value="" placeholder="Điện thoại" id="input-address" class="form-control" />
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Mật khẩu</legend>
                            <div class="form-group required"> 
                                <label class="col-sm-2 control-label" for="input-password">Mật khẩu</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" value="" placeholder="Mật khẩu" id="input-password" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group required"> 
                                <label class="col-sm-2 control-label" for="input-confirm">Mật khẩu xác nhận</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password_confirmation" value="" placeholder="Mật khẩu xác nhận" id="input-confirm" class="form-control" />
                                </div>
                            </div>
                        </fieldset>
                        <div class="buttons">
                            <div class="pull-right">
                                <input type="submit" value="Đăng ký" class="btn btn-primary" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
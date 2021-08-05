@extends('layout/client/layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="container why-us">
            <h3 class="heading-title">Thông tin tour đã đặt</h3>
            <div class="col-sm-12">
                <div class="row">
                    <div class="order-image col-sm-4">
                        <img src="{{URL($order->tour->galleries[0]->link_image)}}" alt="" width="300">
                    </div>
                    <div class="area-order col-sm-8">
                        <p class="show_info_tour">
                            <span>Tên tour</span> : {{$order->tour->name}}
                        </p class="show_info_tour">
                        <p class="show_info_tour">
                            <span>Số lượng người đi</span> : {{$order->amount_person}}
                        </p>
                        <p class="show_info_tour">
                            <span>Ngày khởi hành</span> : {{$order->departure_time}}
                        </p>
                        <p class="show_info_tour">
                            <span>Tổng tiền phải trả</span> : {{$order->total_price}}
                        </p>
                        <p class="show_info_tour">
                            <span>Phương thức thanh toán</span> : 
                            {{$order->payment_method==config('common.payment_method.money')?"Tiền mặt":"Chuyển khoản"}}
                        </p>
                    </div>
                </div>
                <div class="row">
                    <br/>
                    <h4>Thông tin người đặt</h4>
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Họ tên</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$order->infoOrder->full_name}}</td>
                                    <td>{{$order->infoOrder->phone}}</td>
                                    <td>{{$order->infoOrder->address}}</td>
                                    <td>{{$order->infoOrder->email}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <h4>Thông tin hành khách đi </h4>
                    <div class="col-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Họ tên</th>
                                    <th>Giới tính</th>
                                    <th>Ngày sinh</th>
                                    <th>Giá vé</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->order_details as $od)
                                <tr>
                                    <td>{{$od->full_name}}</td>
                                    <td>{{$od->gender==config('common.male')?"Nam":"Nữ"}}</td>
                                    <td>{{$od->date_of_birth}}</td>
                                    <td>{{$od->fare}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
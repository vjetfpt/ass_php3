@extends('layout/client/layout')
@section('content')
<form action="{{route('client.cart.store')}}" method="post">
    @csrf
    <div class="container">
        <div class="row">
            <div class="container why-us">
                <h3 class="heading-title">Nhập thông tin</h3>
                <div class="row">
                    <div id="content" class="col-sm-12">
                        <div class="row">
                            <div id="checkout_form" class="form-horizontal">
                                <div class="col-sm-8">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">
                                                <i class="fa fa-info-circle" aria-hidden="true"></i> Thông tin liên lạc
                                            </h3>
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group required">
                                                <label class="control-label col-md-2" for="input-firstname">Tên đầy đủ</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="orderer[full_name]" id="input-firstname" value="" placeholder="Ví dụ: Nguyễn Văn A" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="form-group required"> <label class="control-label col-sm-4" for="input-email">Email</label>
                                                        <div class="col-sm-8">
                                                            <input type="email" name="orderer[email]" id="input-email" value="" placeholder="contact@yourdomain.com" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group required"> <label class="control-label col-sm-4" for="input-telephone">Điện thoại</label>
                                                        <div class="col-sm-8"> 
                                                            <input type="text" name="orderer[phone]" id="input-telephone" value="" placeholder="Ví dụ: 01234567890" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-2" for="input-address">Địa chỉ
                                                        </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="orderer[address]" value="" id="input-address" placeholder="Ví dụ: Số 247, Cầu Giấy, Q. Cầu Giấy" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <label class="control-label col-md-2" for="input-zoneid" id="label-zone">Lời nhắn</label>
                                                <div class="col-sm-10">
                                                    <textarea name="orderer[note]" id="input-comment" rows="3" class="form-control" placeholder="Ví dụ: Chuyển hàng ngoài giờ hành chính"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group"> 
                                                <label class="control-label col-md-2" for="input-zoneid" id="label-zone">Thời gian đi</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="order[departure_time]" class="form-control"/>
                                                </div>
                                            </div>
                                            <hr />
                                            @error('orderer')
                                                <p style="color:red;">{{$message}}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i> </strong> Tour đã chọn
                                            </h3>
                                        </div>
                                        <div class="panel-body">
                                            <table class="adr-oms table table_order_items">
                                                <tbody id="orderItem">
                                                    <tr class="group-type-1 item-child-0">
                                                        <td>
                                                            <div class="table_order_items-cell-thumbnail">
                                                                <div class="thumbnail">
                                                                    <a target="_blank" rel="noopener" href="https://etravel.exdomain.net/lac-loi-o-dai-bac-trong-3-ngay-2-dem-ban-muon-thu-khong">
                                                                        <img src="{{URL($tour->galleries[0]->link_image)}}" alt="" width="84" />
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="table_order_items-cell-detail">
                                                                <div class="table_order_items-cell-title">
                                                                    <div class="table_order_items_product_name">
                                                                        <a target="_blank" rel="noopener" href="https://etravel.exdomain.net/lac-loi-o-dai-bac-trong-3-ngay-2-dem-ban-muon-thu-khong" title="Lạc Lối Ở Đài Bắc Trong 3 Ngày 2 Đêm - Bạn Muốn Thử Không?">
                                                                            <span class="title">{{$tour->name}}</span>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="table_order_items-cell-price">
                                                                <div class="tt-price">{{$tour->price}}</div>
                                                                <div class="quantity">x{{$amount_person+$amount_child1+$amount_child2}}</div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <!--khách hàng-->
                            <div class="panel-heading">
                                <h3 class="panel-title">
                                    <div class="adr-oms checkbox">
                                        <label for="request-invoice">Danh sách hành khách <b>{{$amount_person+$amount_child1+$amount_child2}}</b></label>
                                    </div>
                                </h3>
                            </div>
                            <div class="panel-body" id="container-form-invoice">
                                @for($i=0;$i<$amount_person;$i++) <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <p> Họ tên </p>
                                            <input type="text" name="person_info{{$i}}[full_name]" id="" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <p> Giới tính </p>
                                            <select name="person_info{{$i}}[gender]" id="" class="form-control">
                                                <option value="{{config('common.gender.male')}}">Nam</option>
                                                <option value="{{config('common.gender.female')}}">Nữ</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <p> Ngày sinh </p>
                                            <input type="date" name="person_info{{$i}}[date_of_birth]" id="" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <p> Độ tuổi</p>
                                            <input type="text" name="" value="Người lớn" disabled class="form-control" />
                                            <input type="hidden" name="person_info{{$i}}[age]" value="{{config('common.about_age.person')}}">
                                        </div>
                                    </div>
                                    <input type="hidden" name="person_info{{$i}}[fare]" value="{{config('common.tourPrice.person')*$tour->price}}"/>
                            </div>
                            <hr />
                            @endfor
                            @for($i=0;$i<$amount_child1;$i++) <div class="row">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <p> Họ tên </p>
                                        <input type="text" name="child1_info{{$i}}[full_name]" id="" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <p> Giới tính </p>
                                        <select name="child1_info{{$i}}[gender]" id="" class="form-control">
                                            <option value="{{config('common.gender.male')}}">Nam</option>
                                            <option value="{{config('common.gender.female')}}">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <p> Ngày sinh </p>
                                        <input type="date" name="child1_info{{$i}}[date_of_birth]" id="" class="form-control" />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <p> Độ tuổi</p>
                                        <input type="text" name="" id="" value="Trẻ em" disabled class="form-control" />
                                        <input type="hidden" name="child1_info{{$i}}[age]" value="{{config('common.about_age.child1')}}" />
                                    </div>
                                </div>
                                <input type="hidden" name="child1_info{{$i}}[fare]" value="{{config('common.tourPrice.child1')*$tour->price}}"/>
                        </div>
                        <hr />
                        @endfor
                        @for($i=0;$i<$amount_child2;$i++) <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <p> Họ tên </p>
                                    <input type="text" name="child2_info{{$i}}[full_name]" id="" class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <p> Giới tính </p>
                                    <select name="child2_info{{$i}}[gender]" id="" class="form-control">
                                        <option value="{{config('common.gender.male')}}">Nam</option>
                                        <option value="{{config('common.gender.female')}}">Nữ</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <p> Ngày sinh </p>
                                    <input type="date" name="child2_info{{$i}}[date_of_birth]" id="" class="form-control" />
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <p> Độ tuổi</p>
                                    <input type="text" name="" id="" value="Trẻ nhỏ" disabled class="form-control" />
                                    <input type="hidden" name="child2_info{{$i}}[age]" value="{{config('common.about_age.child2')}}"/>
                                </div>
                            </div>
                            <input type="hidden" name="child2_info{{$i}}[fare]" value="{{config('common.tourPrice.child2')*$tour->price}}"/>
                    </div>
                    <hr />
                    @endfor
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"> <i class="fa fa-credit-card" aria-hidden="true"></i>
                                Hình thức thanh toán</h3>
                        </div>
                        <div class="panel-body" id="form_payment_method">
                            <div class="group">
                                <div class="adr-oms radio select-method">
                                    <input type="radio" id="payment-method-bank_transfer" name="order[payment_method]" 
                                    value="{{config('common.payment_method.banking')}}" />
                                    <label for="payment-method-bank_transfer">
                                        <div class="adr-oms payment-method">
                                            <div class="thumbnail">
                                                Chuyển khoản
                                            </div>
                                        </div>
                                    </label>
                                    <div class="payment-method-toggle box-installment installment-disabled" id="payment-method-info-bank_transfer">
                                    </div>
                                </div>
                            </div>
                            <div class="group">
                                <div class="adr-oms radio select-method">
                                    <input type="radio" id="payment-method-cod" name="order[payment_method]" 
                                            value="{{config('common.payment_method.money')}}" checked/>
                                    <label for="payment-method-cod">
                                        <div class="adr-oms payment-method">
                                            <div class="thumbnail"> 
                                                Thu tiền mặt
                                            </div>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- aa -->
        </div>
        <div class="col-sm-6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-default" id="ajax-load-total">
                        <div class="panel-body">
                            <table class="adr-oms table">
                                <tbody class="orderSummary">
                                    <tr class="row-total-amount">
                                        <td class="text-left">Số lượng người đi</td>
                                        <td class="text-right"> <strong class="">{{$amount_person+$amount_child1+$amount_child2}}</strong> </td>
                                    </tr>
                                    <tr class="row-total-amount">
                                        <td class="text-left">{{$amount_person}} x Người lớn </td>
                                        <td class="text-right">
                                            <strong class="piece_price">{{config('common.tourPrice.person')*$amount_person*$tour->price}}</strong>
                                        </td>
                                    </tr>
                                    <tr class="row-total-amount">
                                        <td class="text-left">{{$amount_child1}} x Trẻ em </td>
                                        <td class="text-right">
                                            <strong class="piece_price">{{config('common.tourPrice.child1')*$amount_child1*$tour->price}}</strong>
                                        </td>
                                    </tr>
                                    <tr class="row-total-amount">
                                        <td class="text-left">{{$amount_child2}} x Trẻ nhỏ</td>
                                        <td class="text-right">
                                            <strong class="piece_price">{{config('common.tourPrice.child2')*$amount_child2*$tour->price}}</strong>
                                        </td>
                                    </tr>
                                    <tr class="row-total-amount">
                                        <td class="text-left">Tổng số</td>
                                        <td class="text-right">
                                            <strong class="text-danger" id="total_price"></strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="order[tour_id]" value="{{$tour->id}}">
            <input type="hidden" name="order[total_price]" value="" id="total_price_inp">
            <input type="hidden" name="order[amount_person]" value="{{$amount_person+$amount_child1+$amount_child2}}">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <a class="pull-left" href="https://etravel.exdomain.net/gio-hang" title="Quay lại giỏ hàng">
                            <i class="fa fa-mail-reply-all" aria-hidden="true"></i>
                            Quay lại giỏ hàng </a> 
                            <button class="btn btn-primary pull-right" type="submit" id="submit_form_button">Đặt hàng <i class="fa fa-angle-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
</form>
@endsection
@push('script')
<script>
    let pieces_price = document.querySelectorAll('.piece_price');
    let total_priceStrong = document.querySelector('#total_price');
    let total_priceInp = document.querySelector('#total_price_inp');
    var total_price = 0;
    for (const p of pieces_price) {
        total_price += parseInt(p.textContent);
    }
    // console.log(total_price);
    total_priceStrong.textContent = total_price + " đ";
    total_priceInp.value = total_price;
</script>
@endpush
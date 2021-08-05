@extends('layout/client/layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="container why-us">
            <h3 class="heading-title">Giỏ hàng</h3>
            <div class="row">
                <div class="col-sm-12">
                    <form action="{{route('client.cart.saveChange')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="table-responsive table-cart-content">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td class="text-center"><strong>Ảnh</strong></td>
                                        <td class="text-center"><strong>Tên tour</strong></td>
                                        <td class="text-center"><strong>Giá (1 người đi)</strong></td>
                                        <td class="text-center"><strong>Lựa chọn</strong></td>
                                        <td class="text-center"><strong>Xóa</strong></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @for($i=0;$i<count($listTour);$i++) <tr>
                                        <td class="text-center">
                                            <img src="{{URL($listTour[$i]->img)}}" alt="" width="100" />
                                        </td>
                                        <td class="text-left">
                                            <a href="{{route('client.tour',['tour'=>$listTour[$i]->id])}}">
                                                {{$listTour[$i]->name}}
                                            </a>
                                        </td>
                                        <td class="text-right" style="text-align:center;">
                                            {{$listTour[$i]->price}}
                                        </td>
                                        <td class="text-left">
                                            <div class="input-group btn-block" style="text-align:center;">
                                                <input name="tour_selected" type="radio" value="{{$listTour[$i]->id}}"
                                                        @if($i==count($listTour)-1){{"checked"}}@endif />
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{route('client.cart.delete',['id'=>$listTour[$i]->id])}}">
                                                <button type="button" data-toggle="tooltip" title="Xóa" class="btn btn-danger">
                                                    <i class="fa fa-times-circle"></i>
                                                </button>
                                            </a>
                                        </td>
                                        </tr>
                                        @endfor
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <table class="table-choise-person">
                        <thead>
                            <tr>
                                <th colspan="2"></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Người lớn (> 12 tuổi)</td>
                                <td>
                                    <input type="number" class="form-control person-amount" name="amount_person" value="1" min="1" />
                                </td>
                                <td>100%</td>
                            </tr>
                            <tr>
                                <td>Từ 5- 12 tuổi</td>
                                <td>
                                    <input type="number" class="form-control person-amount" name="amount_child1" value="0" min="0" />
                                </td>
                                <td>70%</td>
                            </tr>
                            <tr>
                                <td>Từ 2-5 tuổi</td>
                                <td>
                                    <input type="number" class="form-control person-amount" name="amount_child2" value="0" min="0" />
                                </td>
                                <td>46%</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-4 col-sm-offset-8">
                    <table class="table table-bordered">
                        <tr>
                            <td class="text-right">Tổng người tham gia:</td>
                            <td class="text-right">
                                <strong id="total-price">1</strong>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="clearfix"></div>
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-6 col-xs-6 col_button_shopping"> <a href="https://etravel.exdomain.net/" class="btn btn-default pull-left button_shopping">Tiếp tục mua hàng</a> </div>
                        <div class="col-sm-6 col-xs-6 col_button_checkout"> 
                            <button type="submit" class="btn btn-primary pull-right button_checkout">Tiến hành thanh toán</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    let personAmount = document.querySelectorAll('.person-amount');
    let totalPriceShow = document.getElementById('total-price');
    for (const p of personAmount) {
        p.addEventListener('change', function() {
            let total = 0;
            for (const p of personAmount) {
                total += parseInt(p.value);
            }
            totalPriceShow.textContent = total;
        })
    }
</script>
@endpush
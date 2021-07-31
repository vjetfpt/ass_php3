@extends('layout/admin/layout')
@section('title','Tour đã đặt')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center">Tour khách đã đặt</h3>
                <br /><br />
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên tour</th>
                                <th>Số lượng đi</th>
                                <th>Tổng giá</th>
                                <th>Người đặt</th>
                                <th>Thông tin người đi</th>
                                <th>Thời gian xuất phát</th>
                                <th colspan="2" class="text-center">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($listOrder as $ord)
                            <tr class="table-info">
                                <td>{{$loop->iteration}}</td>
                                <td>
                                    {{$ord->tour->name}}
                                </td>
                                <td>{{$ord->amount_person}}</td>
                                <td>{{$ord->total_price}}</td>
                                <td>{{$ord->infoOrder->full_name}}</td>
                                <td><a href="#">Xem</a></td>
                                <td>{{$ord->departure_time}}</td>
                            </tr>
                            @empty
                            <p>Không tìm thấy bản ghi nào</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
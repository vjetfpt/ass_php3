@extends('layout/admin/layout')
@section('title','Danh sách tour')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('admin.tour.create')}}">
                    <button type="button" class="btn btn-outline-primary btn-fw">Thêm mới</button>
                </a>
                <br /><br />
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Tên tour</th>
                                <th>Ảnh</th>
                                <th>Nơi khởi hành</th>
                                <th>Thời gian</th>
                                <th>Giá</th>
                                <th colspan="2" class="text-center">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td style="width:250px;">{{$item->name}}</td>
                                <td style="width:250px;">
                                    <img src="{{config('global.APP_URL').$item->image}}" alt="Không hiển thị được ảnh">
                                </td>
                                <td style="width:200px;">{{$item->departure_place}}</td>
                                <td style="width:50px;">{{$item->travel_day}} ngày</td>
                                <td>{{$item->price}}</td>
                                <td class="text-center" style="width: 200px;">
                                    <a class="text-decoration-none" href="{{route('admin.tour.edit',['id'=>$item->id])}}">
                                        <button type="button" class="btn btn-warning">Sửa</button>
                                    </a>
                                    <a class="text-decoration-none" href="{{route('admin.tour.delete',['id'=>$item->id])}}"
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                        <button type="button" class="btn btn-danger ml-2">Xóa</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    {{$data->links('vendor.pagination.custome')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
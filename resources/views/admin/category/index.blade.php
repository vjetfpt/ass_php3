@extends('layout/admin/layout')
@section('title','Danh sách danh mục')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('admin.category.create')}}">
                    <button type="button" class="btn btn-outline-primary btn-fw">Thêm mới</button>
                </a>
                <br /><br />
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên danh mục</th>
                                <th>Ảnh</th>
                                <th>Số lượng tour</th>
                                <th colspan="2" class="text-center">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                            <tr>
                                <td style="width:100px;">
                                    {{$item->id}}
                                </td>
                                <td style="width:100;">
                                    {{$item->name}}
                                </td>
                                <td style="width:300px;">
                                    <img src="{{config('global.APP_URL').$item->image}}" alt="" />
                                </td>
                                <td style="width:100;">
                                    {{$item->tours()->count()}}
                                </td>
                                <td class="text-center" style="width:200px;">
                                    <a class="text-decoration-none" href="{{route('admin.category.edit',['id'=>$item->id])}}">
                                        <button type="button" class="btn btn-warning">Sửa</button>
                                    </a>
                                    <a class="text-decoration-none" href="{{route('admin.category.delete',['id'=>$item->id])}}" 
                                        onclick="return confirm('Bạn chắc chắn muốn xóa không')">
                                        <button type="button" class="btn btn-danger ml-2">Xóa</button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
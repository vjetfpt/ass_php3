@extends('layout/admin/layout')
@section('title','Danh sách danh mục')
@section('content')
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <a href="{{route('admin.user.create')}}">
                    <button type="button" class="btn btn-outline-primary btn-fw">Thêm mới</button>
                </a>
                <br /><br />
                <div class="table-striped">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên tài khoản</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th colspan="2" class="text-center">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($listUser as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->address}}</td>
                                <td class="text-center" style="width:200px;">
                                    <a class="text-decoration-none" href="{{route('admin.user.edit',['user'=>$user->id])}}">
                                        <button type="button" class="btn btn-warning">Sửa</button>
                                    </a>
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirm_delete_{{$user->id}}">Xóa</button>
                                    <div class="modal fade" id="confirm_delete_{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Thông báo</h5>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn muốn xóa bản ghi này?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                                    <form method="POST" action="{{route('admin.user.delete',['user'=>$user->id])}}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <p>Hiện chưa có bản ghi nào</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    {{$listUser->links('vendor.pagination.custome')}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
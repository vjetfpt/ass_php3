@extends('layout/admin/layout')
@section('title','Sửa danh mục')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm danh mục</h4>
                <form class="forms-sample" action="{{route('admin.category.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Tên danh mục</label>
                        <input type="text" name="name" class="form-control" 
                               value="@if(!empty(old('name'))){{old('name')}}@else{{$data->name}}@endif" 
                               id="exampleInputName1" placeholder="Tên danh mục">
                        @error('name')
                        <span id="check-name" class="validate-warning">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <div class="area-image">
                            <img src="{{URL($data->image)}}" alt="Chưa có ảnh" />
                        </div>
                        <input type="file" name="image" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-inverse-success btn-fw" type="button">Tải lên</button>
                            </span>
                        </div>
                        @error('image')
                        <span id="check-name" class="validate-warning">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <button type="submit" class="btn btn-primary mr-2">Thêm mới</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
</script>
@endsection
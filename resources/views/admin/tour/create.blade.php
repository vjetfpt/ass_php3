@extends('layout/admin/layout')
@section('title','Thêm tour mới')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Tạo tour mới</h4>
                <form class="forms-sample" method="POST" action="{{route('admin.tour.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Tên tour</label>
                        <input type="text" name="name" class="form-control" 
                               id="exampleInputName1" placeholder="Nhập tên tour" value="{{old('name')}}">
                        @error('name')
                        <span id="check-name" class="validate-warning">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <label for="inpTravelDay">Nhập số ngày đi</label>
                                <input type="number" class="form-control" name="travel_day" id="inpTravelDay" 
                                       value="@if(old('travel_day')){{old('travel_day')}}@else{{3}}@endif" />
                                @error('travel_day')
                                    <span id="check-name" class="validate-warning">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="inpPrice">Giá</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-danger text-white">VND</span>
                                    </div>
                                    <input type="number" class="form-control" name="price" id="inpPrice" 
                                           value="@if(old('price')){{old('price')}}@else{{1000000}}@endif" />
                                    <div class="input-group-append">
                                        <span class="input-group-text">triệu</span>
                                    </div>
                                </div>
                                @error('price')
                                    <span id="check-name" class="validate-warning">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-4">
                                <label for="inpCategory">Chọn danh mục</label>
                                <select name="category_id" id="inpCategory" class="form-control">
                                    @foreach($listCate as $cate)
                                    <option value="{{$cate->id}}">{{$cate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Chọn ảnh</label>
                        <input type="file" name="image[]" class="file-upload-default" multiple>
                        <div class="input-group col-xs-12">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        </div>
                        @error('image')
                            <span id="check-name" class="validate-warning">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inpDeparture">Địa điểm xuất phát</label>
                        <input class="form-control" id="inpDeparture" name="departure_place" placeholder="Ví dụ: Hà Nội" value="{{old('departure_place')}}"/>
                        @error('departure_place')
                            <span id="check-name" class="validate-warning">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inpDes"><b>Miêu tả ngắn</b></label>
                        <textarea class="form-control" id="inpDes" name="description" rows="4">{{old('description')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inpSche"><b>Lịch trình</b></label>
                        <textarea class="form-control" id="inpSche" name="schedule" rows="4">{{old('schedule')}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Tạo</button>
                    <button class="btn btn-light" type="reset">Đặt lại</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="/admin/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace('inpDes');
    CKEDITOR.replace('inpSche');
</script>
@endsection
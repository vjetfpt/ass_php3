@extends('layout/admin/layout')
@section('title','Chỉnh sửa tour')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Chỉnh sửa tour</h4>
                <form class="forms-sample" action="{{route('admin.tour.update',['id'=>$data->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputName1">Tên tour</label>
                        <input type="text" class="form-control" id="exampleInputName1" name="name" 
                                placeholder="Nhập tên tour" value="@if(old('name')){{old('name')}}@elseif(old('name',1)==""){{""}}@else{{$data->name}}@endif">
                        @error('name')
                        <span id="check-name" class="validate-warning">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-4">
                                <label for="inpTravelDay">Nhập số ngày đi</label>
                                <input type="number" class="form-control" 
                                        name="travel_day" id="inpTravelDay" value="@if(old('travel_day')){{old('travel_day')}}@elseif(old('travel_day',1)==""){{""}}@else{{$data->travel_day}}@endif" />
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
                                    <input type="number" class="form-control" 
                                            name="price" id="inpPrice" value="@if(old('price')){{old('price')}}@elseif(old('price',1)==""){{""}}@else{{$data->price}}@endif" />
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
                                <select name="category_id" id="inpCategory" class="form-control" name="category_id">
                                    @foreach($list_cate as $cate)
                                    <option value="{{$cate->id}}"
                                        @if(!empty(old('category_id')))
                                        {{old('category_id') == $cate->id ? "selected":" "}}
                                        @else
                                        {{$data->category_id == $cate->id ? "selected":" "}}
                                        @endif>{{$cate->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label><b>Chọn ảnh</b></label>
                        <div class="area-image">
                            @foreach($dataImage as $i)
                            <div style="width:50%;float:left;">
                                <button type="button" class="btn btn-light img-hover" aria-label="Close" value="{{$i->id}}">X</button>
                                <img src="{{URL($i->link_image)}}" alt="Chưa có ảnh" class="img-thumbnail" />
                            </div>
                            @endforeach
                        </div>
                        <input type="file" name="image[]" class="file-upload-default" multiple/>
                        <input type="hidden" name="img_delete" id="img-delete" />
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
                        <label for="inpDeparture"><b>Địa điểm xuất phát</b></label>
                        <input class="form-control" id="inpDeparture" 
                               name="departure_place" placeholder="Ví dụ: Hà Nội" 
                                    value="@if(old('departure_place')){{old('departure_place')}}@elseif(old('departure_place',1)==""){{""}}@else{{$data->departure_place}}@endif"/>
                               @error('departure_place')
                            <span id="check-name" class="validate-warning">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inpDes"><b>Miêu tả ngắn</b></label>
                        <textarea class="form-control" id="inpDes" name="description" rows="4">{{$data->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="inpSche"><b>Lịch trình</b></label>
                        <textarea class="form-control" id="inpSche" name="schedule" rows="4">{{$data->schedule}}</textarea>
                    </div>
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <button type="submit" class="btn btn-primary mr-2">Thay đổi</button>
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
    const imgDelete = document.querySelector('#img-delete');
    const imgHovers = document.querySelectorAll('.img-hover');
    for (const i of imgHovers) {
        i.addEventListener('click', function() {
            if (confirm('Bạn có chắc muốn xóa ảnh này không ?')) {
                i.parentNode.style.display = "none";
                let id = String(i.value);
                id += "-";
                imgDelete.value += id;
                console.log(imgDelete.value);
            }
        })
    }
</script>
@endsection
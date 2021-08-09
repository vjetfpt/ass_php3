@extends('layout/admin/layout')
@section('title','Thêm danh mục')
@section('content')
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Thêm danh mục</h4>
                <form class="forms-sample" action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="inpName">Tên danh mục</label>
                        <input type="text" name="name" class="form-control" id="inpName" placeholder="Tên danh mục" value="{{old('name')}}">
                        @error('name')
                        <span id="check-name" class="validate-warning">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input type="file" name="image" class="file-upload-default" id="inpImg" accept="image/png, image/jpeg">
                        <div class="input-group col-xs-12">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Tải lên</button>
                            </span>
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Ảnh đại diện danh mục">
                        </div>
                        @error('image')
                        <span id="check-name" class="validate-warning">{{$message}}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Thêm mới</button>
                    <button type="reset" class="btn btn-light">Đặt lại</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    // const form = document.getElementsByTagName('form')[0];
    // const inpName = document.querySelector('#inpName');
    // const checkName = document.querySelector('#check-name');
    // const inpImg = document.querySelector('#inpImg');
    // const checkImg = document.querySelector('#check-img');
    // const arr_alow_type = ["image/png", "image/jpeg"]
    // form.addEventListener('submit', function(e) {
    //     if (inpName.value == "") {
    //         checkName.style.display = "block";
    //         e.preventDefault();
    //     }
    //     if (inpImg.files.length) {
    //         let validate_img = "";
    //         if (!arr_alow_type.includes(inpImg.files[0].type)) {
    //             validate_img = "File gửi lên sai định dạng  ";
    //         }
    //         if (inpImg.files[0] > 1024000) {
    //             validate_img += "File ảnh vượt quá 10mb";
    //         }
    //         if (validate_img != "") {
    //             checkImg.textContent = validate_img;
    //             checkImg.style.display = "block";
    //             e.preventDefault();
    //         }
    //     }
    // })
</script>
@endsection
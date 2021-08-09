@extends('layout/admin/layout')
@section('title','Thêm danh mục')
@section('content')
<div class="row">
    <div class="col-12">
        @forelse($listCate as $cate)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Name product</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$cate->name}}</td>
                    <td>
                        @foreach($cate->tours as $tour)
                            {{$tour->name}}
                        @endforeach
                    </td>
                </tr>
            </tbody>
        </table>
        @empty
        <h2>Không tìm thấy bản ghi nào</h2>
        @endforelse
    </div>
</div>
@endsection
@section('script')
<script>
</script>
@endsection
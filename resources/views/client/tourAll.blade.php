@extends('layout/client/layout')
@section('content')
<div class="container why-us">
    <div class="row">
        <form class="search-box" action="">
            <input type="text" placeholder="Nhập tour cần tìm.." name="search" value="{{ old('search') }}">
            <button type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <div class="row">
        <div id="sidebar-main" class="col-sm-12">
            <div class="row" style="margin-bottom: 20px;">
                @forelse($tours as $tour)
                <div class="col-sm-4 col-xs-12">
                    <div class="tour-border">
                        <div class="tour-image">
                            <a href="{{route('client.tour',['tour'=>$tour->id])}}" title="{{$tour->name}}">
                                <img src="{{config('global.APP_URL').$tour->image}}" class="img-responsive" alt="{{$tour->name}}" />
                            </a>
                            <div class="cover">
                                <a href="{{route('client.tour',['tour'=>$tour->id])}}">Xem</a>
                            </div>
                        </div>
                        <div class="tour-info">
                            <div class="tour-name">
                                <a href="{{route('client.tour',['tour'=>$tour->id])}}" title="{{$tour->name}}">
                                    <span>{{$tour->name}}</span>
                                </a>
                            </div>
                            <div class="tour-description">
                                {!! $tour->description !!}
                            </div>
                            <div class="tour-price">
                                <span class="price product-price">{{$tour->price}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p>Chưa có tour nào!</p>
                @endforelse
            </div>
        </div>
        {{$tours->links('vendor.pagination.custome')}}
    </div>
</div>
@endsection
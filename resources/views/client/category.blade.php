@extends('layout/client/layout')
@section('content')
<img src="{{config('global.APP_URL').$cate->image}}" alt="{{$cate->name}}" class="img-responsive" />
<div class="container why-us banner-vi_sao_chon" id="banner-vi_sao_chon-0">
    <h3 class="heading-title">{{$cate->name}}</h3>
    <div class="row">
        <div id="sidebar-main" class="col-sm-12">
            <div class="row" style="margin-bottom: 20px;">
                @forelse($listTour as $tour)
                <div class="col-sm-4 col-xs-12">
                    <div class="tour-border">
                        <div class="tour-image">
                            <a href="{{route('client.tour',['tour'=>$tour->id])}}" title="{{$tour->name}}">
                                <img src="{{config('global.APP_URL').$tour->img}}"
                                     class="img-responsive" alt="{{$tour->name}}" />
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
    </div>
    {{$listTour->links('vendor.pagination.custome')}}
</div>
@endsection
@extends('layout/client/layout')
@section('content')
<div class="container">
    <div class="row">
        <div id="content" class="news-content col-sm-12 col-xs-12 col-md-12">
            <div class="row">
                <div class="col-sm-6">
                    <div class="thumbnails product_thumbnails owl-carousel owl-theme">
                        @forelse($tour->galleries as $gall)
                        <div class="item">
                            <a class="thumbnail" href="{{config('global.APP_URL').$gall->link_image}}" title="{{$tour->name}}">
                                <img src="{{config('global.APP_URL').$gall->link_image}}" title="{{$tour->name}}" alt="{{$tour->name}}" />
                            </a>
                        </div>
                        @empty
                        <p>Tour chưa có ảnh</p>
                        @endforelse
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="btn-group hidden">
                        <button type="button" data-toggle="tooltip" class="btn btn-default" title="Thêm vào yêu thích" onclick="wishlist.add('56');"><i class="fa fa-heart"></i> </button>
                        <button type="button" data-toggle="tooltip" class="btn btn-default" title="So sánh sản phẩm" onclick="compare.add('56');"><i class="fa fa-exchange"></i> </button>
                    </div>
                    <h1>{{$tour->name}}</h1>
                    <ul class="list-unstyled">
                        <li>Mã sản phẩm: {{$tour->id}}</li>
                    </ul>
                    <div class="text-description">
                        {!! $tour->description !!}
                    </div>
                    <ul class="list-unstyled">
                        <li>
                            <h2>{{$tour->price}}</h2>
                        </li>
                    </ul>
                    <div id="product">
                        <div class="form-group">
                            <form action="{{route('client.cart')}}" method="get">
                                @csrf
                                <button type="submit" id="button-cart" value="{{$tour->id}}"
                                      name="tour_id" class="btn btn-primary btn-lg btn-block">
                                    Đặt tour ngay
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="nav nav-tabs">
                <li class="active"> <a href="#tab-description" data-toggle="tab">Mô tả</a> </li>
                <li> <a href="#tab-review" data-toggle="tab">Đánh giá (0)</a> </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab-description">
                    {!! $tour->schedule !!}
                </div>
                <div class="tab-pane" id="tab-review">
                    <form class="form-horizontal" id="form-review">
                        <div id="review">
                            <p>Không có đánh giá nào cho sản phẩm này.</p>
                        </div>
                        <h2>Viết đánh giá</h2>
                        <div class="form-group required">
                            <div class="col-sm-12"> <label class="control-label" for="input-name">Họ tên</label>
                                <input type="text" name="name" value="" id="input-name" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group required">
                            <div class="col-sm-12"> <label class="control-label" for="input-review">Nội dung
                                    đánh giá</label> <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                                <div class="help-block"><span class="text-danger">Chú ý:</span> Không sử dụng
                                    các định dạng HTML!</div>
                            </div>
                        </div>
                        <div class="form-group required">
                            <div class="col-sm-12"> <label class="control-label">Xếp hạng</label>
                                &nbsp;&nbsp;&nbsp; Chưa tốt&nbsp; <input type="radio" name="rating" value="1" />
                                &nbsp; <input type="radio" name="rating" value="2" /> &nbsp; <input type="radio" name="rating" value="3" /> &nbsp; <input type="radio" name="rating" value="4" /> &nbsp; <input type="radio" name="rating" value="5" /> &nbsp;Tốt
                            </div>
                        </div>
                        <div class="buttons clearfix">
                            <div class="pull-right"> <button type="button" id="button-review" data-loading-text="Đang tải..." class="btn btn-primary">Tiếp tục</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr />
            <div class="fb-comments" data-href="http://jettravel.myzozo.net/tour-thai-lan-bangkok-pattaya-trong-5-ngay-4-dem" data-width="100%" data-numposts="5"></div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="tour-home product_module product_related" id="product_related-1263221484" style="background-image: url('')">
            <div class="container">
                <h3 class="text-center heading-title">Sản phẩm Liên quan</h3>
                <div class="container">
                    <div class="owl-carousel owl-theme new_by_catnew1263221484">
                        @forelse($listTourRelated as $tourRe)
                        <div class="item" style="padding: 20px;">
                            <div class="tour-border">
                                <div class="tour-image">
                                    <a href="{{route('client.tour',['tour'=>$tourRe->id])}}">
                                        <img src="{{config('global.APP_URL').$tourRe->img}}" class="img-responsive" alt="{{$tourRe->name}}" />
                                    </a>
                                    <div class="cover">
                                        <a href="{{route('client.tour',['tour'=>$tourRe->id])}}">Xem</a>
                                    </div>
                                </div>
                                <div class="tour-info">
                                    <div class="tour-name">
                                        <a href="{{route('client.tour',['tour'=>$tourRe->id])}}">
                                            <span>{{$tourRe->name}}</span>
                                        </a>
                                    </div>
                                    <div class="tour-description"> {!! $tourRe->description !!} </div>
                                    <div class="tour-price">
                                        <span class="price product-price">{{$tourRe->price}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <p>Không có tour liên quan</p>
                        @endforelse
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        var owl = $('#product_related-1263221484 .owl-carousel');
                        owl.owlCarousel({
                            items: 4,
                            loop: true,
                            margin: 10,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: false,
                            responsive: {
                                0: {
                                    items: 1
                                },
                                600: {
                                    items: 2
                                },
                                960: {
                                    items: 3
                                },
                                1200: {
                                    items: 4
                                }
                            }
                        }); /*$('.play').on('click', function () { owl.trigger('play.owl.autoplay', [1000]) }); $('.stop').on('click', function () { owl.trigger('stop.owl.autoplay') })*/
                    })
                </script>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.thumbnails.owl-carousel').owlCarousel({
            items: 1,
            nav: true,
            dots: true,
            autoplay: true,
            loop: true,
            autoplayTimeout: 4000,
            navText: ["<span class='fa fa-angle-left'>", "<span class='fa fa-angle-right'>"]
        });
    });
</script>
<script src="/client/catalog/view/theme/etravel/javascript/zozo-main.min01b3.js?v=1624930782"></script>
@endsection
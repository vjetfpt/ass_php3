@extends('layout/client/layout')
@section('content')
<div id="module_gallery-0" class="module_gallery owl-carousel owl-theme">
    <div> <a href="#"> <img src="client/image/cache/catalog/slider/slider_2-1347x518.jpg" alt="" class="img-responsive" /></a> </div>
    <div> <a href="#"> <img src="client/image/cache/catalog/slider/slider_1-1347x518.jpg" alt="" class="img-responsive" /></a> </div>
</div>
<script>
    $(document).ready(function() {
        $('#module_gallery-0').owlCarousel({
            items: 1,
            autoplay: true,
            loop: true,
            nav: true,
            dots: true,
            navText: ['<span class="fa fa-chevron-left"></span>', '<span class="fa fa-chevron-right"></span>']
        });
    });
</script>
<div class="service-home text-center module_category product_category" id="product_category-1">
    <h3 class="heading-title">Dịch vụ tốt nhất của ETravel Tours</h3>
    <div class="container">
        @if(!empty($listCateTake))
        @foreach($listCateTake as $cate)
        <div class="col-sm-4 col-xs-12">
            <div class="cat-image">
                <a href="{{route('client.category.tour',['id'=>$cate->id])}}">
                    <img src="{{config('global.APP_URL').$cate->image}}" alt="{{$cate->name}}" class="img-responsive" />
                </a>
            </div>
            <div class="cat-name">
                <a href="{{route('client.category.tour',['id'=>$cate])}}">{{$cate->name}}</a>
            </div>
        </div>
        @endforeach
        @else
        <p>Hiện tại chưa có danh mục nào</p>
        @endif
        <div class="clearfix"></div>
    </div>
</div>
</div>
<div class="tour-home product_module product_mostviewed" id="product_mostviewed-0" style="background-image: url('client/image/catalog/banner/home-customer-bg.jpg')">
    <div class="container">
        <h3 class="text-center heading-title">Tour du lịch hấp dẫn - hot</h3>
        <div class="container">
            <div class="owl-carousel owl-theme new_by_catnew0">
                @forelse($listTourTake as $tour)
                <div class="item" style="padding: 20px;">
                    <div class="tour-border">
                        <div class="tour-image">
                            <a href="{{route('client.tour',['tour'=>$tour->id])}}"> 
                                <img src="{{config('global.APP_URL').$tour->image}}" class="img-responsive" alt="{{$tour->name}}" />
                            </a>
                            <div class="cover">
                                <a href="{{route('client.tour',['tour'=>$tour->id])}}">Xem</a>
                            </div>
                        </div>
                        <div class="tour-info">
                            <div class="tour-name">
                                <a href="{{route('client.tour',['tour'=>$tour->id])}}"> 
                                    <span>{{$tour->name}}</span> 
                                </a>
                            </div>
                            <div class="tour-description"> 
                                {!! $tour->description !!},&#8230;
                            </div>
                            <div class="tour-price">
                                <span class="price product-price">{{$tour->price}}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <p>Hiện chưa có tour nào!</p>
                @endforelse
            </div>
        </div>
        <script type="text/javascript">
            $(document).ready(function() {
                var owl = $('#product_mostviewed-0 .owl-carousel');
                owl.owlCarousel({
                    items: 3,
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
                            items: 3
                        },
                        960: {
                            items: 3
                        },
                        1200: {
                            items: 3
                        }
                    }
                }); /*$('.play').on('click', function () { owl.trigger('play.owl.autoplay', [1000]) }); $('.stop').on('click', function () { owl.trigger('stop.owl.autoplay') })*/
            })
        </script>
    </div>
</div>
<div class="container why-us banner-vi_sao_chon " id="banner-vi_sao_chon-0">
    <h3 class="heading-title">Vì sao chọn tour Châu Âu - ETravel Tour</h3>
    <div class="row">
        <div class="col-sm-6"> <img src="client/image/cache/catalog/banner/why-feature-555x302.jpg" alt="Vì sao chọn tour Châu Âu - ETravel Tour" class="img-responsive" /> </div>
        <div class="col-sm-6 text">
            <p>Tận t&acirc;m, am hiểu, chuy&ecirc;n nghiệp<br />Với sự tận t&acirc;m, am hiểu, chuy&ecirc;n nghiệp,
                qu&yacute; kh&aacute;ch lu&ocirc;n c&oacute; được h&agrave;nh tr&igrave;nh tốt nhất, ph&ugrave; hợp
                nhất, với chi ph&iacute; tiết kiệm nhất<br /><br />Chứng nhận dịch vụ xuất sắc từ
                Tripadvisor<br />100% kh&aacute;ch h&agrave;ng h&agrave;i l&ograve;ng với dịch vụ của Dế Việt
                (AsiaLink ETravel) theo đ&aacute;nh gi&aacute; từ website du lịch lớn nhất thế giới,
                Tripadvisor<br /><br />Tư vấn miễn ph&iacute; v&agrave; hỗ trợ 24/7<br />Sẵn s&agrave;ng tư vẫn miễn
                ph&iacute; v&agrave; lu&ocirc;n song h&agrave;nh c&ugrave;ng kh&aacute;ch h&agrave;ng trong suốt
                thời gian thăm quan</p>
        </div>
    </div>
</div>
<div class="feedback" id="feedback-0" style="background-image: url('client/image/catalog/banner/home-customer-bg.jpg')">
    <h3 class="text-center heading-title">Phản hồi của khách hàng</h3>
    <div class="container">
        <div class="owl-carousel owl-theme feedback0">
            <div class="item">
                <div class="feedback-detail">Tour Châu Âu linh hoạt thời gian và địa điểm, dễ dàng kết hợp tham quan
                    du lịch và thăm thân nhân tại các nước Châu Âu. Mình đi 2 line red và green, rất vui và không
                    mệt. Hướng dẫn viên tiếng Việt nhiệt tình, thân thiện. Lịch trình đi hầu hết các điểm du lịch
                    nổi tiếng của từng nước. Chúc Cty ngày càng có thêm nhiều khách biết đến và sử dụng dịch vụ, mở
                    rộng đc thị trường du lịch Châu Âu cho du khách Việt... </div>
                <div class="row">
                    <div class="col-sm-3 col-xs-3">
                        <div class="feedback-image"> <img src="client/image/cache/catalog/banner/testimonial_1-250x250.jpg" alt="Hoàng Hùng" class="img-responsive img-circle" /></div>
                    </div>
                    <div class="col-sm-9 col-xs-9">
                        <div class="feedback-customer">Hoàng Hùng</div>
                        <div class="feedback-date">12/10/2016</div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="feedback-detail"> “Đây là lần đầu tiên tôi đi du lịch qua ETravel Tours, cảm nhận của
                    tôi về toàn bộ chuyến đi rất tốt. Mặc dù đã đi Nha Trang nhiều lần nhưng tôi cảm thấy vẫn rất
                    thích và muốn tiếp tục đi nữa để khám phá những điểm đến mới thông qua chương trình tham quan
                    của Quý công ty. Ngoài ra Hướng dẫn viên cũng thăm hỏi đến từng thành viên trong đoàn về điều
                    kiện ăn, ngủ….”</div>
                <div class="row">
                    <div class="col-sm-3 col-xs-3">
                        <div class="feedback-image"> <img src="client/image/cache/catalog/banner/testimonial_2-250x250.jpg" alt="Nguyễn Ngọc Mai" class="img-responsive img-circle" /></div>
                    </div>
                    <div class="col-sm-9 col-xs-9">
                        <div class="feedback-customer">Nguyễn Ngọc Mai</div>
                        <div class="feedback-date">12/10/2016</div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="feedback-detail">“Hướng dẫn viên Đạt rất chu đáo, nhiệt tình tạo cảm giác thoải mái,
                    tuyệt vời cho gia đình trong chuyến tham quan. Gia đình tôi cảm thấy rất vui và hài lòng khi có
                    được một chuyến tham quan cùng Du Lịch Việt, cùng Hướng dẫn viên Đạt. Dịch vụ của ETravel Tours
                    cũng tốt, tạo cảm giác vui và mát mẻ khi về Miền Tây. Gia đình tôi sẽ cùng đồng hành với Hướng
                    dẫn viên Đạt và ETravel Tours trong thời gian sắp tới.”</div>
                <div class="row">
                    <div class="col-sm-3 col-xs-3">
                        <div class="feedback-image"> <img src="client/image/cache/catalog/banner/testimonial_3-250x250.jpg" alt="Phùng Ngọc" class="img-responsive img-circle" /></div>
                    </div>
                    <div class="col-sm-9 col-xs-9">
                        <div class="feedback-customer">Phùng Ngọc</div>
                        <div class="feedback-date">12/10/2016</div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="feedback-detail"> “Mình đã từng sử dụng dịch vụ của vài công ty du lịch trong nước nhưng
                    đến với ETravel Tours, mình đã có một trải nghiệm hoàn toàn mới nhờ sự thân thiện, nhiệt tình,
                    vui vẻ của đội ngũ hướng dẫn viên, đem lại cho mình một chuyến đi tràn đầy niềm vui và ý nghĩa.
                    Mình hiểu rõ hơn về đất nước và con người, phong tục tập quán của nơi mình đã đặt chân tới. Mình
                    hy vọng trong thời gian tới sẽ có cơ hội đồng hành cùng Quý công ty khám phá những quốc gia
                    khác.”</div>
                <div class="row">
                    <div class="col-sm-3 col-xs-3">
                        <div class="feedback-image"> <img src="client/image/cache/catalog/banner/testimonial_1-250x250.jpg" alt="Trần Hiếu" class="img-responsive img-circle" /></div>
                    </div>
                    <div class="col-sm-9 col-xs-9">
                        <div class="feedback-customer">Trần Hiếu</div>
                        <div class="feedback-date">12/10/2016</div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="feedback-detail">“Đây là lần đầu tiên tôi trải nghiệm tour du lịch ra nước ngoài. Có rất
                    nhiều bỡ ngỡ từ việc thực hiện các thủ tục lên máy bay cũng như đến một đất nước hoàn toàn xa lạ
                    về ngôn ngữ. Nhưng với việc trợ giúp của Hướng dẫn viên của hai công ty nên mọi việc trở nên dễ
                    dàng hơn. Chúng tôi chưa hề biết nhiều về đất nước chùa vàng, nhưng với sự hướng dẫn nhiệt tình,
                    hiểu rõ về lịch sử cũng như phong tục tập quán nên tạo cho mọi người trong đoàn cảm nhận được sự
                    gần gũi...”</div>
                <div class="row">
                    <div class="col-sm-3 col-xs-3">
                        <div class="feedback-image"> <img src="client/image/cache/catalog/banner/testimonial_2-250x250.jpg" alt="Ngọc Châm" class="img-responsive img-circle" /></div>
                    </div>
                    <div class="col-sm-9 col-xs-9">
                        <div class="feedback-customer">Ngọc Châm</div>
                        <div class="feedback-date">12/10/2016</div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="feedback-detail"> “Đây là lần đầu tiên tôi đi nước ngoài, có rất nhiều bỡ ngỡ nhưng với
                    sự hướng dẫn nhiệt tình, chu đáo và thân thiện của hai người bạn hướng dãn là Boner Phụng và Mr
                    Long đã giúp tôi hiểu rõ hơn về đất nước Thái Lan. Với giá tour rất hợp lý nhưng công ty rất
                    phong phú với bạn hướng dẫn kiến thức rộng, sự giao tiếp rất tốt khiến tôi vô cùng hài lòng và
                    có nhiều kỷ niệm đẹp trong chuyến đi này. Xin chúc Quý công ty du lịch luôn phát triển!”</div>
                <div class="row">
                    <div class="col-sm-3 col-xs-3">
                        <div class="feedback-image"> <img src="client/image/cache/catalog/banner/testimonial_3-250x250.jpg" alt="Hoàng Hùng" class="img-responsive img-circle" /></div>
                    </div>
                    <div class="col-sm-9 col-xs-9">
                        <div class="feedback-customer">Hoàng Hùng</div>
                        <div class="feedback-date">12/10/2016</div>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="feedback-detail"> “Trong chuyến đi này, gia đình chúng tôi gặp sự cố tai nạn bất ngờ
                    nhưng nhờ sự hỗ trợ và giúp đỡ nhanh chóng nhiệt tình của anh hướng dẫn viên nên mọi việc cũng
                    đã thu xếp được ổn thỏa và giúp chúng tôi yên tâm hơn. Mong rằng công ty luôn duy trì được thế
                    mạnh này để những hành khách như gia đình tôi luôn yên tâm lựa chọn Quý công ty là người bạn
                    đồng hành trong những chuyến đi mới tiếp theo.”</div>
                <div class="row">
                    <div class="col-sm-3 col-xs-3">
                        <div class="feedback-image"> <img src="client/image/cache/catalog/banner/testimonial_2-250x250.jpg" alt="Nguyễn Thị Mai" class="img-responsive img-circle" /></div>
                    </div>
                    <div class="col-sm-9 col-xs-9">
                        <div class="feedback-customer">Nguyễn Thị Mai</div>
                        <div class="feedback-date">12/10/2016</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var owl = $('#feedback-0 .owl-carousel');
        owl.owlCarousel({
            items: 3,
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
                    items: 3
                },
                960: {
                    items: 3
                },
                1200: {
                    items: 3
                }
            }
        }); /*$('.play').on('click', function () { owl.trigger('play.owl.autoplay', [1000]) }); $('.stop').on('click', function () { owl.trigger('stop.owl.autoplay') });*/
    })
</script>
<div class="staff service-doi_ngu_nhan_vien" id="service-doi_ngu_nhan_vien-0" style="background-image: url('')">
    <h3 class="text-center heading-title">Đội ngũ chuyên viên</h3>
    <div class="container">
        <div class="owl-carousel owl-theme">
            <div class="item text-center">
                <div class="staff-image"> <img alt="Hoàng Hùng" src="client/image/cache/catalog/banner/kh-300x300.jpg" class="img-responsive img-circle" /></div>
                <div class="staff-name">Hoàng Hùng</div>
                <div class="staff-job"></div>
                <div class="staff-info">
                    <p>Với hơn 20 năm kinh nghiệm l&agrave;m lữ h&agrave;nh quốc tế, H&agrave; hiện phụ tr&aacute;ch
                        mảng kh&aacute;ch h&agrave;ng cao cấp v&agrave; kh&aacute;ch h&agrave;ng VIP của Dế Việt.
                    </p>
                </div>
            </div>
            <div class="item text-center">
                <div class="staff-image"> <img alt="Thu Huyền" src="client/image/cache/catalog/banner/kh5-300x300.jpg" class="img-responsive img-circle" /></div>
                <div class="staff-name">Thu Huyền</div>
                <div class="staff-job"></div>
                <div class="staff-info">
                    <p>Với gần 3 năm kinh nghiệm trong ng&agrave;nh quản trị kh&aacute;ch sạn v&agrave; du lịch,
                        Huyền hiện l&agrave; gi&aacute;m s&aacute;t bộ phận chăm s&oacute;c kh&aacute;ch h&agrave;ng
                        v&agrave; chuy&ecirc;n gia trực tiếp xử l&yacute; c&aacute;c dịch vụ visa ch&acirc;u
                        &Acirc;u v&agrave; quốc tế.</p>
                </div>
            </div>
            <div class="item text-center">
                <div class="staff-image"> <img alt="Phùng Huy" src="client/image/cache/catalog/banner/kh1-300x300.jpg" class="img-responsive img-circle" /></div>
                <div class="staff-name">Phùng Huy</div>
                <div class="staff-job"></div>
                <div class="staff-info">
                    <p>Với gần 10 năm kinh nghiệm trong ng&agrave;nh du lịch v&agrave; l&agrave; người năng động,
                        Huy đ&atilde; đi du lịch nhiều nơi tr&ecirc;n thế giới.</p>
                </div>
            </div>
            <div class="item text-center">
                <div class="staff-image"> <img alt="Minh Ngọc" src="client/image/cache/catalog/banner/kh2-300x300.jpg" class="img-responsive img-circle" /></div>
                <div class="staff-name">Minh Ngọc</div>
                <div class="staff-job"></div>
                <div class="staff-info">
                    <p>Hơn 10 năm kinh nghiệm trực tiếp đ&oacute;n kh&aacute;ch Việt Nam thăm quan, l&agrave;m việc
                        tại Ph&aacute;p v&agrave; Ch&acirc;u &Acirc;u. Chị hiện l&agrave; đại diện của ETravel Tours
                        tại Ph&aacute;p.</p>
                </div>
            </div>
            <div class="item text-center">
                <div class="staff-image"> <img alt="Thu Hương" src="client/image/cache/catalog/banner/nv3-300x300.jpg" class="img-responsive img-circle" /></div>
                <div class="staff-name">Thu Hương</div>
                <div class="staff-job"></div>
                <div class="staff-info">
                    <p>Sau 3 năm sinh sống v&agrave; đ&oacute;n kh&aacute;ch Việt Nam thăm quan &Yacute; v&agrave;
                        Ch&acirc;u &Acirc;u, Đạt hiện l&agrave; đại diện của ETravel Tours tại &Yacute; từ năm 2015
                    </p>
                </div>
            </div>
            <div class="item text-center">
                <div class="staff-image"> <img alt="Phùng Trang" src="client/image/cache/catalog/banner/nv-300x300.jpg" class="img-responsive img-circle" /></div>
                <div class="staff-name">Phùng Trang</div>
                <div class="staff-job"></div>
                <div class="staff-info">
                    <p>Với hơn 10 năm kinh nghiệm trong lĩnh vực quản trị du lịch v&agrave; lữ h&agrave;nh quốc tế,
                        Trang hiện l&agrave; nh&acirc;n vi&ecirc;n tư vấn củaETravel Tours tại H&agrave; Nội</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var owl = $('#service-doi_ngu_nhan_vien-0 .owl-carousel');
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
                    items: 4
                },
                960: {
                    items: 4
                },
                1200: {
                    items: 4
                }
            }
        }); /*$('.play').on('click', function () { owl.trigger('play.owl.autoplay', [1000]) }); $('.stop').on('click', function () { owl.trigger('stop.owl.autoplay') })*/
    })
</script>
<div class="container new-home news_module news_latest " id="news_latest-0">
    <h3 class="text-center heading-title">Blog - Cẩm nang du lịch Châu Âu</h3>
    <div class="">
        <div class="row">
            <div class="col-sm-4 col-xs-12" style="margin-bottom: 10px;"> <a href="du-lich-bui-chau-a-nen-di-dau.html" title="Du lịch bụi châu Á nên đi đâu?"> <img src="client/image/cache/catalog/news/DU_LICH_BUI_CHAU_A_NEN_DI_DAU_1-360x250.jpg" alt="Du lịch bụi châu Á nên đi đâu?" class="new-home-image img-responsive" /> </a>
                <h4> <a href="du-lich-bui-chau-a-nen-di-dau.html" title="Du lịch bụi châu Á nên đi đâu?">Du lịch bụi
                        châu Á nên đi đâu?</a> </h4>
                <p class="new-home-description"></p>
            </div>
            <div class="col-sm-4 col-xs-12" style="margin-bottom: 10px;"> <a href="mot-so-thu-tuc-can-thiet-khi-xin-visa-du-lich-chau-au.html" title="Một số thủ tục cần thiết khi xin visa du lịch châu Âu"> <img src="client/image/cache/catalog/news/kinh-nghiem-xin-visa-du-lich-chau-au-1216201542340PM-360x250.jpg" alt="Một số thủ tục cần thiết khi xin visa du lịch châu Âu" class="new-home-image img-responsive" /> </a>
                <h4> <a href="mot-so-thu-tuc-can-thiet-khi-xin-visa-du-lich-chau-au.html" title="Một số thủ tục cần thiết khi xin visa du lịch châu Âu">Một số thủ tục cần thiết khi
                        xin visa du lịch châu Âu</a> </h4>
                <p class="new-home-description"></p>
            </div>
            <div class="col-sm-4 col-xs-12" style="margin-bottom: 10px;"> <a href="cac-thu-tuc-can-thiet-khi-xin-visa-hoa-ky.html" title="Các thủ tục cần thiết khi xin VISA Hoa Kỳ"> <img src="client/image/cache/catalog/news/washington-dc2-360x250.jpg" alt="Các thủ tục cần thiết khi xin VISA Hoa Kỳ" class="new-home-image img-responsive" />
                </a>
                <h4> <a href="cac-thu-tuc-can-thiet-khi-xin-visa-hoa-ky.html" title="Các thủ tục cần thiết khi xin VISA Hoa Kỳ">Các thủ tục cần thiết khi xin VISA Hoa
                        Kỳ</a> </h4>
                <p class="new-home-description"></p>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="newsletter module-newsletter" id="module-newsletter-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="left-newsletter">
                    <div class="left-newsletter-title">Đăng ký nhận tin</div>
                    <p><i class="fa fa-phone-square" aria-hidden="true"></i> 0123 456 789</p>
                    <p><i class="fa fa-envelope-o" aria-hidden="true"></i> vietcone@gmail.com</p>
                    <p><i class="fa fa-map-marker" aria-hidden="true"></i> </p>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="form-content">
                    <h3 class="heading-title">Để lại thông tin của bạn để được tư vấn từ ETravel Tours</h3>
                    <p class="description"></p> <span class="bg-success" id="sub_notice0"></span>
                    <form action="#" method="post" id="sub_form0"> <input type="hidden" name="module_code" value="newsletter.282" /> <input type="hidden" name="api_link" value="" />
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group"> <label for="sub_name0">Tên</label> <input type="text" name="name" class="form-control" id="sub_name0" placeholder="Tên" /> </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group"> <label for="sub_email0">Email</label> <input type="email" name="email" class="form-control" id="sub_email0" placeholder="Email" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group"> <label for="sub_phone0">Điện thoại</label> <input type="text" name="phone" class="form-control" id="sub_phone0" placeholder="Điện thoại" /> </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group"> <label for="sub_company0">Nước bạn muốn đi</label> <input type="text" name="custom[1][value]" class="form-control" placeholder="Nước bạn muốn đi" /> <input type="hidden" name="custom[1][name][1]" value="Nước bạn muốn đi" /> </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group"> <label for="sub_company0">Số người</label> <input type="text" name="custom[2][value]" class="form-control" placeholder="Số người" /> <input type="hidden" name="custom[2][name][1]" value="Số người" /> </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group"> <label for="sub_company0">Ngày đi dự kiến</label> <input type="text" name="custom[3][value]" class="form-control" placeholder="Ngày đi dự kiến" /> <input type="hidden" name="custom[3][name][1]" value="Ngày đi dự kiến" /> </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group"> <label for="sub_company0">Ngày về dự kiến</label> <input type="text" name="custom[4][value]" class="form-control" placeholder="Ngày về dự kiến" /> <input type="hidden" name="custom[4][name][1]" value="Ngày về dự kiến" /> </div>
                            </div>
                        </div> <button type="button" class="btn btn-default button_newsletter sub_button0">Đăng
                            ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.sub_button0').click(function() {
            var url = "/extension/module/newsletter/addCustomer";
            $.ajax({
                type: "post",
                url: url,
                data: $("#sub_form0").serialize(),
                dataType: 'json',
                beforeSend: function() {
                    $('.sub_button0').html('Đăng ký <i class="fa fa-refresh fa-spin fa-fw"></i>');
                    $('.sub_button0').attr('disabled', 'disabled');
                },
                complete: function() {
                    $('.sub_button0').html('Đăng ký');
                    $('.sub_button0').removeAttr('disabled');
                },
                success: function(json) {
                    if (json['error'] == true) {
                        alert(json['errorMassage']);
                    } else {
                        $('#sub_noticeshow0').html('<span class="bg-success" id="sub_notice0">Gửi thông tin thành công, tư vấn viên của chúng tôi sẽ liên hệ ngay với bạn!</span>');
                        $('#sub_form0').trigger('reset');
                    }
                },
                error: function(json) {}
            });
        });
    });
</script>
@endsection
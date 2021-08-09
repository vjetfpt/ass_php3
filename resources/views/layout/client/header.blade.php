<header>
    <div class='container hidden-xs'>
        <div class='row'>
            <div class='col-sm-2'>
                <div id='container-logo'>
                    <a href='{{config('global.APP_URL')}}'>
                        <img src='/client/image/catalog/logo/logo.png' alt='ETravel Tours - Đi để trải nghiệm ' class='img-responsive' id='logo' /></a>
                </div>
            </div>
            <div class='col-sm-6'>
                <div class='row'>
                    <div class="row hidden-xs">
                        <div class="col-sm-12 col-xs-12">
                            <ul class="sf-menu" id="example">
                                <li> <a href="{{config('global.APP_URL')}}">Trang chủ</a> </li>
                                <li>
                                    <a href="">Danh mục</a>
                                    <ul class="menu-multi-level">
                                        @foreach($listCate as $cate)
                                        <li>
                                            <a href="{{route('client.category.tour',['id'=>$cate->id])}}">
                                                {{$cate['name']}}
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li> <a href="{{route('client.tour.all')}}">Tour hiện có</a> </li>
                                <li> <a href="cam-nang-du-lich.html">Cẩm nang du lịch</a> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-func col-sm-3">
                <div class="row">
                    @guest
                    <div class="col-sm-6">
                        <i class="fas fa-key"></i>
                        <a href="{{route('client.register.index')}}">Đăng kí</a>
                    </div>
                    <div class="col-sm-6">
                        <i class="fas fa-sign-in-alt"></i>
                        <a href="{{route('client.login')}}">Đăng nhập</a>
                    </div>
                    @endguest
                    @auth
                    <div class="dropdown">
                        <button class="dropbtn">{{auth()->user()->name}}|{{auth()->user()->email}}</button>
                        <div class="dropdown-content">
                            <a href="#">Link 1</a>
                            <a href="#">Link 2</a>
                            <a href="{{route('client.logout')}}">Đăng xuất</a>
                        </div>
                    </div>
                    @endauth
                </div>
            </div>
            <div class="header-func col-sm-1">
                <div class="row">
                    <div class=" col-sm-12">
                        <a href="{{route('client.cart.show')}}" style="text-decoration:none;">
                            <i class="fas fa-shopping-cart" style="font-size: 25px;"></i>
                        </a>
                        <span>
                            {{Session::has('cart')?count(Session::get('cart')):"0"}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='container hidden-lg hidden-md hidden-sm'>
        <div class='row'>
            <div class='col-xs-4'>
                <div id='container-logo-mobile'> <a href='index.html'><img src='client/image/catalog/logo/logo.png' alt='ETravel Tours - Đi để trải nghiệm ' class='img-responsive' id='logo' /></a> </div>
            </div>
            <div class='col-xs-6'>
                <div class='hotline-info-mobile'> <span class='text'>Hotline:</span><br /> <span class='phone'><a href="callto:0123 456 789">0123 456 789</a></span> </div>
            </div>
            <div class='col-xs-2'>
                <div class="container-icon-bar"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </div>
            </div>
            <div class="col-xs-12">
                <nav class="content_menu_mobile hidden-lg hidden-md hidden-sm">
                    <div class="body_menu_mobile">
                        <ul class="nav navbar-nav" style="margin: 0;">
                            <li><a href="index.html"><strong>Trang chủ</strong></a></li>
                            <li><a href="gioi-thieu.html"><strong>Về ETravel Tours</strong></a></li>
                            <li><a href="tour-chau-a.html"><strong>Tour Châu Á</strong></a></li>
                            <li><a href="tour-chau-au.html"><strong>Tour Châu Âu</strong></a></li>
                            <li><a href="tour-chau-my.html"><strong>Tour Châu Mỹ</strong></a></li>
                            <li><a href="cam-nang-du-lich.html"><strong>Cẩm nang du lịch</strong></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div> <span class="language-header"></span>
</header>
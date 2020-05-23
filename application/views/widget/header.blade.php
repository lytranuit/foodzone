<!-- <header class="page-head">
    <div class="top-header py-2" style="background: #223f4f;">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-sm-6 col-md-8">
                    <ul class="list-inline float-left">
                        <li><a class="unit unit-horizontal unit-middle unit-spacing-xxs link-default" href="tel:#">
                                <div class="unit-left"><span class="icon icon-md icon-primary thin-icon-phone-call text-middle" style="font-size: 33px;line-height: 33px;"></span></div>
                                <div class="unit-body">
                                    <address class="contact-info"><span class="text-bold big">{{$options['hot_line']}}</span></address>
                                </div>
                            </a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-md-4">
                    <ul class="list-inline float-right">
                        <li>
                            <a class="text-center" href="{{base_url()}}index/set_language/vietnamese"><img src="http://simbaeshop.com/flag/vi.png"></a>
                            <a class="text-center" href="{{base_url()}}index/set_language/english"><img src="http://simbaeshop.com/flag/en.png"></a>
                            <a class="text-center" href="{{base_url()}}index/set_language/japanese"><img src="http://simbaeshop.com/flag/jp.png"></a>
                        </li>
                        @if ($is_login)
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{$userdata['identity']}}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="<?= base_url() ?>admin">{{lang("info")}}</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item logout" href="<?= base_url() ?>index/logout">{{lang("logout")}}</a>
                                </div>
                            </div>
                        </li>
                        @else
                        <li>
                            <a href="{{base_url()}}index/login"><i class="fa fa-user"></i> Đăng nhập</a>
                        </li>
                        <li><span>hoặc</span></li>
                        <li><a href="{{base_url()}}index/register">Đăng ký</a>
                        </li>
                        @endif

                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="rd-navbar-wrap rd-navbar-minimal" style="height: 108px;">
        <nav class="rd-navbar rd-navbar-original rd-navbar-static" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-stick-up-clone="false" data-md-stick-up-offset="100px" data-lg-stick-up-offset="100px">
            <div class="container-wide">
                <div class="rd-navbar-inner">
                    <div class="rd-navbar-panel">
                        <button class="rd-navbar-toggle toggle-original" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                        <a class="rd-navbar-brand brand" href="{{base_url()}}">
                            <div class="brand-logo">
                                <img src="{{base_url()}}public/image/logo.png" width="200" />
                            </div>
                        </a>
                    </div>
                    <div class="rd-navbar-nav-wrap toggle-original-elements">
                        <ul class="rd-navbar-nav">

                            <li class="rd-navbar--has-dropdown rd-navbar-submenu">
                                <a class="" href="#">Category</a>
                                <ul class="rd-navbar-dropdown rd-navbar-open-right">
                                    @foreach($list_cate as $row)
                                    <li>
                                        <a href="{{base_url()}}index/category/{{$row->id}}">{{ $row->{pick_language($row,'name_')} }}</a>
                                        @if(isset($row->child) && count($row->child) > 0)
                                        <ul class="rd-navbar-dropdown rd-navbar-open-right">
                                            @foreach($row->child as $row1)
                                            <li>
                                                <a href="{{base_url()}}index/category/{{$row1->id}}">{{ $row1->{pick_language($row1,'name_')} }}</a>

                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="rd-navbar--has-dropdown rd-navbar-submenu">
                                <a class="" href="#">Topics</a>
                                <ul class="rd-navbar-dropdown rd-navbar-open-right">
                                    @foreach($list_topics as $row)
                                    <li>
                                        <a href="{{base_url()}}index/category/{{$row->id}}">{{ $row->{pick_language($row,'name_')} }}</a>
                                        @if(isset($row->child) && count($row->child) > 0)
                                        <ul class="rd-navbar-dropdown rd-navbar-open-right">
                                            @foreach($row->child as $row1)
                                            <li>
                                                <a href="{{base_url()}}index/category/{{$row1->id}}">{{ $row1->{pick_language($row1,'name_')} }}</a>

                                            </li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li>
                                <a class="" href="{{base_url()}}index/news">News</a>
                            </li>
                           
                        </ul>

                        <ul class="rd-navbar-shop list-inline">
                            <li><a class="unit unit-horizontal unit-middle unit-spacing-xxs link-gray-light cart_icon" href="{{base_url()}}index/cart">
                                    <div class="unit-left"><span class="icon icon-md icon-primary thin-icon-cart" style="font-size: 33px;line-height: 33px;"></span></div>
                                    <div class="unit-body"><span class="label-inline big">2</span></div>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header> -->

<header class="header">
    <div class="topbar hidden-sm hidden-xs">
        <div class="container">
            <div>
                <div class="row">
                    <div class="col-sm-6 col-md-8">
                        <ul class="list_top float-left">
                            <li>
                                <i class="fas fa-mobile" style=" font-size: 20px; display: inline-block; position: relative; transform: translateY(2px); "></i> Hotline:
                                <span>
                                    <a href="tel:{{$options['hot_line']}}">{{$options['hot_line']}}</a>
                                </span>
                            </li>
                            <li class="ml-2">
                                <i class="fa fa-map-marker"></i> <b>Địa chỉ</b>:
                                <span>
                                    {{$options['dia_chi']}}
                                </span>
                            </li>
                        </ul>

                    </div>
                    <div class="col-sm-6 col-md-4">
                        <ul class="list-inline float-right">
                            <li class="language">
                                <a class="text-center" href="{{base_url()}}index/set_language/vietnamese"><img src="http://simbaeshop.com/flag/vi.png"></a>
                            </li>
                            <li class="language">
                                <a class="text-center" href="{{base_url()}}index/set_language/english"><img src="http://simbaeshop.com/flag/en.png"></a>
                            </li>
                            <li class="language">
                                <a class="text-center" href="{{base_url()}}index/set_language/japanese"><img src="http://simbaeshop.com/flag/jp.png"></a>
                            </li>
                            @if($is_login)
                            <li>
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{$userdata['identity']}}
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="<?= base_url() ?>admin">{{lang("info")}}</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item logout" href="<?= base_url() ?>index/logout">{{lang("logout")}}</a>
                                    </div>
                                </div>
                            </li>
                            @else
                            <li>
                                <a href="{{base_url()}}index/login"><i class="fa fa-user"></i> Đăng nhập</a>
                            </li>
                            <li><span>hoặc</span></li>
                            <li><a href="{{base_url()}}index/register">Đăng ký</a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="clearfix text-center">
            <div class="row">
                <div class="col-xs-12 col-md-3 text-lg-left">
                    <div class="logo inline-block">

                        <a href="/" class="logo-wrapper ">
                            <img src="{{base_url()}}public/image/logo.png" width="200" />
                        </a>

                    </div>
                </div>
                <div class="col-xs-12 col-md-8 col-lg-7 hidden-xs">
                    <div class="policy d-flex justify-content-around">

                        <div class="item-policy d-flex align-items-center">
                            <a href="https://25plus.vn/pages/phi-van-chuyen-tai-25plus-vn" class="text-dark">
                                <img src="//theme.hstatic.net/1000372774/1000494897/14/policy1.png?v=2064" alt="25PLUS - Food and Beverage Ecommerce">
                            </a>
                            <div class="info a-left">
                                <a href="https://25plus.vn/pages/phi-van-chuyen-tai-25plus-vn" class="text-dark">Miễn phí vận chuyển (Chi tiết)</a>
                                <p>Đơn hàng từ 500k - Khu vực nội thành</p>
                            </div>
                        </div>


                        <div class="item-policy d-flex align-items-center">
                            <a href="#">
                                <img src="//theme.hstatic.net/1000372774/1000494897/14/policy2.png?v=2064" alt="25PLUS - Food and Beverage Ecommerce">
                            </a>
                            <div class="info a-left">
                                <a href="#" class="text-dark">Hỗ trợ 24/7</a>
                                <p>Hotline: <a href="callto:19001009" class="text-dark">{{$options['hot_line']}}</a></p>
                            </div>
                        </div>


                        <div class="item-policy d-flex align-items-center">
                            <a href="#">
                                <img src="//theme.hstatic.net/1000372774/1000494897/14/policy3.png?v=2064" alt="25PLUS - Food and Beverage Ecommerce">
                            </a>
                            <div class="info a-left">
                                <a href="#" class="text-dark">Giờ làm việc</a>
                                <p>T2 - T7 (08h: 18h)</p>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-xs-12 col-md-1 col-lg-2 hidden-sm hidden-xs">
                    <div class="top-cart-contain float-right ">
                        <div class="mini-cart text-xs-center">
                            <div class="heading-cart">
                                <a href="{{base_url()}}index/cart">
                                    <div class="icon f-left relative">
                                        <i class="fas fa-shopping-bag"></i>
                                        <span class="cartCount count_item_pr hidden-lg" id="cart-total">0</span>
                                    </div>
                                    <div class="right-content hidden-md">
                                        <span class="label">Giỏ hàng</span>
                                        (<span class="cartCount2">0</span>)
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="visible-xs head-menu" style="padding: 0;">
            <ul>
                <li class="li-search">
                    <div class="header_search search_form">
                        <form class="input-group search-bar search_form" action="/search" method="get" role="search">

                            <input type="search" name="q" value="" placeholder="Tìm sản phẩm" class="input-group-field st-default-search-input search-text form-control" autocomplete="off">
                            <input type="hidden" name="type" value="product">
                            <span class="input-group-btn">
                                <button class="btn icon-fallback-text">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </form>
                    </div>
                </li>
            </ul>
        </div>

        <div class="menu-bar hidden-md hidden-lg">
            <img src="//theme.hstatic.net/1000372774/1000494897/14/menu-bar.png?v=2064" alt="menu bar">
        </div>
        <div class="icon-cart-mobile hidden-md hidden-lg f-left absolute" onclick="window.location.href='/cart'">
            <div class="icon relative">
                <i class="fas fa-shopping-bag"></i>
                <span class="cartCount count_item_pr">0</span>
            </div>
        </div>
    </div>
    <nav class="rd-navbar rd-navbar-original rd-navbar-static" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-stick-up-clone="false" data-md-stick-up-offset="100px" data-lg-stick-up-offset="100px">
        <div class="container-wide">
            <div class="rd-navbar-inner">
                <div class="rd-navbar-nav-wrap toggle-original-elements">
                    <ul class="rd-navbar-nav">
                        <li>
                            <a class="active" href="{{base_url()}}">Home</a>
                        </li>
                        <li class="rd-navbar--has-dropdown rd-navbar-submenu">
                            <a class="" href="#">Category</a>
                            <ul class="rd-navbar-dropdown rd-navbar-open-right">
                                @foreach($list_cate as $row)
                                <li>
                                    <a href="{{base_url()}}index/category/{{$row->id}}">{{ $row->{pick_language($row,'name_')} }}</a>
                                    @if(isset($row->child) && count($row->child) > 0)
                                    <ul class="rd-navbar-dropdown rd-navbar-open-right">
                                        @foreach($row->child as $row1)
                                        <li>
                                            <a href="{{base_url()}}index/category/{{$row1->id}}">{{ $row1->{pick_language($row1,'name_')} }}</a>

                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="rd-navbar--has-dropdown rd-navbar-submenu">
                            <a class="" href="#">Topics</a>
                            <ul class="rd-navbar-dropdown rd-navbar-open-right">
                                @foreach($list_topics as $row)
                                <li>
                                    <a href="{{base_url()}}index/category/{{$row->id}}">{{ $row->{pick_language($row,'name_')} }}</a>
                                    @if(isset($row->child) && count($row->child) > 0)
                                    <ul class="rd-navbar-dropdown rd-navbar-open-right">
                                        @foreach($row->child as $row1)
                                        <li>
                                            <a href="{{base_url()}}index/category/{{$row1->id}}">{{ $row1->{pick_language($row1,'name_')} }}</a>

                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        <li>
                            <a class="" href="{{base_url()}}index/news">News</a>
                        </li>

                    </ul>
                    <div class="menu-search f-right bbbbb">
                        <div class="header_search search_form">
                            <form class="input-group search-bar search_form" action="/search" method="get" role="search">
                                <input type="search" name="q" value="" placeholder="Tìm sản phẩm" class="input-group-field st-default-search-input search-text auto-search form-control" autocomplete="off">
                                <span class="input-group-btn">
                                    <button class="btn icon-fallback-text">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </nav>
</header>
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
        <div class="visible-xs head-menu">
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
            <i class="fas fa-bars" style="font-size: 24px;"></i>
        </div>
        <a href="{{base_url()}}index/cart" class="icon-cart-mobile hidden-md hidden-lg f-left text-dark absolute">
            <div class="icon relative">
                <i class="fas fa-shopping-bag"></i>
                <span class="cartCount count_item_pr">0</span>
            </div>
        </a>
    </div>
    <nav class="rd-navbar rd-navbar-original rd-navbar-static" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-stick-up-clone="false" data-md-stick-up-offset="100px" data-lg-stick-up-offset="100px">
        <div class="container-wide">
            <div class="rd-navbar-inner">
                <div class="rd-navbar-nav-wrap toggle-original-elements">
                    <ul class="rd-navbar-nav">
                        <li class="exits-bar hidden-md hidden-lg">
                            <a href="#" style="font-size:24px;">
                                <i class="fas fa-long-arrow-alt-left"></i>
                            </a>
                        </li>
                        @foreach($list_menu as $row)
                        <li>
                            @if($row->type ==1 )
                            <a href="{{$row->link}}">{{ $row->{pick_language($row,'name_')} }}</a>
                            @else
                            <a href="{{base_url()}}/index/category/{{$row->category_id}}">{{ $row->{pick_language($row,'name_')} }}</a>
                            @endif
                            @if(!empty($row->child))
                            <ul class="rd-navbar-megamenu rd-navbar-open-right">
                                @foreach($row->child as $row2)
                                <li>
                                    @if($row2->type ==1 )
                                    <a class='d-block' href="{{$row->link}}">{{ $row2->{pick_language($row2,'name_')} }}</a>
                                    @else
                                    <a class='d-block' href="{{base_url()}}index/category/{{$row2->category_id}}">{{ $row2->{pick_language($row2,'name_')} }}</a>
                                    @endif
                                    @if(!empty($row2->child))
                                    <ul class="list-marked">
                                        @foreach($row2->child as $row3)
                                        <li>
                                            @if($row3->type ==1 )
                                            <a href="{{$row->link}}">{{ $row3->{pick_language($row3,'name_')} }}</a>
                                            @else
                                            <a href="{{base_url()}}index/category/{{$row3->category_id}}">{{ $row3->{pick_language($row3,'name_')} }}</a>
                                            @endif
                                        </li>
                                        @endforeach
                                    </ul>
                                    @endif

                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                    <div class="menu-search hidden-sm hidden-xs">
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
                    <a href="{{base_url()}}index/cart" class="text-white absolute d-none cart-bag">
                        <div class="icon relative">
                            <i class="fas fa-shopping-bag"></i>
                            <span class="cartCount count_item_pr">0</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
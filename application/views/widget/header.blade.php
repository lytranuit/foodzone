<header class="header">
    <div class="topbar hidden-sm hidden-xs">
        <div class="container">
            <div>
                <div class="row">
                    <div class="col-sm-6 col-md-8">
                        <!-- <ul class="list_top float-left">
                            <li>
                                <a href="http://sakezone.vn/" class="text-white">👉 Sakezone</a>
                            </li>
                        </ul> -->

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
                            <a href="{{base_url()}}index/post/4" class="text-dark">
                                <img src="{{base_url()}}public/image/policy1.png">
                            </a>
                            <div class="info a-left">
                                <a href="{{base_url()}}index/post/4" class="text-dark">{{lang("header_text_ship")}}</a>
                                <p>{{lang("header_text_ship_sub")}}</p>
                            </div>
                        </div>


                        <div class="item-policy d-flex align-items-center">
                            <a href="http://sakezone.vn/">
                                <img src="{{base_url()}}public/image/sakezone.png" width="100">
                            </a>
                            <!-- <div class="info a-left">
                                <a href="#" class="text-dark">{{lang("header_text_hotline")}}</a>
                                <p>{{lang("header_text_hotline_sub")}}<a href="callto:19001009" class="text-dark">{{$options['hot_line']}}</a></p>
                            </div> -->
                        </div>


                        <div class="item-policy d-flex align-items-center">
                            <a href="#">
                                <img src="{{base_url()}}public/image/policy3.png">
                            </a>
                            <div class="info a-left">
                                <a href="#" class="text-dark">{{lang("header_text_opening")}}</a>
                                <p>{{lang("header_text_opening_sub")}}</p>
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
    <nav style="z-index:100" class="rd-navbar rd-navbar-original rd-navbar-static" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-stick-up-clone="false" data-md-stick-up-offset="100px" data-lg-stick-up-offset="100px">
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
                            @elseif($row->type ==4)
                            <a href="{{base_url()}}index/khuyen_mai">{{ $row->{pick_language($row,'name_')} }} <img class='img_km' src="//theme.hstatic.net/1000372774/1000494897/14/hot-gift.gif?v=2064" alt="Siêu khuyến mãi" width="30"></a>
                            @elseif($row->type ==5)
                            <a href="{{base_url()}}index/news">{{ $row->{pick_language($row,'name_')} }}</a>
                            @else
                            <a href="{{base_url()}}/index/category/{{$row->category_id}}">{{ $row->{pick_language($row,'name_')} }}</a>
                            @endif
                            @if(!empty($row->child))
                            <ul class="rd-navbar-megamenu rd-navbar-open-right">
                                @foreach($row->child as $row2)
                                <li>
                                    @if($row2->type ==1)
                                    <a class='d-block' href="{{$row->link}}">{{ $row2->{pick_language($row2,'name_')} }}</a>
                                    @elseif($row2->type ==4)
                                    <a class='d-block' href="{{base_url()}}index/khuyen_mai">{{ $row2->{pick_language($row2,'name_')} }} <img class='img_km' src="//theme.hstatic.net/1000372774/1000494897/14/hot-gift.gif?v=2064" alt="Siêu khuyến mãi" width="30"></a>
                                    @elseif($row2->type ==5)
                                    <a class='d-block' href="{{base_url()}}index/news">{{ $row2->{pick_language($row2,'name_')} }}</a>
                                    @else
                                    <a class='d-block' href="{{base_url()}}index/category/{{$row2->category_id}}">{{ $row2->{pick_language($row2,'name_')} }}</a>
                                    @endif
                                    @if(!empty($row2->child))
                                    <ul class="list-marked">
                                        @foreach($row2->child as $row3)
                                        <li>
                                            @if($row3->type ==1 )
                                            <a href="{{$row->link}}">{{ $row3->{pick_language($row3,'name_')} }}</a>
                                            @elseif($row3->type ==4)
                                            <a href="{{base_url()}}index/khuyen_mai">{{ $row3->{pick_language($row3,'name_')} }} <img class='img_km' src="//theme.hstatic.net/1000372774/1000494897/14/hot-gift.gif?v=2064" alt="Siêu khuyến mãi" width="30"></a>
                                            @elseif($row3->type ==5)
                                            <a href="{{base_url()}}index/news">{{ $row3->{pick_language($row3,'name_')} }}</a>
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
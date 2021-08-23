<header class="header">
    <div class="topbar hidden-sm hidden-xs">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-12">
                    <div class="float-left">
                        <button class="btn btn-sm btn-light dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @if(area_current() == "B")
                            <i class="fas fa-map-marker-alt"></i> {{lang("area_B")}}
                            @elseif(area_current() == "T")
                            <i class="fas fa-map-marker-alt"></i> {{lang("area_T")}}
                            @else
                            <i class="fas fa-map-marker-alt"></i> {{lang("area_N")}}
                            @endif
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item text-dark" href="{{base_url()}}index/set_area/N"><i class="fas fa-map-marker-alt"></i> {{lang("area_N")}}</a>
                            <a class="dropdown-item text-dark" href="{{base_url()}}index/set_area/T"><i class="fas fa-map-marker-alt"></i> {{lang("area_T")}}</a>
                            <a class="dropdown-item text-dark" href="{{base_url()}}index/set_area/B"><i class="fas fa-map-marker-alt"></i> {{lang("area_B")}}</a>
                        </div>
                    </div>
                    <ul class="list-inline float-right">
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-link text-white dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="vertical-align: baseline;text-decoration: none;border-right: 1px solid #ffffff3d;">
                                    <i class="fas fa-globe"></i>
                                    @if(language_current() == "english")
                                    English
                                    @elseif(language_current() == "japanese")
                                    日本語
                                    @else
                                    Tiếng việt
                                    @endif
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item text-dark language" href="{{base_url()}}index/set_language/vietnamese">Tiếng việt</a>
                                    <a class="dropdown-item text-dark language" href="{{base_url()}}index/set_language/english">English</a>
                                    <a class="dropdown-item text-dark language" href="{{base_url()}}index/set_language/japanese">日本語</a>
                                </div>
                            </div>
                        </li>
                        @if($is_login)
                        <li>
                            <div class="dropdown">
                                <button class="btn btn-link text-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="vertical-align: baseline;text-decoration: none;">
                                    <i class="fas fa-user"></i> {{$userdata['identity']}}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <a class="dropdown-item text-dark" href="<?= base_url() ?>member/">{{lang("info")}}</a>
                                    <a class="dropdown-item text-dark" href="<?= base_url() ?>member/history">{{lang("history_order")}}</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item logout text-dark" href="<?= base_url() ?>index/logout">{{lang("logout")}}</a>
                                </div>
                            </div>
                        </li>
                        @else
                        <li>
                            <a href="{{base_url()}}index/login"><i class="fa fa-user"></i> {{lang("login")}}</a>
                        </li>
                        <li>
                            <a href="{{base_url()}}index/register"><i class="fa fa-user"></i> {{lang("sign_up")}}</a>
                        </li>
                        @endif
                    </ul>
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
                            <img src="{{base_url()}}public/image/logo4.png?v=1" width="200" />
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-md-8 col-lg-7 hidden-xs">
                    <div class="block block-search">
                        <form class="input-group search-bar search_form" action="{{base_url()}}index/search" method="get" role="search">
                            <input type="search" name="q" value="" placeholder="{{lang('search_text')}}" class="input-group-field st-default-search-input search-text form-control" autocomplete="off">
                            <input type="hidden" name="type" value="product">
                            <span class="input-group-btn">
                                <button class="btn icon-fallback-text">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </form>
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
                                        <span class="label">{{lang("cart_title")}}</span>
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
                        <form class="input-group search-bar search_form" action="{{base_url()}}index/search" method="get" role="search">

                            <input type="search" name="q" value="" placeholder="{{lang('search_text')}}" class="input-group-field st-default-search-input search-text form-control" autocomplete="off">
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
        <a href="{{base_url()}}index/cart" class="icon-cart-mobile hidden-md hidden-lg f-left text-white absolute">
            <div class="icon relative">
                <i class="fas fa-shopping-bag"></i>
                <span class="cartCount count_item_pr">0</span>
            </div>
        </a>
    </div>
    <nav style="z-index:100" class="rd-navbar" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-stick-up-clone="false" data-md-stick-up-offset="100px" data-lg-stick-up-offset="100px">
        <div class="container-wide">
            <div style="position: relative;">
                <div class="rd-navbar-nav-wrap toggle-original-elements">
                    <div class="hidden-md hidden-lg head-menu">
                        @if($is_login)
                        <div class="dropdown text-center">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="vertical-align: baseline;text-decoration: none;">
                                <i class="fas fa-user"></i> {{$userdata['identity']}}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <a class="dropdown-item text-dark" href="<?= base_url() ?>member/">{{lang("info")}}</a>
                                <a class="dropdown-item text-dark" href="<?= base_url() ?>member/history">{{lang("history_order")}}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item logout text-dark" href="<?= base_url() ?>index/logout">{{lang("logout")}}</a>
                            </div>
                        </div>
                        <a class="text-dark exits-bar" href="#" style="font-size:24px;display: inline-block; padding: 0;">
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </a>
                        @else
                        <a class="text-primary" href="{{base_url()}}index/login"><i class="fa fa-user text-dark mr-1"></i>{{lang("login")}}</a>
                        <span class="text-dark">{{lang("or")}}</span>
                        <a class="text-primary" href="{{base_url()}}index/register">{{lang("sign_up")}}</a>
                        <a class="text-dark exits-bar" href="#" style="font-size:24px;display: inline-block; padding: 0;">
                            <i class="fas fa-long-arrow-alt-left"></i>
                        </a>
                        @endif
                    </div>
                    <ul class="rd-navbar-nav">

                        @foreach($list_menu as $row)
                        <li>
                            @if($row->type ==1 )
                            <a href="{{$row->link}}">{{ $row->{pick_language($row,'name_')} }}</a>
                            @elseif($row->type ==4)
                            <a href="{{base_url()}}index/khuyen_mai">{{ $row->{pick_language($row,'name_')} }} <img class='img_km' src="{{base_url()}}public/image/hot-gift.gif" alt="Siêu khuyến mãi" width="50"></a>
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
                                    <a class='d-block text-success' href="{{$row->link}}">{{ $row2->{pick_language($row2,'name_')} }}</a>
                                    @elseif($row2->type ==4)
                                    <a class='d-block text-success' href="{{base_url()}}index/khuyen_mai">{{ $row2->{pick_language($row2,'name_')} }} <img class='img_km' src="{{base_url()}}public/image/hot-gift.gif" alt="Siêu khuyến mãi" width="50"></a>
                                    @elseif($row2->type ==5)
                                    <a class='d-block text-success' href="{{base_url()}}index/news">{{ $row2->{pick_language($row2,'name_')} }}</a>
                                    @else
                                    <a class='d-block text-success' href="{{base_url()}}index/category/{{$row2->category_id}}">{{ $row2->{pick_language($row2,'name_')} }}</a>
                                    @endif
                                    @if(!empty($row2->child))
                                    <ul class="list-marked">
                                        @foreach($row2->child as $row3)
                                        <li>
                                            @if($row3->type ==1 )
                                            <a href="{{$row->link}}">{{ $row3->{pick_language($row3,'name_')} }}</a>
                                            @elseif($row3->type ==4)
                                            <a href="{{base_url()}}index/khuyen_mai">{{ $row3->{pick_language($row3,'name_')} }} <img class='img_km' src="{{base_url()}}public/image/hot-gift.gif" alt="Siêu khuyến mãi" width="50"></a>
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
                    <ul class="hidden-md hidden-lg footer-menu d-flex">
                        <li class="col">
                            <a class="text-center" href="{{base_url()}}index/set_language/vietnamese"><img src="http://simbaeshop.com/flag/vi.png"></a>
                        </li>
                        <li class="col">
                            <a class="text-center" href="{{base_url()}}index/set_language/english"><img src="http://simbaeshop.com/flag/en.png"></a>
                        </li>
                        <li class="col">
                            <a class="text-center" href="{{base_url()}}index/set_language/japanese"><img src="http://simbaeshop.com/flag/jp.png"></a>
                        </li>
                    </ul>
                    <div class="menu-search d-none">
                        <div class="header_search search_form">
                            <form class="input-group search-bar search_form" action="{{base_url()}}index/search" method="get" role="search">
                                <input type="search" name="q" value="" placeholder="{{lang('search_text')}}" class="input-group-field st-default-search-input search-text auto-search form-control" autocomplete="off">
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
@if(!isset($_SESSION['area_current']))
<!-- Modal-->
<div aria-hidden="true" aria-labelledby="area-modalLabel" class="modal fade" id="area-modal" role="dialog" tabindex="-1" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <h4 class="text-center text-uppercase">Chọn khu vực / Choose your region / お住まいの地域を選択してください
                </h4>
            </div>
            <div class="modal-body">
                <div class="main text-center">
                    <!-- <p class="text-center">{{lang("des_area")}}</p> -->
                    <p class="text-center">Hãy chọn khu vực của bạn. Bạn có thể thay đổi khu vực tại đầu trang.</p>
                    <p class="text-center">Please select your region or you can change at the top of website.</p>
                    <p class="text-center">ページ上部のタブより、いつでも変更可能です</p>
                    <div class="form-group form-group-lg">
                        <select class="form-control-lg select_area">
                            <option value="N">
                                Miền Nam / South / 南部
                            </option>
                            <option value="T">
                                Miền Trung / Central / 中部
                            </option>
                            <option value="B">
                                Miền Bắc / North / 北部
                            </option>
                        </select>
                    </div>
                    <div class="form-group form-group-lg">
                        <button class="btn btn-success btn-lg text-uppercase yes_area">Đồng ý / Accept / 選択</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif


@if(!isset($_SESSION['is_show_popup']))
<?php $_SESSION['is_show_popup'] = true ?>
<!-- Modal-->
<div aria-hidden="true" aria-labelledby="popup-modalLabel" class="modal fade" id="popup-modal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-body">
                <a href="#" style="font-size: 20px;
    z-index: 20;
    position: absolute;
    color: black;
    right: 5px;
    top: 5px;"><i class="far fa-times-circle" data-dismiss="modal"></i></a>

                <?= $popup ?>
            </div>
        </div>
    </div>
    <style>
        #popup-modal .modal-dialog {
            width: fit-content;
        }

        @media (min-width: 768px) {
            #popup-modal .modal-dialog {
                min-width: 500px;
                max-width: 90%;
            }
        }
    </style>
</div>

@endif
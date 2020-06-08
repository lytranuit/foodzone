<!--<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Tổng quan
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{base_url()}}admin/">Tổng quan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{base_url()}}admin/quanlypage">Page</a>
                    </li>
                    @if($is_admin)
                    <li class="nav-item">
                        <a class="nav-link" href="{{base_url()}}admin/quanlyuser">User</a>
                    </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{base_url()}}admin/settings">Cài đặt chung</a>
                    </li>
                    <li style="height: 100px;">

                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>-->

<div class="app-sidebar sidebar-shadow">
    <div class="app-header__logo">
        <div><img src="{{base_url()}}public/img/logo.png" width="150" /></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">
                <li class="app-sidebar__heading">Tổng quan</li>
                <li>
                    <a href="{{base_url()}}dashboard/" class="">
                        <i class="metismenu-icon far fa-chart-bar"></i>
                        Biểu đồ
                    </a>
                </li>
                <li class="app-sidebar__heading">Slider & Post</li>
                <li>
                    <a href="{{base_url()}}slider/" class="">
                        <i class="metismenu-icon fas fa-images"></i>
                        Quản lý slider
                    </a>
                </li>
                <li>
                    <a href="{{base_url()}}news/" class="">
                        <i class="metismenu-icon fas fa-newspaper"></i>
                        Quản lý tin tức
                    </a>
                </li>
                <li class="app-sidebar__heading">Danh mục</li>
                <li>
                    <a href="{{base_url()}}eat/" class="">
                        <i class="metismenu-icon fas fa-cookie-bite"></i>
                        Danh mục
                    </a>
                </li>
                <li>
                    <a href="{{base_url()}}cook/" class="">
                        <i class="metismenu-icon fas fa-utensils"></i>
                        Topics
                    </a>
                </li>


                <li>
                    <a href="{{base_url()}}product_sale/" class="">
                        <i class="metismenu-icon fas fa-shopping-bag"></i>
                        Sản phẩm mua cùng
                    </a>
                </li>
                <li class="app-sidebar__heading">Menu</li>
                <li>
                    <a href="{{base_url()}}menu_header" class="">
                        <i class="metismenu-icon fas fa-wrench"></i>
                        Menu Header
                    </a>
                </li>
                <li>
                    <a href="{{base_url()}}menu_slide" class="">
                        <i class="metismenu-icon fas fa-wrench"></i>
                        Menu Slide
                    </a>
                </li>

                <li class="app-sidebar__heading">Sản phẩm</li>
                <li>
                    <a href="{{base_url()}}product/" class="">
                        <i class="metismenu-icon fab fa-product-hunt"></i>
                        Sản phẩm
                    </a>
                    <a href="{{base_url()}}product_price/" class="">
                        <i class="metismenu-icon fas fa-ad"></i>
                        Giá khuyến mãi
                    </a>
                </li>
                <li class="app-sidebar__heading">Đơn đặt hàng</li>
                <li>
                    <a href="{{base_url()}}sale/" class="">
                        <i class="metismenu-icon fas fa-gift"></i>
                        Đơn đặt hàng
                    </a>
                </li>
                <li class="app-sidebar__heading">Cài đặt</li>
                <li>
                    <a href="{{base_url()}}admin/settings" class="">
                        <i class="metismenu-icon fas fa-wrench"></i>
                        Cài đặt chung
                    </a>
                </li>
                <li>
                    <a href="{{base_url()}}admin/settings_email" class="">
                        <i class="metismenu-icon fas fa-envelope"></i>
                        Gửi mail
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon fa fa-lock"></i>
                        Phân quyền
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="{{base_url()}}user/">
                                <i class="metismenu-icon"></i>
                                Tài khoản
                            </a>
                        </li>
                        <li>
                            <a href="{{base_url()}}group/">
                                <i class="metismenu-icon"></i>
                                Nhóm
                            </a>
                        </li>
                    </ul>

                </li>
                <li>
                    <a href="{{base_url()}}admin/language" class="">
                        <i class="metismenu-icon fas fa-globe"></i>
                        Ngôn ngữ
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
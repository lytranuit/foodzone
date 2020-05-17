<header class="page-head">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap rd-navbar-minimal" style="height: 108px;">
        <nav class="rd-navbar rd-navbar-original rd-navbar-static" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-stick-up-clone="false" data-md-stick-up-offset="100px" data-lg-stick-up-offset="100px">
            <div class="container-wide">
                <div class="rd-navbar-inner">
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel">
                        <!-- RD Navbar Toggle-->
                        <button class="rd-navbar-toggle toggle-original" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                        <!-- RD Navbar Brand--><a class="rd-navbar-brand brand" href="{{base_url()}}">
                            <div class="brand-logo">
                                <svg x="0px" y="0px" width="157px" height="41px" viewBox="0 0 157 41">
                                    <text transform="matrix(1 0 0 1 1.144409e-004 32)" fill="white" font-family="'Grand Hotel'" font-size="45.22">QuickFood</text>
                                    <path fill-rule="evenodd" clip-rule="evenodd" fill="#EB5453" d="M43.743,2.954c2.606,0,4.719,2.091,4.719,4.672  c0,2.58-2.113,4.672-4.719,4.672c-2.606,0-4.719-2.091-4.719-4.672C39.024,5.045,41.137,2.954,43.743,2.954z"></path>
                                </svg>
                            </div>
                        </a>
                    </div>
                    <!-- RD Navbar Nav-->
                    <div class="rd-navbar-nav-wrap toggle-original-elements">
                        <!-- RD Navbar Nav-->
                        <!-- RD Navbar Nav-->
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
                            <!-- <li><a class="navbar-icon thin-icon-map-marker" href="{{base_url()}}index/contact">Contacts</a></li> -->


                            <li><a class="navbar-icon thin-icon-email-search" href="#" style="font-size: 30px;
                                   line-height: 12px;
                                   text-align: center;
                                   padding: 10px 0;"></a></li>
                        </ul>

                        <!-- RD Navbar Shop-->
                        <ul class="rd-navbar-shop list-inline">
                            <li>
                                <a class="text-center" href="{{base_url()}}index/set_language/vietnamese"><img src="http://simbaeshop.com/flag/vi.png"></a>
                                <a class="text-center" href="{{base_url()}}index/set_language/english"><img src="http://simbaeshop.com/flag/en.png"></a>
                                <a class="text-center" href="{{base_url()}}index/set_language/japanese"><img src="http://simbaeshop.com/flag/jp.png"></a>
                            </li>
                            <li><a class="unit unit-horizontal unit-middle unit-spacing-xxs link-default" href="tel:#">
                                    <div class="unit-left"><span class="icon icon-md icon-primary thin-icon-phone-call text-middle" style="font-size: 33px;line-height: 33px;"></span></div>
                                    <div class="unit-body">
                                        <address class="contact-info"><span class="text-bold big">{{$options['hot_line']}}</span></address>
                                    </div>
                                </a></li>
                            <li><a class="unit unit-horizontal unit-middle unit-spacing-xxs link-gray-light" href="shop-cart.html">
                                    <div class="unit-left"><span class="icon icon-md icon-primary thin-icon-cart" style="font-size: 33px;line-height: 33px;"></span></div>
                                    <div class="unit-body"><span class="label-inline big">2</span></div>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
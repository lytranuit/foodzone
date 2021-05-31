<footer>
    <section class="section-50">
        <div class="container-wide">
            <div class="row border-left-cell">
                <div class="col-12 col-lg-6">
                    <a class="brand brand-inverse" href="{{base_url()}}">
                        <img src="{{base_url()}}public/image/logo.png?v=1" width="200" />
                    </a>
                    <p class="header_footer">{{$options['company_name']}}</p>
                    <p>{{lang("footer_tru_so")}}: <span class="text-dark">{{$options['dia_chi']}}</span></p>
                    <p>{{lang("footer_phone")}}: <a class="text-dark" href="tel:{{$options['hot_line']}}">{{$options['hot_line']}}</span></a></p>
                    <p>Giấy chứng nhận Đăng ký Kinh doanh số 0303582244 do Phòng Đăng Ký Kinh Doanh - Kế hoạch và Đầu tư
                        Thành phố Hồ Chí Minh cấp đăng ký thay đổi lần thứ 11 ngày 07/02/2020</p>
                </div>
                <div class="col-12 col-lg-3">
                    <p class="header_footer">{{lang("lien_ket")}}</p>
                    <ul class="list list-marked">
                        <li class="nav-item">
                            <a class="text-dark" href="{{base_url()}}index/post/5">{{lang("footer_hdmh")}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-dark" href="{{base_url()}}index/post/6">{{lang("footer_cstt")}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-dark" href="{{base_url()}}index/post/7">{{lang("footer_csdh")}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-dark" href="{{base_url()}}index/post/8">{{lang("footer_csbm")}}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-3">
                    <ul class="list-inline" style="font-size: 25px;">
                        <li><a target="_blank" class="icon icon-xxs-mod-1 fab fa-facebook icon-facebook" href="http://www.facebook.com/sharer/sharer.php?u={{current_url()}}"></a></li>
                        <li><a target="_blank" class="icon icon-xxs-mod-1 fab fa-twitter icon-twitter" href="https://twitter.com/intent/tweet?text=Link&url={{current_url()}}"></a></li>
                        <li class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=true>
                            <a href='#' class="icon icon-xxs-mod-1 zalo">
                                <i></i>
                            </a>
                        </li>
                    </ul>
                    <div class="open-door clear">
                        <span class="open-text">{{lang("footer_open")}}</span>
                        <span class="open-time text-dark">{{$options['hour_open']}}</span>
                    </div>
                    <div class="customer">
                        <span>{{lang("footer_customer")}}: </span>
                        <span class="phone text-dark">{{$options['hot_line']}}</span>
                    </div>
                    <div>
                        <a href="http://online.gov.vn/HomePage/CustomWebsiteDisplay.aspx?DocId=52565" target="_blank" class="bocongthuong">
                            <div class="text-dark">Chứng nhận SGD TMĐT</div>
                            <img src="public/image/bct.png" alt="TMĐT">
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- <section class="background">

    </section> -->
    <div id="toTop" class="btn btn-secondary">
        <i class="fas fa-angle-up"></i>
    </div>

</footer>
<div class="zalo-chat-widget" data-oaid="2343818110642891994" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="350" data-height="420"></div>
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v9.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
<style>
    #fb-root iframe {
        left: 12px;
        right: inherit !important;
    }
</style>
<!-- Your Chat Plugin code -->
<div class="fb-customerchat" attribution=setup_tool page_id="100954748611270">
</div>
<section class="home-banner d-none d-sm-block">
    <div class="home-banner-container">
        @foreach($list_slider as $row)
        <div class="banner-item ">
            <a target="_blank" href="{{$row->url}}" title="{{$row->text}}">
                <img src="{{base_url()}}{{$row->image->src}}" style="max-height:400px">
            </a>
            <div class="banner-caption">
                <div class="banner-caption-name">
                    {{$row->text}}
                </div>
            </div>

        </div>
        @endforeach
        <!-- <div class="banner-item">
            <a target="_blank" href="https://burgerking.vn/khuyen-mai" title="Burger King" tabindex="-1">
                <img src="https://images.foody.vn/biz_banner/foody-upload-api-food-biz-200504144912.jpg">
            </a>
            <div class="banner-caption">
                <div class="banner-caption-name">
                    Burger King
                </div>
            </div>

        </div>
        <div class="banner-item">
            <a target="_blank" href="http://www.foody.vn/ung-dung-mobile" title="Foody App trên Mobile" tabindex="-1">
                <img src="https://images.foody.vn/biz_banner/foody-675x355_foodyappbanner-636530746968443602.jpg">
            </a>
            <div class="banner-caption">
                <div class="banner-caption-name">
                    Foody App trên Mobile
                </div>
            </div>

        </div>
        <div class="banner-item">
            <a target="_blank" href="https://burgerking.vn/khuyen-mai" title="Burger King" tabindex="0">
                <img src="https://images.foody.vn/biz_banner/foody-upload-api-food-biz-200504144912.jpg">
            </a>
            <div class="banner-caption">
                <div class="banner-caption-name">
                    Burger King
                </div>
            </div>

        </div>
        <div class="banner-item">
            <a target="_blank" href="http://www.foody.vn/ung-dung-mobile" title="Foody App trên Mobile" onclick="ga('ads.send', 'event', 'Banner trang chu', 'Click', 'Foody App tren Mobile');" tabindex="-1">
                <img src="https://images.foody.vn/biz_banner/foody-675x355_foodyappbanner-636530746968443602.jpg">
            </a>
            <div class="banner-caption">
                <div class="banner-caption-name">
                    Foody App trên Mobile
                </div>
            </div>
        </div> -->
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.home-banner-container').slick({
                centerMode: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                variableWidth: true,
                swipeToSlide: true,
                autoplay: true,
                autoplaySpeed: 5000,
                //arrows: false,
                responsive: [{
                    breakpoint: 700,
                    settings: {
                        draggable: true,
                        variableWidth: false,
                        centerPadding: '0px',
                    }
                }]
            });
            var m = ($(window).width() - 685) / 2 - 50;
            $('.home-banner-container .slick-prev').css('left', m + 'px');
            $('.home-banner-container .slick-next').css('right', m + 'px');
            $('.home-banner-container').css('display', 'block');
        });
    </script>
</section>
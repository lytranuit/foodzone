<section class="section-20">
    <div class="container-wide">
        <div class="row">
            <div class="col-lg-3 d-none d-sm-block" style="z-index: 99;">
                <div class="card card-custom card-color card-menu">
                    <div class="card-header">{{lang("index_menu_slide")}}</div>
                    <div class="card-body py-0">
                        <ul class="list list-marked list-bordered list-custom">
                            @foreach($list_menu as $row)
                            <li class="nav-item has_sub">
                                @if($row->type ==1 )
                                <a class="text-dark" href="{{$row->link}}">{{ $row->{pick_language($row,'name_')} }}</a>
                                @elseif($row->type ==4)
                                <a class="text-dark" href="{{base_url()}}index/khuyen_mai">{{ $row->{pick_language($row,'name_')} }} <img class='img_km' src="{{base_url()}}public/image/hot-gift.gif" alt="Siêu khuyến mãi" width="50"></a>
                                @elseif($row->type ==5)
                                <a class="text-dark" href="{{base_url()}}index/news">{{ $row->{pick_language($row,'name_')} }}</a>
                                @else
                                <a class="text-dark" href="{{base_url()}}/index/category/{{$row->category_id}}">{{ $row->{pick_language($row,'name_')} }}</a>
                                @endif
                                @if(!empty($row->child))
                                <i class="fa fa-angle-right" style="font-size: 20px;
                                position: absolute;
                                right: 0;
                                top: 15px;"></i>
                                <ul class="">
                                    @foreach($row->child as $row2)
                                    <li>
                                        @if($row2->type ==1)
                                        <a class='text-dark' href="{{$row->link}}">{{ $row2->{pick_language($row2,'name_')} }}</a>
                                        @elseif($row2->type ==4)
                                        <a class='text-dark' href="{{base_url()}}index/khuyen_mai">{{ $row2->{pick_language($row2,'name_')} }} <img class='img_km' src="{{base_url()}}public/image/hot-gift.gif" alt="Siêu khuyến mãi" width="50"></a>
                                        @elseif($row2->type ==5)
                                        <a class='text-dark' href="{{base_url()}}index/news">{{ $row2->{pick_language($row2,'name_')} }}</a>
                                        @else
                                        <a class='text-dark' href="{{base_url()}}index/category/{{$row2->category_id}}">{{ $row2->{pick_language($row2,'name_')} }}</a>
                                        @endif
                                        @endforeach
                                    </li>
                                </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="home-banner">
                    <div class="home-banner-container">
                        @foreach($list_slider as $row)
                        <div class="banner-item ">
                            <a target="_blank" href="{{$row->url}}" title="{{$row->text}}">
                                <img src="{{base_url()}}{{$row->image->src}}" class="img-responsive w-100">
                            </a>
                            <div class="banner-caption">
                                <div class="banner-caption-name">
                                    {{$row->text}}
                                </div>
                            </div>

                        </div>
                        @endforeach
                    </div>
                    <script type="text/javascript">
                        $(document).ready(function() {
                            $('.home-banner-container').slick({
                                infinite: true,
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                // variableWidth: true,
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
                            // var m = ($(window).width() - 685) / 2 - 50;
                            // $('.home-banner-container .slick-prev').css('left', m + 'px');
                            // $('.home-banner-container .slick-next').css('right', m + 'px');
                            $('.home-banner-container').css('display', 'block');
                            $('.home-banner-container').on({
                                mouseenter: function() {
                                    $(".slick-arrow", this).fadeIn(500)
                                    //stuff to do on mouse enter
                                },
                                mouseleave: function() {
                                    $(".slick-arrow", this).fadeOut(500)
                                    //stuff to do on mouse leave
                                }
                            });
                            let height_slider = $(".home-banner").outerHeight(true);
                            let height_menu = height_slider - 47;
                            $(".card-menu .card-body").height(height_menu);
                            var count = 1;
                            let timer = setInterval(function() {
                                if (count == 10)
                                    clearInterval(timer);
                                let height_slider = $(".home-banner").outerHeight(true);
                                let height_menu = height_slider - 47;
                                $(".card-menu .card-body").height(height_menu);
                            }, 1000)

                            $(".list-custom li.has_sub").on({
                                mouseenter: function() {
                                    let offset = $(this).offset();
                                    let width = $(this).outerWidth(true);
                                    $(">ul", this).css({
                                        "left": offset.left + width ,
                                        "top": offset.top
                                    });
                                    $(">ul", this).fadeIn(500)
                                },
                                mouseleave: function() {
                                    let offset = $(this).offset();
                                    $(">ul", this).fadeOut(500)
                                }
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
</section>
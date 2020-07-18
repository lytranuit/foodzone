<section class="section-20">
    <div class="container-wide">
        <div class="row">
            <div class="col-lg-12">
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
                        });
                    </script>
                </div>
            </div>
        </div>
</section>
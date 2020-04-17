$(document).ready(function () {
    var plugins = {};
    plugins.responsiveTabs = $(".responsive-tabs")
    plugins.slick = $(".slick-slider")
    plugins.rdNavbar = $(".rd-navbar")

    introCarousel();
    /**
  * RD Navbar
  * @description Enables RD Navbar plugin
  */
    if (plugins.rdNavbar.length) {
        plugins.rdNavbar.RDNavbar({
            stickUpClone: (plugins.rdNavbar.attr("data-stick-up-clone")) ? plugins.rdNavbar.attr("data-stick-up-clone") === 'true' : false
        });
        if (plugins.rdNavbar.attr("data-body-class")) {
            document.body.className += ' ' + plugins.rdNavbar.attr("data-body-class");
        }
    }
    for (i = 0; i < plugins.slick.length; i++) {
        var $slickItem = $(plugins.slick[i]);
        if ($(".item", $slickItem).length <= 5) {
            $slickItem.addClass("bg-none")
        }
        $slickItem.slick({
            slidesToScroll: parseInt($slickItem.attr('data-slide-to-scroll')) || 1,
            initialSlide: 3,
            asNavFor: $slickItem.attr('data-for') || false,
            dots: $slickItem.attr("data-dots") == "true",
            infinite: false,
            focusOnSelect: true,
            arrows: $slickItem.attr("data-arrows") == "true",
            swipe: $slickItem.attr("data-swipe") == "true",
            autoplay: $slickItem.attr("data-autoplay") == "true",
            vertical: $slickItem.attr("data-vertical") == "true",
            centerMode: $slickItem.attr("data-center-mode") == "true",
            centerPadding: $slickItem.attr("data-center-padding") ? $slickItem.attr("data-center-padding") : '0.50',
            mobileFirst: true,
            speed: 700,
            responsive: [
                {
                    breakpoint: 0,
                    settings: {
                        slidesToShow: parseInt($slickItem.attr('data-items')) || 1,
                    }
                },
                {
                    breakpoint: 479,
                    settings: {
                        slidesToShow: parseInt($slickItem.attr('data-xs-items')) || 1,
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: parseInt($slickItem.attr('data-sm-items')) || 1,
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: parseInt($slickItem.attr('data-md-items')) || 1,
                    }
                },
                {
                    breakpoint: 1199,
                    settings: {
                        slidesToShow: parseInt($slickItem.attr('data-lg-items')) || 1,
                    }
                },
                {
                    breakpoint: 1799,
                    settings: {
                        slidesToShow: parseInt($slickItem.attr('data-xl-items')) || 1,
                    }
                },
            ]
        }).on('afterChange', function (event, slick, currentSlide, nextSlide) {
            var $this = $(this),
                childCarousel = $this.attr('data-child');

            if (childCarousel) {
                $(childCarousel + ' .slick-slide').removeClass('slick-current');
                $(childCarousel + ' .slick-slide').eq(currentSlide).addClass('slick-current');
            }
        });

    }
    for (i = 0; i < plugins.responsiveTabs.length; i++) {
        var responsiveTabsItem = $(plugins.responsiveTabs[i]);

        responsiveTabsItem.easyResponsiveTabs({
            type: responsiveTabsItem.attr("data-type") === "accordion" ? "accordion" : "default"

        });
        //If have slick carousel inside tab - resize slick carousel on click
        if (responsiveTabsItem.find('.slick-slider').length) {

            responsiveTabsItem.find('.resp-tab-item').on('click', $.proxy(function (event) {
                var $this = $(this);
                $this.find('.resp-tab-content-active .slick-slider').slick('setPosition');
            }, responsiveTabsItem));

            responsiveTabsItem.find('.resp-accordion').on('click', $.proxy(function (event) {
                var $this = $(this);

                $this.find('.resp-tab-content-active .slick-slider').slick('setPosition');
            }, responsiveTabsItem));
        }


    }

})


function introCarousel() {
    var introCarousel = $(".carousel");
    if (introCarousel.length) {
        var introCarouselIndicators = $(".carousel-indicators");
        introCarousel.on('slide.bs.carousel', function (e) {
        });
        introCarousel.find(".carousel-inner").children(".carousel-item").each(function (index) {
            (index === 0) ?
                introCarouselIndicators.append("<li data-target='#banner-main' data-slide-to='" + index + "' class='active'></li>") :
                introCarouselIndicators.append("<li data-target='#banner-main' data-slide-to='" + index + "'></li>");
        });

        $(".carousel").swipe({
            swipe: function (event, direction, distance, duration, fingerCount, fingerData) {
                if (direction == 'left')
                    $(this).carousel('next');
                if (direction == 'right')
                    $(this).carousel('prev');
            },
            allowPageScroll: "vertical"
        });
        setInterval(function () {
            $(".carousel").carousel('next');
        }, 5000);
    }

}
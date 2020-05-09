$(document).ready(function () {
    var plugins = {};
    $document = $(document)
    $window = $(window)
    $body = $("body");
    plugins.responsiveTabs = $(".responsive-tabs")
    plugins.slick = $(".slick-slider")
    plugins.rdNavbar = $(".rd-navbar")
    plugins.isotope = $(".isotope")
    plugins.customToggle = $("[data-custom-toggle]")
    plugins.easyzoom = $('.easyzoom');
    plugins.fancybox = $('.fancybox');

    plugins.number = $(".number-widget");
    plugins.units = $(".unit_list");
    /**
  * NUMBER
  * @description Enables NUMBER plugin
  */
    if (plugins.number.length) {
        $(".number", plugins.number).autoNumeric('init', { vMin: 1, mDec: 0 });
        $(".number", plugins.number).change(function () {
            if ($(this).autoNumeric("get") < 1) {
                $(this).val(1);
            }
        })
        $(".down", plugins.number).click(function () {
            let parent = $(this).parent();
            console.log(parent);
            let numberEl = $(".number", parent);
            var amount = parseInt(numberEl.autoNumeric("get"));
            if (amount > 1) {
                amount--;
                numberEl.val(amount);
            }
        });
        $(".up", plugins.number).click(function () {
            let parent = $(this).parent();
            let numberEl = $(".number", parent);
            var amount = parseInt(numberEl.autoNumeric("get"));
            amount++;
            numberEl.val(amount);
        });

    }
    /**
  * UNIT
  * @description Enables UNIT plugin
  */
    if (plugins.units.length) {
        $(".unit_product", plugins.units).click(function (e) {
            e.preventDefault();
            let parent = $(this).parent();
            $(".unit_product", parent).removeClass("btn-primary active");
            $(this).addClass("btn-primary active");
        })
    }
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
    if (plugins.easyzoom.length) {
        plugins.easyzoom.easyZoom();
    }
    if (plugins.fancybox.length) {
        plugins.fancybox.fancybox();
    }
    /**
     * Isotope
     * @description Enables Isotope plugin
     */
    if (plugins.isotope.length) {
        var i, j, isogroup = [];
        for (i = 0; i < plugins.isotope.length; i++) {
            var isotopeItem = plugins.isotope[i],
                filterItems = $(isotopeItem).closest('.isotope-wrap').find('[data-isotope-filter]'),
                iso;

            iso = new Isotope(isotopeItem, {
                itemSelector: '.isotope-item',
                layoutMode: isotopeItem.getAttribute('data-isotope-layout') ? isotopeItem.getAttribute('data-isotope-layout') : 'masonry',
                filter: '*',
                masonry: {
                    columnWidth: 0.66
                }
            });

            isogroup.push(iso);

            filterItems.on("click", function (e) {
                e.preventDefault();
                var filter = $(this),
                    iso = $('.isotope[data-isotope-group="' + this.getAttribute("data-isotope-group") + '"]'),
                    filtersContainer = filter.closest(".isotope-filters");

                filtersContainer
                    .find('.active')
                    .removeClass("active");
                filter.addClass("active");

                iso.isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: iso.attr('data-isotope-layout') ? iso.attr('data-isotope-layout') : 'masonry',
                    filter: this.getAttribute("data-isotope-filter") == '*' ? '*' : '[data-filter*="' + this.getAttribute("data-isotope-filter") + '"]',
                    masonry: {
                        columnWidth: 0.66
                    }
                });

                $window.trigger('resize');

                // If d3Charts contains in isotop, resize it on click.
                if (filtersContainer.hasClass('isotope-has-d3-graphs') && c3ChartsArray != undefined) {
                    setTimeout(function () {
                        for (var j = 0; j < c3ChartsArray.length; j++) {
                            c3ChartsArray[j].resize();
                        }
                    }, 500);
                }

            }).eq(0).trigger("click");
        }

        $(window).on('load', function () {
            setTimeout(function () {
                var i;
                for (i = 0; i < isogroup.length; i++) {
                    isogroup[i].element.className += " isotope--loaded";
                    isogroup[i].layout();
                }
            }, 600);
        });
    }

    /**
     * Custom Toggles
     */
    if (plugins.customToggle.length) {
        for (var i = 0; i < plugins.customToggle.length; i++) {
            var $this = $(plugins.customToggle[i]);

            $this.on('click', $.proxy(function (event) {
                event.preventDefault();

                var $ctx = $(this);
                $($ctx.attr('data-custom-toggle')).add(this).toggleClass('active');
            }, $this));

            if ($this.attr("data-custom-toggle-hide-on-blur") === "true") {
                $body.on("click", $this, function (e) {
                    if (e.target !== e.data[0]
                        && $(e.data.attr('data-custom-toggle')).find($(e.target)).length
                        && e.data.find($(e.target)).length === 0) {
                        $(e.data.attr('data-custom-toggle')).add(e.data[0]).removeClass('active');
                    }
                })
            }

            if ($this.attr("data-custom-toggle-disable-on-blur") === "true") {
                $body.on("click", $this, function (e) {
                    if (e.target !== e.data[0] && $(e.data.attr('data-custom-toggle')).find($(e.target)).length === 0 && e.data.find($(e.target)).length === 0) {
                        $(e.data.attr('data-custom-toggle')).add(e.data[0]).removeClass('active');
                    }
                })
            }
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
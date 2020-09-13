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
    plugins.image_view = $('.area_image');
    plugins.topics_view = $('.responsive1');
    plugins.menu_bar = $(".menu-bar");
    plugins.area_model = $("#area-modal");


    $(".modal").detach().appendTo("body");
    if (plugins.area_model.length > 0) {
        $("#area-modal").modal("show");
        $(".yes_area").click(function () {
            $("#area-modal").modal("hide");
            let area = $(".select_area").val();
            location.href = path + "index/set_area/" + area;
        })
    }
    $(document).on("inview", ".lazyload", function () {
        console.log(1);
        let src = $(this).data("src");
        $(this).attr("src", src);
        $(this).removeClass("lazyload");
    });
    $(window).scroll(function () {
        if ($(this).scrollTop()) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
        /// fix bug .
        $(".list-custom li.has_sub > ul").fadeOut();
    });
    $("#toTop").click(function () {
        //1 second of animation time
        //html works for FFX but not Chrome
        //body works for Chrome but not FFX
        //This strange selector seems to work universally
        $("html, body").animate({ scrollTop: 0 }, 1000);
    });
    $(".index_category").click(async function (e) {
        e.preventDefault();
        let section = $(this).parents("section");
        let id = $(this).data("id");

        $(".index_category", section).removeClass("active");
        $(this).addClass("active");

        let spinner = "<div class='text-center h4 col-12'><i class='fas fa-circle-notch fa-spin'></i></div>";
        $(".index_product", section).html(spinner);
        let product = await $.ajax({
            url: path + "ajax/product",
            data: { category_id: id, limit: 10 },
            dataType: "HTML"
        });
        $(".index_product", section).html(product);
        $(".unit_product.active").trigger("click");
    });
    ////TRIGGER
    // $(".index_category.active").trigger("click");
    ////View NOW
    $(document).on("click", ".view_now_btn", async function (e) {
        e.preventDefault();
        let product = $(this).parents(".product");
        let id = product.data("id");
        let html = await $.ajax({
            url: path + "ajax/modalview/" + id,
            dataType: "HTML",
        });
        $.fancybox.open(html, {
            buttons: ["close"],
            toolbar: true,
            afterLoad: function (instance, current) {
                var inner = this.$content;
                $(".fancybox-toolbar").css({
                    visibility: 'visible',
                    opacity: 1
                })
                $(".fancybox", inner).fancybox();

                $(".unit_product.active", inner).trigger("click");
                // $(inner).off('click', '.fancybox')
                //     .on('click', '.say_no', function () {
                //         $.fancybox.close();
                //     });
                // $(".number-widget .number").autoNumeric('init', { vMin: 1, mDec: 0 });
                $('.slider-for-view').slick({
                    infinite: true,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    swipe: false,
                    fade: true,
                    adaptiveHeight: true,
                    asNavFor: '.slider-nav-view'
                });
                $('.slider-nav-view').slick({
                    infinite: true,
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    swipe: false,
                    asNavFor: '.slider-for-view',
                    dots: false,
                    focusOnSelect: true,
                });
            }
        });
    })

    if (plugins.menu_bar.length > 0) {
        $(plugins.menu_bar).click(function () {
            $(".rd-navbar-nav-wrap").addClass("active");
        })
        $(".exits-bar").click(function () {
            $(".rd-navbar-nav-wrap").removeClass("active");
        });
        $(document).scroll(function () {

        })
    }
    if (plugins.topics_view.length > 0) {
        plugins.topics_view.slick({
            dots: false,
            speed: 300,
            slidesToShow: 6,
            slidesToScroll: 6,
            responsive: [{
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2
                }
            }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
        plugins.topics_view.on({
            mouseenter: function () {
                $(".slick-arrow", this).fadeIn(500)
                //stuff to do on mouse enter
            },
            mouseleave: function () {
                $(".slick-arrow", this).fadeOut(500)
                //stuff to do on mouse leave
            }
        });
        $(".slick-arrow").hide()
    }

    //// DETAILS HÌNH ẢNH SẢN PHẨM
    if (plugins.image_view.length > 0) {
        $('.slider-for').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            swipe: false,
            fade: true,
            adaptiveHeight: true,
            asNavFor: '.slider-nav'
        });
        $('.slider-nav').slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            swipe: false,
            asNavFor: '.slider-for',
            dots: false,
            focusOnSelect: true,
        });
    }


    /**
     * NUMBER
     * @description Enables NUMBER plugin
     */

    // if (plugins.number.length) {
    $(".number", plugins.number).autoNumeric('init', { vMin: 1, mDec: 0 });
    $(document).on("change", ".number", function () {
        if ($(this).autoNumeric("get") < 1) {
            $(this).val(1);
        }
    })
    $(document).on("click", ".number-widget .down", function () {
        console.log(12)
        let parent = $(this).parent();
        let numberEl = $(".number", parent);
        var amount = parseInt(numberEl.autoNumeric("get"));
        if (amount > 1) {
            amount--;
            numberEl.val(amount);
        }
    });
    $(document).on("click", ".number-widget .up", function () {
        console.log(12)
        let parent = $(this).parent();
        let numberEl = $(".number", parent);
        var amount = parseInt(numberEl.autoNumeric("get"));
        amount++;
        numberEl.val(amount);
    });

    // }
    /**
     * UNIT
     * @description Enables UNIT plugin
     */
    // if (plugins.units.length) {
    $(document).on("click", ".unit_product", function (e) {
        e.preventDefault();
        let parent = $(this).closest(".product");
        var name = $(this).text();
        $(".dvt", parent).text("/" + name);

        $(".unit_product", parent).removeClass("btn-primary active");
        $(this).addClass("btn-primary active");

        let price = $(this).data("price");
        let prev_price = $(this).data("prev_price");
        let down_per = Math.round((parseInt(price) - parseInt(prev_price)) * 100 / parseInt(prev_price));
        $(".price-km", parent).text(number_format(price, 0, ",", ".") + "đ");
        if (prev_price > 0) {
            $(".price-prev", parent).text(number_format(prev_price, 0, ",", ".") + "đ");
            $(".sale-flash", parent).text(down_per + "%");
        } else {
            $(".price-prev", parent).empty();
        }


    });
    $(".unit_product.active").trigger("click");
    // }
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
            responsive: [{
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
                    if (e.target !== e.data[0] &&
                        $(e.data.attr('data-custom-toggle')).find($(e.target)).length &&
                        e.data.find($(e.target)).length === 0) {
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
    /*CART*/

    init_cart_icon()

    $(document).on("click", ".add-cart", function () {
        var data_cart = $.cookies.get('DATA_CART') || {};
        var cart = data_cart['details'] || [];
        /*
         * 
         */
        //        var count = $('.shop-cart .cart_count span');
        var product = $(this).closest(".product");
        var id = product.data("id");
        var qty = parseInt($(".number", product).val());
        var unit = $(".unit_product.active", product).data("id");
        var index = -1;
        $.each(cart, function (i, v) {
            if (v.id == id)
                index = i;
        });
        if (index != -1) {
            cart[index].qty = parseInt(cart[index].qty) + qty;
            cart[index].unit = unit;
        } else {
            cart.push({ id: id, qty: qty, unit: unit });
        }
        data_cart['details'] = cart;
        $.cookies.set('DATA_CART', data_cart);
        init_cart_icon()


        // var cart = $('.cart_icon').last();
        // var imgtodrag = product.find("img").eq(0);
        // if (imgtodrag.length && !detectMob()) {
        //     var imgclone = imgtodrag.clone()
        //         .offset({
        //             top: imgtodrag.offset().top,
        //             left: imgtodrag.offset().left
        //         })
        //         .css({
        //             'opacity': '0.5',
        //             'position': 'absolute',
        //             'height': '150px',
        //             'width': '150px',
        //             'z-index': '100'
        //         })
        //         .appendTo($('body'))
        //         .animate({
        //             'top': cart.offset().top + 10,
        //             'left': cart.offset().left + 10,
        //             'width': 75,
        //             'height': 75
        //         }, 1000);

        //     //            setTimeout(function () {
        //     //                cart.effect("shake", {
        //     //                    times: 2
        //     //                }, 200);
        //     //            }, 1500);

        //     imgclone.animate({
        //         'width': 0,
        //         'height': 0
        //     }, function () {
        //         $(this).detach()
        //     });
        // }
        $.toast({
            // heading: 'Warning',
            text: cart_alert,
            position: 'top-right',
            stack: false,
            // showHideTransition: 'plain',
            icon: 'success'
        })
        // alert(cart_alert);
        return false;
    });
    $('.btn-up').click(function (e) {
        e.preventDefault();
        var parent = $(this).parents(".product");
        var input_qty = $('.quantity', parent);
        var currentVal = parseInt(input_qty.val());
        if (!isNaN(currentVal)) {
            input_qty.val(currentVal + 1);
        } else {
            input_qty.val(1);
        }
        input_qty.trigger("change");
    });

    $(".btn-down").click(function (e) {
        e.preventDefault();
        var parent = $(this).parents(".product");
        var input_qty = $('.quantity', parent);

        var currentVal = parseInt(input_qty.val());
        if (!isNaN(currentVal) && currentVal > 0) {
            input_qty.val(currentVal - 1);
        } else {
            input_qty.val(1);
        }
        input_qty.trigger("change");
    });
    $(".quantity").change(function () {
        var value = $(this).val();
        var parent = $(this).parents(".product");
        var data_cart = $.cookies.get('DATA_CART') || {};
        var cart = data_cart['details'] || [];
        var id = parent.data("id");
        var index = -1;
        $.each(cart, function (i, v) {
            if (v.id == id)
                index = i;
        });
        if (index != -1) {
            cart[index].qty = value;
        }
        data_cart['details'] = cart;
        $.cookies.set('DATA_CART', data_cart);
        $(".loading-modal").addClass("show");
        $("#cboxOverlay").show();
        location.reload();
    });
    $(".remove_product").click(function (e) {
        e.preventDefault();
        if (confirm(remove_cart) == true) {
            var parent = $(this).parents(".product");
            var id = parent.data("id");
            var data_cart = $.cookies.get('DATA_CART') || {};
            var cart = data_cart['details'] || [];
            var index = -1;
            $.each(cart, function (i, v) {
                if (v.id == id)
                    index = i;
            });
            if (index != -1) {
                cart.splice(index, 1);
            }
            data_cart['details'] = cart;
            $.cookies.set('DATA_CART', data_cart);
            parent.remove();
            $(".loading-modal").addClass("show");
            $("#cboxOverlay").show();
            location.reload();
        }
    })
    $(".unit_select").change(function () {
        var value = $(this).val();
        var parent = $(this).parents(".product");
        var data_cart = $.cookies.get('DATA_CART') || {};
        var cart = data_cart['details'] || [];
        var id = parent.data("id");
        var index = -1;
        $.each(cart, function (i, v) {
            if (v.id == id)
                index = i;
        });
        if (index != -1) {
            cart[index].unit = value;
        }
        data_cart['details'] = cart;
        $.cookies.set('DATA_CART', data_cart);
        $(".loading-modal").addClass("show");
        $("#cboxOverlay").show();
        location.reload();
    });
})

function init_cart_icon() {
    var data_cart = $.cookies.get('DATA_CART') || {};
    var cart = data_cart['details'] || [];
    let count = cart.length;
    $(".cartCount2,.cartCount").text(count);
}

function introCarousel() {
    var introCarousel = $(".carousel");
    if (introCarousel.length) {
        var introCarouselIndicators = $(".carousel-indicators");
        introCarousel.on('slide.bs.carousel', function (e) { });
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

function number_format(number, decimals, decPoint, thousandsSep) { // eslint-disable-line camelcase
    //  discuss at: https://locutus.io/php/number_format/
    // original by: Jonas Raoni Soares Silva (https://www.jsfromhell.com)
    // improved by: Kevin van Zonneveld (https://kvz.io)
    // improved by: davook
    // improved by: Brett Zamir (https://brett-zamir.me)
    // improved by: Brett Zamir (https://brett-zamir.me)
    // improved by: Theriault (https://github.com/Theriault)
    // improved by: Kevin van Zonneveld (https://kvz.io)
    // bugfixed by: Michael White (https://getsprink.com)
    // bugfixed by: Benjamin Lupton
    // bugfixed by: Allan Jensen (https://www.winternet.no)
    // bugfixed by: Howard Yeend
    // bugfixed by: Diogo Resende
    // bugfixed by: Rival
    // bugfixed by: Brett Zamir (https://brett-zamir.me)
    //  revised by: Jonas Raoni Soares Silva (https://www.jsfromhell.com)
    //  revised by: Luke Smith (https://lucassmith.name)
    //    input by: Kheang Hok Chin (https://www.distantia.ca/)
    //    input by: Jay Klehr
    //    input by: Amir Habibi (https://www.residence-mixte.com/)
    //    input by: Amirouche
    //   example 1: number_format(1234.56)
    //   returns 1: '1,235'
    //   example 2: number_format(1234.56, 2, ',', ' ')
    //   returns 2: '1 234,56'
    //   example 3: number_format(1234.5678, 2, '.', '')
    //   returns 3: '1234.57'
    //   example 4: number_format(67, 2, ',', '.')
    //   returns 4: '67,00'
    //   example 5: number_format(1000)
    //   returns 5: '1,000'
    //   example 6: number_format(67.311, 2)
    //   returns 6: '67.31'
    //   example 7: number_format(1000.55, 1)
    //   returns 7: '1,000.6'
    //   example 8: number_format(67000, 5, ',', '.')
    //   returns 8: '67.000,00000'
    //   example 9: number_format(0.9, 0)
    //   returns 9: '1'
    //  example 10: number_format('1.20', 2)
    //  returns 10: '1.20'
    //  example 11: number_format('1.20', 4)
    //  returns 11: '1.2000'
    //  example 12: number_format('1.2000', 3)
    //  returns 12: '1.200'
    //  example 13: number_format('1 000,50', 2, '.', ' ')
    //  returns 13: '100 050.00'
    //  example 14: number_format(1e-8, 8, '.', '')
    //  returns 14: '0.00000001'

    number = (number + '').replace(/[^0-9+\-Ee.]/g, '')
    var n = !isFinite(+number) ? 0 : +number
    var prec = !isFinite(+decimals) ? 0 : Math.abs(decimals)
    var sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep
    var dec = (typeof decPoint === 'undefined') ? '.' : decPoint
    var s = ''

    var toFixedFix = function (n, prec) {
        if (('' + n).indexOf('e') === -1) {
            return +(Math.round(n + 'e+' + prec) + 'e-' + prec)
        } else {
            var arr = ('' + n).split('e')
            var sig = ''
            if (+arr[1] + prec > 0) {
                sig = '+'
            }
            return (+(Math.round(+arr[0] + 'e' + sig + (+arr[1] + prec)) + 'e-' + prec)).toFixed(prec)
        }
    }

    // @todo: for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec).toString() : '' + Math.round(n)).split('.')
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep)
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || ''
        s[1] += new Array(prec - s[1].length + 1).join('0')
    }

    return s.join(dec)
}

function detectMob() {
    return (window.innerWidth <= 800);
}
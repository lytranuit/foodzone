<?= $widget->post_header("Contact") ?>
<section class="text-center text-sm-left section-50 section-sm-top-100 section-sm-bottom-100">
    <div class="container">
        <div class="row justify-content-xs-center">
            <div class="col-md-8">
                <h4 class="font-default text-center">Get in Touch</h4>
                <p class="text-center">We are available 24/7 by fax, e-mail or by phone. You can also use our quick contact form to ask a question about our services that we offer on a regular basis. We would be pleased to answer your questions.</p>

            </div>
            <div class="col-md-4 offset-top-50 offset-md-top-0 text-left">
                <aside class="inset-lg-left-70">
                    <div class="row">
                        <div class="col-xs-6 col-md-12">
                            <div class="h6 text-uppercase">Follow us</div>
                            <div class="text-subline offset-top-15"></div>
                            <div class="offset-top-25">
                                <ul class="list-inline" style="font-size: 25px;">
                                    <li><a target="_blank" class="link-darkest icon icon-xxs-mod-1 fab fa-facebook" href="http://www.facebook.com/sharer/sharer.php?u={{current_url()}}"></a></li>
                                    <li><a target="_blank" class="link-darkest icon icon-xxs-mod-1 fab fa-twitter" href="https://twitter.com/intent/tweet?text=Link&url={{current_url()}}"></a></li>

                                    <li class="zalo-share-button" data-href="{{current_url()}}" data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=true>
                                        <a href='#' class="link-darkest icon icon-xxs-mod-1 zalo">
                                            <i></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-12 offset-top-50 offset-xs-top-0 offset-md-top-50">
                            <div class="block-info">
                                <div class="h6 text-uppercase">Phone</div>
                                <div class="text-subline offset-top-15"></div>
                                <div class="offset-top-25">
                                    <div class="unit unit-horizontal unit-middle unit-spacing-xs">
                                        <div class="unit-left"><span class="icon icon-xs icon-primary text-middle mdi mdi-phone"></span></div>
                                        <div class="unit-body"><a class="link-default" href="tel:{{$options['hot_line']}}">{{$options['hot_line']}}</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-12 offset-top-50">
                            <div class="block-info">
                                <div class="h6 text-uppercase">Address</div>
                                <div class="text-subline offset-top-15"></div>
                                <div class="offset-top-25 unit unit-horizontal unit-spacing-xs">
                                    <div class="unit-left"><span class="icon icon-xs icon-primary text-middle mdi mdi-map-marker"></span></div>
                                    <div class="unit-body"><a class="link-default" href="#">{{$options['dia_chi']}}</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-12 offset-top-50">
                            <div class="block-info">
                                <div class="h6 text-uppercase">Opening Hours</div>
                                <div class="text-subline offset-top-15"></div>
                                <div class="offset-top-25 unit unit-horizontal unit-spacing-xs">
                                    <div class="unit-left"><span class="icon icon-xs icon-primary mdi mdi-clock text-middle"></span></div>
                                    <div class="unit-body"><span class="text-dark inset-left-5">{{$options['hour_open']}}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
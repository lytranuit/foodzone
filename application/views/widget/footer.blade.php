<footer style="background: #223f4f;color: white">
    <section class="section-50">
        <div class="container-wide">
            <div class="row border-left-cell">
                <div class="col-sm-12 col-md-9">
                    <a class="brand brand-inverse" href="{{base_url()}}">
                        <img src="{{base_url()}}public/image/logo2.png" width="200" />
                    </a>
                    <p style="color: #fdaf17;
                       font-weight: bold;
                       font-size: 17px;
                       padding: 5px 0 10px;
                       text-transform: uppercase;
                       margin: 10px 0px;">{{$options['company_name']}}</p>
                    <p>{{lang("footer_tru_so")}}: {{$options['dia_chi']}}</p>
                    <p>{{lang("footer_phone")}}: <a style="color: #fdaf17;" href="tel:{{$options['hot_line']}}">{{$options['hot_line']}}</span></p>
                </div>
                <div class="col-sm-12 col-md-3">
                    <ul class="list-inline" style="font-size: 25px;">
                        <li><a target="_blank" class="icon icon-xxs-mod-1 fab fa-facebook icon-primary" href="http://www.facebook.com/sharer/sharer.php?u={{current_url()}}"></a></li>
                        <li><a target="_blank" class="icon icon-xxs-mod-1 fab fa-twitter icon-primary" href="https://twitter.com/intent/tweet?text=Link&url={{current_url()}}"></a></li>
                        <li class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=true>
                            <a href='#' class="icon icon-xxs-mod-1 zalo">
                                <i></i>
                            </a>
                        </li>
                    </ul>
                    <div class="open-door clear">
                        <span class="open-text">{{lang("footer_open")}}</span>
                        <span class="open-time">{{$options['hour_open']}}</span>
                    </div>
                    <div class="customer">
                        <span>{{lang("footer_customer")}}: </span>
                        <span class="phone">{{$options['hot_line']}}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
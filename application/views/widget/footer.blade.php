<footer style="background: #223f4f;color: white">
    <section class="section-50">
        <div class="container-wide">
            <div class="row border-left-cell">
                <div class="col-sm-12 col-md-9">
                    <a class="brand brand-inverse" href="index.html">
                        <svg x="0px" y="0px" width="157px" height="41px" viewBox="0 0 157 41">
                            <text transform="matrix(1 0 0 1 1.144409e-004 32)" fill="#2C2D2F" font-family="'Grand Hotel'" font-size="45.22">QuickFood</text>
                            <path fill-rule="evenodd" clip-rule="evenodd" fill="#EB5453" d="M43.743,2.954c2.606,0,4.719,2.091,4.719,4.672  c0,2.58-2.113,4.672-4.719,4.672c-2.606,0-4.719-2.091-4.719-4.672C39.024,5.045,41.137,2.954,43.743,2.954z"></path>
                        </svg>
                    </a>
                    <p style="color: #fdaf17;
                       font-weight: bold;
                       font-size: 17px;
                       padding: 5px 0 10px;
                       text-transform: uppercase;
                       margin: 10px 0px;">Công Ty Cổ Phần Thương Mại Sim Ba</p>
                    <p>Trụ sở chính: {{$options['dia_chi']}}</p>
                    <p>Điện thoại liên hệ: <a style="color: #fdaf17;" href="tel:{{$options['hot_line']}}">{{$options['hot_line']}}</span></p>
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
                        <span class="open-text">Giờ mở cửa</span>
                        <span class="open-time">{{$options['hour_open']}}</span>
                    </div>
                    <div class="customer">
                        <span>Chăm sóc khách hàng: </span>
                        <span class="phone">{{$options['hot_line']}}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<?= $widget->post_header($product->{pick_language($product, 'name_')}) ?>

<section class="section-50 details bg-gray-lighter">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-9">
                <div class="card card-customer product">
                    <div class="card-body">
                        <div class="row justify-content-xs-center">
                            <div class="col-lg-6 text-lg-left">
                                <div>
                                    <a class="fancybox" href="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif">
                                        <img src="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif" class='img-responsive' />
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 text-sm-left offset-top-10 offset-sm-top-0">
                                <div class="reveal-xs-flex justify-content-xs-center align-content-xs-center justify-content-sm-start">
                                    <h5 class="font-default">{{ $product->{pick_language($product,'name_')} }}</h5>
                                </div>
                                <div class="offset-top-15">
                                    <p>
                                        {{$product->code}}
                                    </p>
                                </div>
                                <div class="offset-top-15">
                                    <div class="group-sm">
                                        <a class="bg-facebook" href="http://www.facebook.com/sharer/sharer.php?u={{current_url()}}" target="_blank"><span class="fab fa-facebook"></span> Share</a>
                                        <a class="bg-twitter" href="https://twitter.com/intent/tweet?text=Link&url={{current_url()}}" target="_blank"><span class="fab fa-twitter"></span> Tweet</a>
                                        <div class="zalo-share-button" data-href="{{current_url()}}" data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=true href='#'>
                                            <a class="zalo" href="#">
                                                <i></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <hr class="offset-top-10 veil reveal-sm-block">
                                <div class="offset-top-10">
                                    @if(empty($product->price_km))
                                    <span class="price">{{number_format($product->price,0,",",".")}}đ</span>
                                    @else
                                    <span class="price price-prev">{{number_format($product->price,0,",",".")}}đ</span>
                                    <span class="price">{{ number_format($product->km_price,0,",",".") }}đ</span>
                                    @endif
                                </div>
                                @if(!empty($product->units))
                                <div class="offset-top-10">
                                    <span>ĐVT:</span>
                                    <div class="unit_list">
                                        @foreach($product->units as $key=>$unit)
                                        <button class="btn btn-lg unit_product @if(array_keys($product->units)[0] == $key) btn-primary active @endif">
                                            {{ $unit->{pick_language($unit,'name_')} }}
                                        </button>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                                <div class="offset-top-10">
                                    <div class="group-sm">
                                        <div class="stepper-type-1">
                                            <div class="stepper number-widget">
                                                <input class="form-control stepper-input number text-center" type="text" data-zeros="true" value="1" min="1" max="20" readonly="">
                                                <span class="stepper-arrow up">
                                                </span>
                                                <span class="stepper-arrow down">
                                                </span>
                                            </div>
                                        </div><a class="text-top btn btn-burnt-sienna btn-shape-circle" href="shop-cart.html"><span>Add to Cart</span></a>
                                    </div>
                                </div>
                                <div class="offset-top-30">
                                    @if(isset($product->origin) && !empty($product->origin))
                                    <div>
                                        - Xuất xứ: {{ $product->origin->{pick_language($product->origin,'name_')} }}
                                    </div>
                                    @endif
                                    @if(isset($product->preservation) && !empty($product->preservation))
                                    <div>
                                        - Bảo quản: {{ $product->preservation->{pick_language($product->preservation,'name_')} }}
                                    </div>
                                    @endif
                                    @if(isset($product->origin) && $product->expiry_date != "")
                                    <div>
                                        - Hạn sử dụng: {{ $product->expiry_date }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="py-5">
                    <div class="card card-custom">
                        <div class="card-body">
                            <div class="responsive-tabs responsive-tabs-horizontal responsive-tabs-horizontal-background" style="display: block; width: 100%;color:black;">
                                <ul class="resp-tabs-list container">
                                    <li class="resp-tab-item resp-tab-active" aria-controls="tab_item-0" role="tab">Mô tả</li>
                                    <li class="resp-tab-item" aria-controls="tab_item-1" role="tab">Thành phần nguyên liệu</li>
                                    <li class="resp-tab-item" aria-controls="tab_item-2" role="tab">Hướng dẫn sử dụng</li>
                                </ul>
                                <div class="resp-tabs-container">
                                    <div class="resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0">
                                        <div class="fr-view">
                                            <?= $product->{pick_language($product, 'detail_')} ?>
                                        </div>
                                    </div>
                                    <div class="resp-tab-content" aria-labelledby="tab_item-1">
                                        <div class="fr-view">
                                            <?= $product->{pick_language($product, 'element_')} ?>
                                        </div>
                                    </div>
                                    <div class="resp-tab-content" aria-labelledby="tab_item-2">
                                        <div class="fr-view">
                                            <?= $product->{pick_language($product, 'guide_')} ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-3 offset-top-20 offset-md-top-0">
                <?= $widget->right() ?>
            </div>
            <div class="col-lg-12 offset-top-20">
                <div class="card card-custom">
                    <div class="card-header">
                        Sản phẩm liên quan
                    </div>
                    <div class="card-body">
                        <div class="responsive">
                            @if(!empty($product_related))
                            @foreach($product_related as $product)
                            <?php
                            // print_r($product->price_km);
                            // die();
                            if (!empty($product->price_km)) {
                                $price_km = array();
                                foreach ($product->price_km as $row1) {
                                    $now =  date("Y-m-d H:i:s");
                                    if ($row1->date_from < $now && $row1->date_to > $now)
                                        $price_km[] = $row1;
                                }
                                $product->km_price = $price_km[0]->price;
                            }
                            ?>
                            <div class="thumbnail-menu-modern border border-light product">
                                <input type="hidden" value="1" class="number" />
                                <figure>
                                    <a href="{{base_url()}}index/details/{{$product->id}}">
                                        <img class="img-responsive" src="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif" alt="">
                                    </a>
                                </figure>
                                <div class="caption">
                                    <div class="font-weight-bold"><a class="link link-default" href="{{base_url()}}index/details/{{$product->id}}" tabindex="-1">{{ $product->{pick_language($product,'name_')} }}</a></div>
                                    <div>

                                        @if(!isset($product->price_km) || empty($product->price_km))
                                        <span class="price">{{number_format($product->price,0,",",".")}}đ</span>
                                        @else
                                        <span class="price price-prev">{{number_format($product->price,0,",",".")}}đ</span>
                                        <span class="price">{{ number_format($product->km_price,0,",",".") }}đ</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="sale">
                                    <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                        <button type="button" class="btn btn-lg btn-danger ">Add to cart</button>
                                        @if(!empty($product->units))
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button" class="btn btn-danger border-left dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            </button>

                                            <div class="dropdown-menu unit_list" aria-labelledby="btnGroupDrop1">
                                                @foreach($product->units as $key=>$unit)
                                                <a class="dropdown-item unit_product @if(array_keys($product->units)[0] == $key) btn-primary active @endif" href="#">
                                                    {{ $unit->{pick_language($unit,'name_')} }}
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </div>

                            @endforeach
                            @endif

                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('.responsive').slick({
                            dots: false,
                            infinite: false,
                            speed: 300,
                            slidesToShow: 4,
                            slidesToScroll: 4,
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
                    });
                </script>
            </div>
        </div>
    </div>
</section>
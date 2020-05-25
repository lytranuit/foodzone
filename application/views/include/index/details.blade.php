<?= $widget->post_header($product->{pick_language($product, 'name_')}) ?>

<section class="section-50 details bg-gray-lighter">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-9">
                <div class="card card-customer product" data-id="{{$product->id}}">
                    <div class="card-body">
                        <div class="row justify-content-xs-center">
                            <div class="col-lg-6 text-lg-left area_image">
                                <!-- <div>
                                    <a class="fancybox" href="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif">
                                        <img src="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif" class='img-responsive' />
                                    </a>
                                </div> -->

                                <div class="slider-for">
                                    <div class="item">
                                        <a href="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif" class="fancybox">
                                            <img class="product-featured-image img-responsive" src="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif" data-zoom-image="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif">
                                        </a>
                                    </div>
                                    @if(!empty($product->other_image))
                                    @foreach($product->other_image as $row)
                                    <div class="item">
                                        <a href="@if($row->type == 2) http://simbaeshop.com{{$row->src}} @else {{base_url()}}{{$row->src}} @endif" class="fancybox">
                                            <img class="product-featured-image img-responsive" src="@if($row->type == 2) http://simbaeshop.com{{$row->src}} @else {{base_url()}}{{$row->src}} @endif" data-zoom-image="@if($row->type == 2) http://simbaeshop.com{{$row->src}} @else {{base_url()}}{{$row->src}} @endif">
                                        </a>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                @if(!empty($product->other_image))
                                <div class="slider-nav">
                                    <div class="item m-2 border">
                                        <a href="javascript:void(0)" data-image="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif" data-zoom-image="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif">
                                            <img class="img-responsive" src="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif" data-zoom-image="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif">
                                        </a>
                                    </div>

                                    @foreach($product->other_image as $row)
                                    <div class="item m-2 border">
                                        <a href="javascript:void(0)" data-image="@if($row->type == 2) http://simbaeshop.com{{$row->src}} @else {{base_url()}}{{$row->src}} @endif" data-zoom-image="@if($row->type == 2) http://simbaeshop.com{{$row->src}} @else {{base_url()}}{{$row->src}} @endif">
                                            <img class="img-responsive" src="@if($row->type == 2) http://simbaeshop.com{{$row->src}} @else {{base_url()}}{{$row->src}} @endif">
                                        </a>
                                    </div>
                                    @endforeach

                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6 text-sm-left offset-top-10 offset-sm-top-0">
                                <div class="reveal-xs-flex justify-content-xs-center align-content-xs-center justify-content-sm-start">
                                    <h5 class="font-default">{{ $product->{pick_language($product,'name_')} }}</h5>
                                </div>
                                <div class="offset-top-15">
                                    <p>
                                        Code:{{$product->code}}
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
                                    <span class="price price-prev">@if(isset($product->prev_price) && $product->prev_price > 0)
                                        {{ number_format($product->prev_price,0,",",".") }}đ
                                        @endif</span>
                                    <span class="price price-km">{{ number_format($product->price,0,",",".") }}đ</span>
                                </div>
                                @if(!empty($product->units))
                                <div class="offset-top-10">
                                    <span>ĐVT:</span>
                                    <div class="unit_list">
                                        @foreach($product->units as $key=>$unit)
                                        <button class="mr-2 btn btn-lg unit_product @if(array_keys($product->units)[0] == $key) btn-primary active @endif" data-id="{{$unit->id}}" data-price="{{$unit->price}}" data-prev_price="@if(isset($unit->prev_price) && $unit->prev_price > 0){{$unit->prev_price}}@endif">
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
                                        </div>
                                        <a class="text-top btn btn-danger add-cart" href="#">
                                            <span>Add to Cart</span>
                                        </a>
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

                <section class="pt-5">
                    <div class="card card-custom">
                        <div class="card-body">
                            <div class="responsive-tabs responsive-tabs-horizontal responsive-tabs-horizontal-background" style="display: block; width: 100%;color:black;">
                                <ul class="resp-tabs-list container">
                                    <li class="resp-tab-item resp-tab-active" aria-controls="tab_item-0" role="tab">{{lang('details_mo_ta')}}</li>
                                    <li class="resp-tab-item" aria-controls="tab_item-1" role="tab">{{lang('details_huong_dan')}}</li>
                                </ul>
                                <div class="resp-tabs-container">
                                    <div class="resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0">
                                        <div class="fr-view">
                                            <?= $product->{pick_language($product, 'detail_')} ?>
                                        </div>
                                    </div>
                                    <div class="resp-tab-content" aria-labelledby="tab_item-1">
                                        <div class="fr-view">
                                            <?= $product->{pick_language($product, 'guide_')} ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="pt-5">
                    <div class="card card-custom">
                        <div class="card-header">
                            {{lang('details_sp_lien_quan')}}
                        </div>
                        <div class="card-body">
                            <div class="responsive">
                                @if(!empty($product_related))
                                @foreach($product_related as $row)
                                <div class="thumbnail-menu-modern border border-light product" data-id="{{$row->id}}">
                                    <input type="hidden" value="1" class="number" />
                                    <figure>
                                        <a href="{{base_url()}}index/details/{{$row->id}}">
                                            <img class="img-responsive" src="@if($row->image->type == 2) http://simbaeshop.com{{$row->image->src}} @else {{base_url()}}{{$row->image->src}} @endif" alt="">
                                        </a>
                                    </figure>
                                    <div class="caption">
                                        <div class="font-weight-bold"><a class="link link-default" href="{{base_url()}}index/details/{{$row->id}}" tabindex="-1">{{ $row->{pick_language($row,'name_')} }}</a></div>
                                        <div>
                                            <span class="price price-prev">@if(isset($row->prev_price) && $row->prev_price > 0)
                                                {{ number_format($row->prev_price,0,",",".") }}đ
                                                @endif</span>
                                            <span class="price price-km">{{ number_format($row->price,0,",",".") }}đ</span>
                                        </div>
                                    </div>
                                    <div class="sale">
                                        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                            <button type="button" class="btn btn-danger add-cart">Add to cart</button>
                                            @if(!empty($row->units))
                                            <div class="btn-group dropup" role="group">
                                                <button id="btnGroupDrop1" type="button" class="btn btn-danger border-left dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                </button>

                                                <div class="dropdown-menu unit_list" aria-labelledby="btnGroupDrop1">
                                                    @foreach($row->units as $key=>$unit)
                                                    <a class="dropdown-item unit_product @if(array_keys($row->units)[0] == $key) btn-primary active @endif" href="#" data-id="{{$unit->id}}" data-price="{{$unit->price}}" data-prev_price="@if(isset($unit->prev_price) && $unit->prev_price > 0){{$unit->prev_price}}@endif">
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
                </section>

            </div>
            <div class="col-lg-3 offset-top-20 offset-md-top-0">
                <?= $widget->right() ?>
            </div>
        </div>
    </div>
</section>
<section class="text-center py-3 bg-image bg-image-breadcrumbs">
    <div class="container-wide">
        <div class="row no-gutters">
            <div class="col-xs-12 col-xl-preffix-1 col-xl-11">
                <ul class="breadcrumbs-custom">
                    <li><a href="{{base_url()}}">{{lang('home')}}</a></li>
                    @if(isset($category))
                    <li><a href="{{base_url()}}index/category/{{$category->id}}">{{ $category->{pick_language($category, 'name_')} }}</a></li>
                    @endif
                    <li class="active">{{ $product->{pick_language($product, 'name_')} }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="section-50 details bg-gray-lighter">
    <div class="container-wide">
        <div class="row no-gutters">
            <div class="col-lg-9">
                <div class="card card-customer product" data-id="{{$product->id}}">
                    <div class="card-body">
                        <div class="row justify-content-xs-center">
                            <div class="col-lg-6 text-lg-left area_image">
                                <div class="slider-for">
                                    <div class="item">
                                        <a data-fancybox="gallery" href="http://simbaeshop.com{{$product->image_url}}" class="fancybox d-flex">
                                            <img class="product-featured-image img-responsive mx-auto" src="http://simbaeshop.com{{$product->image_url}}">
                                        </a>
                                    </div>
                                    @if(!empty($product->other_image))
                                    @foreach($product->other_image as $row)
                                    <div class="item">
                                        <a data-fancybox="gallery" href="@if($row->type == 2) http://simbaeshop.com{{$row->src}} @else {{base_url()}}{{$row->src}} @endif" class="fancybox d-flex">
                                            <img class="product-featured-image img-responsive mx-auto" src="@if($row->type == 2) http://simbaeshop.com{{$row->src}} @else {{base_url()}}{{$row->src}} @endif">
                                        </a>
                                    </div>
                                    @endforeach
                                    @endif
                                </div>
                                @if(!empty($product->other_image))
                                <div class="slider-nav">
                                    <div class="item m-2 border">
                                        <a href="javascript:void(0)">
                                            <img class="img-responsive" src="http://simbaeshop.com{{$product->image_url}}">
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
                                        {{lang("code")}}: {{$product->code}}
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
                                    <span>{{lang("dvt")}}:</span>
                                    <div class="unit_list">
                                        @foreach($product->units as $key=>$unit)
                                        <button class="mr-2 btn unit_product @if(array_keys($product->units)[0] == $key) btn-primary active @endif" data-id="{{$unit->id}}" data-price="{{$unit->price}}" data-prev_price="@if(isset($unit->prev_price) && $unit->prev_price > 0){{$unit->prev_price}}@endif">
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
                                            <span>{{lang("add_to_cart")}}</span>
                                        </a>
                                    </div>
                                </div>

                                <hr class="offset-top-10 veil reveal-sm-block">
                                <div class="offset-top-10">
                                    @if($product->{pick_language($product,"volume_")} != "")
                                    <div>
                                        - {{lang('qui_cach')}}: {{ $product->{pick_language($product,'volume_')} }}
                                    </div>
                                    @endif
                                    @if(isset($product->origin) && !empty($product->origin))
                                    <div>
                                        - {{lang('xuat_xu')}}: {{ $product->origin->{pick_language($product->origin,'name_')} }}
                                    </div>
                                    @endif
                                    @if(isset($product->preservation) && !empty($product->preservation))
                                    <div>
                                        - {{lang('bao_quan')}}: {{ $product->preservation->{pick_language($product->preservation,'name_')} }}
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
                    <div class="card card-custom1">
                        <div class="card-header">
                            <div class="header_title">
                                {{lang('details_sp_lien_quan')}}
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="responsive">
                                @if(!empty($product_related))
                                @foreach($product_related as $row)

                                <div class="pr-2 pb-2">
                                    <div class="thumbnail-menu-modern border border-light product" data-id="{{$row->id}}">
                                        <input type="hidden" value="1" class="number" />
                                        <figure>
                                            <a href="{{base_url()}}index/details/{{$row->id}}">
                                                <img class="img-responsive" src="http://simbaeshop.com{{$row->image_url}}" alt="">
                                            </a>
                                            <div class="view_now d-flex align-items-center">
                                                <a href="#" class="btn btn-danger mx-auto view_now_btn">{{lang("view")}}</a>
                                            </div>
                                        </figure>
                                        <div class="caption">
                                            <div>{{$row->code}}</div>
                                            <div class="font-weight-bold"><a class="link link-default" href="{{base_url()}}index/details/{{$row->id}}" tabindex="-1">{{ $row->{pick_language($row,'name_')} }}</a></div>
                                            <div>
                                                <span class="price price-prev">@if(isset($row->prev_price) && $row->prev_price > 0)
                                                    {{ number_format($row->prev_price,0,",",".") }}đ
                                                    @endif</span>
                                                <span class="price price-km">{{ number_format($row->price,0,",",".") }}đ</span>
                                                @if(!empty($row->units))
                                                <span class="dvt" style="font-size: 16px;"> / {{ $row->units[0]->{pick_language($row->units[0],'name_')} }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="sale">
                                            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                                                <button type="button" class="btn btn-danger add-cart"><i class="fas fa-shopping-cart hidden-md hidden-lg"></i><span class="hidden-xs">{{lang("add_to_cart")}}</span></button>
                                                @if(!empty($row->units))
                                                <div class="btn-group dropup" role="group">
                                                    <button id="btnGroupDrop1" type="button" class="btn btn-danger border-left dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    </button>

                                                    <div class="dropdown-menu unit_list" aria-labelledby="btnGroupDrop1">
                                                        @foreach($row->units as $key=>$unit)
                                                        <a class="dropdown-item unit_product @if($key==0) btn-primary active @endif" href="#" data-id="{{$unit->id}}" data-price="{{$unit->price}}" data-prev_price="@if(isset($unit->prev_price) && $unit->prev_price > 0){{$unit->prev_price}}@endif">
                                                            {{ $unit->{pick_language($unit,'name_')} }}
                                                        </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                                @endif

                                            </div>
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
<?= $widget->post_header($product->{pick_language($product, 'name_')}) ?>

<section class="section-50 section-sm-100 details bg-gray-lighter">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-9">
                <div class="card card-customer">
                    <div class="card-body">
                        <div class="row justify-content-xs-center">
                            <div class="col-lg-6 text-lg-left">
                                <div class="easyzoom easyzoom--adjacent">
                                    <a href="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif">
                                        <img src="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif" class='img-responsive' />
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-6 text-sm-left offset-top-10 offset-sm-top-0">
                                <div class="reveal-xs-flex justify-content-xs-center align-content-xs-center justify-content-sm-start">
                                    <h5 class="font-default">{{ $product->{pick_language($product,'name_')} }}</h5>
                                    <div class="inset-xs-left-50 offset-top-0">
                                        <div class="team-member-position team-member-position-burnt-sienna"><span class="big text-italic text-middle">Hot</span></div>
                                    </div>
                                </div>
                                <div class="offset-top-15">
                                    <p>
                                        {{$product->str_list_category}}
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
                                <div class="offset-top-10">
                                    <div class="group-sm">
                                        <div class="stepper-type-1">
                                            <div class="stepper "><input class="form-control stepper-input" type="number" data-zeros="true" value="1" min="1" max="20" readonly=""><span class="stepper-arrow up"></span><span class="stepper-arrow down"></span></div>
                                        </div><a class="text-top btn btn-burnt-sienna btn-shape-circle" href="shop-cart.html"><span>Order Online</span></a>
                                    </div>
                                </div>
                                <div class="offset-top-30">

                                    <div>
                                        {{ $product->{pick_language($product,'description_')} }}
                                    </div>
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
        </div>
    </div>
</section>
<section class="section-50 section-sm-top-80 section-sm-bottom-100 bg-gray-lighter text-center">
    <h3>Ready to Eat</h3>
    <div class="responsive-tabs responsive-tabs-button responsive-tabs-horizontal responsive-tabs-carousel offset-top-40">
        <ul class="resp-tabs-list">
            @foreach($list_category as $key=>$row)
            <li class="resp-tab-item @if($key == 0) resp-tab-active @endif" aria-controls="tab_item-{{$key}}" role="tab">{{ $row->{pick_language($row,'name_')} }}</li>
            @endforeach
        </ul>
        <div class="resp-tabs-container text-left">
            @foreach($list_category as $key=>$row)
            <!--CATEGORY-->
            <div class="resp-tab-content @if($key == 0) resp-tab-content-active @endif" aria-labelledby="tab_item-{{$key}}">
                <!-- Slick Carousel-->
                <div class="slick-tab-centered slick-slider" data-arrows="true" data-loop="true" data-dots="false" data-swipe="true" data-items="1" data-xs-items="1" data-sm-items="2" data-md-items="3" data-lg-items="3" data-xl-items="5" data-center-mode="true" data-center-padding="10">
                    @foreach($row->product as $product)
                    <div class="item">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="{{base_url()}}{{$product->image->src}}" alt="">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="{{base_url()}}index/details/{{$product->id}}" tabindex="-1">{{ $product->{pick_language($product,'name_')} }}</a></h5>
                                <p class="text-italic">{{ $product->{pick_language($product,'description_')} }}</p>
                                <p><span class="price">{{number_format($product->price,0,",",".")}}</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html" tabindex="-1">Order Online</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
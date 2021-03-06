<main class="view_product" style="max-width: 90%;min-width:1000px;">
    <div class="product" data-id="{{$product->id}}">
        <div class="row justify-content-xs-center">
            <div class="col-lg-4 text-lg-left area_image">
                <div class="slider-for-view">
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
                <div class="slider-nav-view">
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
            <div class="col-lg-8 text-sm-left offset-top-10 offset-sm-top-0">
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

                <hr class="mt-2">
                <div class="mt-2">
                    <span class="price price-prev">@if(isset($product->prev_price) && $product->prev_price > 0)
                        {{ number_format($product->prev_price,0,",",".") }}đ
                        @endif</span>
                    <span class="price price-km">{{ number_format($product->price,0,",",".") }}đ</span>
                </div>
                @if(!empty($product->units))
                <div class="mt-2">
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
                <div class="mt-2">
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

                <hr class="my-2">
                <div class="my-2">
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
                <hr class="my-2">
                <div class="mt-2 fr-view">
                    <?= $product->foodzone->{pick_language($product->foodzone, 'detail_')} ?>
                </div>
            </div>
        </div>
    </div>
</main>
<script>
    $(document).ready(function() {
        $(".number-widget .number").autoNumeric('init', {
            vMin: 1,
            mDec: 0
        });
    })
</script>
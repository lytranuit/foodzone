@if(!empty($data))
@foreach($data as $product)
<div class="col-6 col-lg-2dot4 pb-2">
    <div class="thumbnail-menu-modern border-right border-light product" data-id="{{$product->id}}">
        <input type="hidden" value="1" class="number" />
        <figure>
            <a href="{{base_url()}}index/details/{{$product->id}}" class="d-block p-lg-5 p-md-3">
                <img class="img-responsive lazyload" src="{{base_url()}}public/image/lazy_image.gif" data-src="http://simbaeshop.com{{$product->image_url}}" alt="">
            </a>
            <div class="view_now d-flex align-items-center">
                <a href="#" class="btn btn-danger mx-auto view_now_btn">{{lang("view")}}</a>
            </div>
            <div class="sale-flash">
                <span>@if(isset($product->down_per))
                    {{$product->down_per}}%
                    @endif
                </span>
            </div>
        </figure>

        <div class="caption">
            <div>{{$product->code}}</div>
            <div class="font-weight-bold"><a class="link link-default" href="{{base_url()}}index/details/{{$product->id}}" tabindex="-1">{{ $product->{pick_language($product,'name_')} }}</a></div>
            <div>
                <span class="price price-prev">@if(isset($product->prev_price) && $product->prev_price > 0)
                    {{ number_format($product->prev_price,0,",",".") }}đ
                    @endif</span>
                <span class="price price-km">{{ number_format($product->price,0,",",".") }}đ</span>
                @if(!empty($product->units))
                <span class="dvt" style="font-size: 16px;"> / {{ $product->units[0]->{pick_language($product->units[0],'name_')} }}</span>
                @endif
            </div>
        </div>
        <div class="sale">
            <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
                <button type="button" class="btn btn-danger add-cart"><i class="fas fa-shopping-cart hidden-md hidden-lg"></i><span class="hidden-xs">{{lang("add_to_cart")}}</span></button>
                @if(!empty($product->units))
                <div class="btn-group dropup" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-danger border-left dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </button>

                    <div class="dropdown-menu unit_list" aria-labelledby="btnGroupDrop1">
                        @foreach($product->units as $key=>$unit)
                        <a class="dropdown-item unit_product @if($key == 0) btn-primary active @endif" href="#" data-id="{{$unit->id}}" data-price="{{$unit->price}}" data-prev_price="@if(isset($unit->prev_price) && $unit->prev_price > 0){{$unit->prev_price}}@endif">
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
<?= $widget->index_slider() ?>
<section class="section-50 bg-gray-lighter">
    <div class="container-wide">
        <div class="row">
            <div class="col-12">
                <div class="card card-custom">
                    <h4 class="text-center">Topics</h4>
                    <div class="responsive1" style="min-height: 200px;">
                        @foreach($topics as $row)
                        <div class="item m-2">
                            <a class="" href="{{base_url()}}index/category/{{$row->id}}">
                                <img class="img-responsive" src="@if(isset($row->image)){{$row->image->src}}@endif" alt="">
                                <div class="caption text-center">
                                    <p>
                                        {{ $row->{pick_language($row,'name_')} }}
                                    </p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@foreach($category as $row)
<section class="section-20 bg-gray-lighter">
    <div class="container-wide">
        <div class="row">
            <div class="col-12">
                <div class="card card-custom">
                    <h5 class="card-header">
                        <a href="{{base_url()}}index/category/{{$row->id}}" class="text-black">
                            {{ $row->{pick_language($row,'name_')} }}
                        </a>
                        <div style="margin-left:auto;font-size:13px;">
                            <a class="" href="{{base_url()}}index/category/{{$row->id}}">Xem thêm</a>
                        </div>
                    </h5>

                    <div class="card-body mt-2">
                        <div class="row no-gutters" style="min-height: 400px;">
                            @if(!empty($row->product))
                            @foreach($row->product as $product)
                            <div class="thumbnail-menu-modern col-6 col-lg-2 border border-light product" data-id="{{$product->id}}">
                                <input type="hidden" value="1" class="number" />
                                <figure>
                                    <a href="{{base_url()}}index/details/{{$product->id}}">
                                        <img class="img-responsive" src="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif" alt="">
                                    </a>
                                </figure>

                                <div class="caption">
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
                                        <button type="button" class="btn btn-danger add-cart">Add to cart</button>
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

                            @endforeach
                            @endif
                            <!-- <div class="text-center col-12 h4">
                                <i class="fas fa-circle-notch fa-spin"></i>
                            </div> -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
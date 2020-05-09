<?= $widget->index_slider() ?>

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
                            <div class="thumbnail-menu-modern col-6 col-lg-2 border border-light product">
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
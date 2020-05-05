<section class="section-50 section-sm-20 bg-gray-lighter">
    <div class="container-wide">
        <div class="row">
            <div class="col-12">
                <div class="card card-custom">
                    <h5 class="card-header">
                        <span class="text-warning">
                            Ready to eat
                        </span>
                        <div style="margin-left:auto;font-size:13px;">
                            <div class="d-none d-sm-block">
                                <ul class="nav-custom">
                                    <li>
                                        <a href="#" class="active">Tất cả</a>
                                    </li>
                                    @foreach($list_category as $key=>$row)
                                    <li> <a href="#">{{ $row->{pick_language($row,'name_')} }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <a class="d-block d-sm-none" href="#">Xem thêm</a>
                        </div>
                    </h5>

                    <div class="card-body mt-2">
                        <div class="row no-gutters">
                            @foreach($list_category as $key=>$row)
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
                            <div class="thumbnail-menu-modern col-6 col-lg-2 border border-light">
                                <figure><img class="img-responsive" src="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif" alt="">
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
                            </div>

                            @endforeach
                            @endforeach
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $widget->post_header($title) ?>

<section class="section-50 section-sm-100">
    <div class="container isotope-wrap">
        <div class="row justify-content-sm-center">
            <div class="col-12">
                <div class="col-box text-center">
                    <ul class="isotope-filters-responsive">
                        <li>
                            <p>Choose your category:</p>
                        </li>
                        <li class="block-top-level">
                            <!-- Isotope Filters-->
                            <button class="isotope-filters-toggle btn btn-primary-lighter btn-shape-circle" data-custom-toggle="#isotope-1" data-custom-toggle-disable-on-blur="true">Filter<span class="caret"></span></button>
                            <div class="isotope-filters isotope-filters-buttons" id="isotope-1">
                                <ul class="inline-list">
                                    <li><a class="btn-shape-circle btn active" data-isotope-filter="*" data-isotope-group="gallery" href="#">Tất cả</a></li>
                                    @foreach($list_category as $key=>$row)
                                    <li><a class="btn-shape-circle btn" data-isotope-filter="Category {{$key}}" data-isotope-group="gallery" href="#">{{ $row->{pick_language($row,'name_')} }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 offset-top-40">
                <!-- Isotope Content-->
                <div class="row isotope isotope-menu" data-isotope-layout="fitRows" data-isotope-group="gallery" data-lightgallery="group" style="position: relative; height: 998.4px;">

                    @foreach($list_category as $key=>$row)
                    @foreach($row->product as $product)
                    <div class="col-6 col-md-4 col-lg-3 isotope-item" data-filter="Category {{$key}}" style="position: absolute; left: 0px; top: 0px;">
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
                        <div class="thumbnail-menu-modern border border-light">
                            <figure>
                                <a href="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif" class="fancybox">
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
                        </div>
                    </div>
                    @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
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
                                    @foreach($list_category as $key=>$row)
                                    <li><a class="btn-shape-circle btn @if($key == 0) active @endif" data-isotope-filter="Category {{$key}}" data-isotope-group="gallery" href="#">{{ $row->{pick_language($row,'name_')} }}</a></li>
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
                    <div class="col-12 col-sm-6 col-md-4 isotope-item" data-filter="Category {{$key}}" style="position: absolute; left: 0px; top: 0px;">
                        <div class="thumbnail-menu-modern">
                            <figure><img class="img-responsive" src="@if($product->image->type == 2) http://simbaeshop.com{{$product->image->src}} @else {{base_url()}}{{$product->image->src}} @endif" alt="" width="310" height="260">
                            </figure>
                            <div class="caption">
                                <h5><a class="link link-default" href="{{base_url()}}index/details/{{$product->id}}" tabindex="-1">{{ $product->{pick_language($product,'name_')} }}</a></h5>
                                <p class="text-italic">{{ split_string($product->{pick_language($product,'description_')},100) }}</p>
                                <p><span class="price">{{number_format($product->price,0,",",".")}}</p><a class="btn btn-shape-circle btn-burnt-sienna offset-top-15" href="shop-single.html" tabindex="-1">Order Online</a>
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
<section class="section-20 bg-gray-lighter">
    <div class="container text-black">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="fr-view">
                    <?= $row->{pick_language($row, 'description_')} ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-wide">
        <div class="row">
            <div class="col-lg-2 mb-4">
                <!-- <div class="card card-custom">
                    <div class="card-header">
                        Bộ lọc
                        <div style="margin-left:auto;font-size:11px;text-transform: none;">
                            <a href="#">Loại bỏ</a>
                        </div>
                    </div>
                </div> -->
                <div class="card card-custom">
                    <div class="card-header">
                        Sắp xếp
                        <div style="margin-left:auto;font-size:11px;text-transform: none;">
                            <a href="#">Loại bỏ</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="nav-sort-orders">
                            <li class="active ">
                                <div class="collection-name"><a href="#" class="text-black"><i class="check-icon"></i> Price: Low to High</a></div>
                            </li>
                            <li class="active selected">
                                <div class="collection-name"><a href="#" class="text-black"><i class="check-icon"></i> Price: High to Low</a></div>
                            </li>
                            <li class="active ">
                                <div class="collection-name"><a href="#" class="text-black"><i class="check-icon"></i> Newest</a></div>
                            </li>
                            <li class="active ">
                                <div class="collection-name"><a href="#" class="text-black"><i class="check-icon"></i> Newest Last</a></div>
                            </li>
                            <li class="active ">
                                <div class="collection-name"><a href="#" class="text-black"><i slass="check-icon"></i> A-Z</a></div>
                            </li>
                            <li class="active ">
                                <div class="collection-name"><a href="#" class="text-black"><i class="check-icon"></i> Z-A</a></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-10">
                <div class="card card-custom">
                    <h5 class="card-header">
                        <a href="{{base_url()}}index/category/{{$row->id}}" class="text-black">
                            {{ $row->{pick_language($row,'name_')} }}
                        </a>
                        <div style="margin-left:auto;font-size:13px;">

                        </div>
                    </h5>

                    <div class="card-body mt-2">
                        <div class="row no-gutters" style="min-height: 400px;">
                            @if(!empty($row->product))
                            @foreach($row->product as $product)
                            <div class="thumbnail-menu-modern col-6 col-lg-3 border border-light product" data-id="{{$product->id}}">
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
                                                <a class="dropdown-item unit_product @if(array_keys($product->units)[0] == $key) btn-primary active @endif" href="#" data-id="{{$unit->id}}" data-price="{{$unit->price}}" data-prev_price="@if(isset($unit->prev_price) && $unit->prev_price > 0){{$unit->prev_price}}@endif">
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

                    <div class="card-footer bg-white">
                        @if($max_page > 1)
                        <div class="col-12 text-center">
                            <ul class="pagination" style="font-size:14px;">
                                @if($current_page > 1)
                                <li>
                                    <a class="page_prev" href="{{$site}}page={{$current_page - 1}}" tabindex="-1"><i class="fa fa-angle-left"></i></a>
                                </li>
                                @endif
                                <li class='<?= 1 == $current_page ? "active" : "" ?>'>
                                    <a class='page_link' href="{{$site}}page=1" tabindex="-1">1</a>
                                </li>
                                @if($current_page > 3)
                                <li class="disabled"><span class="">...</span></li>
                                @endif

                                @if($current_page > 2)
                                <li class=""><a class="page_link" href="{{$site}}page={{$current_page - 1}}">{{$current_page - 1}}</a></li>
                                @endif

                                @if($current_page > 1 && $current_page < $max_page) <li class="active"><a class="page_link" href="#">{{$current_page}}</a></li>
                                    @endif
                                    @if($current_page <= $max_page - 2) <li class=""><a class="page_link" href="{{$site}}page={{$current_page + 1}}">{{$current_page + 1}}</a></li>
                                        @endif
                                        @if($current_page <= $max_page - 3) <li class="disabled"><span class="">...</span></li>
                                            @endif

                                            <li class='<?= $max_page == $current_page ? "active" : "" ?>'>
                                                <a class='page_link' href="{{$site}}page={{$max_page}}" tabindex="-1">{{$max_page}}</a>
                                            </li>

                                            @if($current_page != $max_page)
                                            <li class="">
                                                <a class="page_next" href="{{$site}}page={{$current_page + 1}}"><i class=" fa fa-angle-right"></i></a>
                                            </li>
                                            @endif

                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
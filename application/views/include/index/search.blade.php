<section class="section-20 bg-gray-lighter">

    <div class="container">
        <div class="row no-gutters">

            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card card-custom">
                            <div class="card-header">
                                {{lang('result_search')}}: <b>{{$search}} ({{$count}})</b>
                                <div style="margin-left:auto;font-size:13px;">

                                </div>
                            </div>

                            <div class="card-body mt-2">
                                <div class="row no-gutters" style="min-height: 400px;">
                                    @if(!empty($products))
                                    @foreach($products as $product)
                                    <div class="thumbnail-menu-modern col-6 col-lg-3 border border-light product" data-id="{{$product->id}}">
                                        <input type="hidden" value="1" class="number" />
                                        <figure>
                                            <a href="{{base_url()}}index/details/{{$product->id}}">
                                                <img class="img-responsive" src="http://simbaeshop.com{{$product->image_url}}" alt="">
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
                                                <button type="button" class="btn btn-danger add-cart">{{lang("add_to_cart")}}</button>
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
                                    @else
                                    <div class="col-12 text-center">
                                        {{lang("no_result")}}
                                    </div>
                                    @endif
                                    <!-- <div class="text-center col-12 h4">
                                <i class="fas fa-circle-notch fa-spin"></i>
                            </div> -->
                                </div>
                            </div>
                            @if($max_page > 1)
                            <div class="card-footer bg-white">
                                <div class="col-12 text-center">
                                    <ul class="pagination" style="font-size:14px;">
                                        @if($current_page > 1)
                                        <li>
                                            <a class="page_prev" href="{{$site}}?page={{$current_page - 1}}" tabindex="-1"><i class="fa fa-angle-left"></i></a>
                                        </li>
                                        @endif
                                        <li class='<?= 1 == $current_page ? "active" : "" ?>'>
                                            <a class='page_link' href="{{$site}}?page=1" tabindex="-1">1</a>
                                        </li>
                                        @if($current_page > 3)
                                        <li class="disabled"><span class="">...</span></li>
                                        @endif

                                        @if($current_page > 2)
                                        <li class=""><a class="page_link" href="{{$site}}?page={{$current_page - 1}}">{{$current_page - 1}}</a></li>
                                        @endif

                                        @if($current_page > 1 && $current_page < $max_page) <li class="active"><a class="page_link" href="#">{{$current_page}}</a></li>
                                            @endif
                                            @if($current_page <= $max_page - 2) <li class=""><a class="page_link" href="{{$site}}?page={{$current_page + 1}}">{{$current_page + 1}}</a></li>
                                                @endif
                                                @if($current_page <= $max_page - 3) <li class="disabled"><span class="">...</span></li>
                                                    @endif

                                                    <li class='<?= $max_page == $current_page ? "active" : "" ?>'>
                                                        <a class='page_link' href="{{$site}}?page={{$max_page}}" tabindex="-1">{{$max_page}}</a>
                                                    </li>

                                                    @if($current_page != $max_page)
                                                    <li class="">
                                                        <a class="page_next" href="{{$site}}?page={{$current_page + 1}}"><i class=" fa fa-angle-right"></i></a>
                                                    </li>
                                                    @endif

                                    </ul>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 offset-top-20 offset-md-top-0">
                <?= $widget->right() ?>
            </div>
        </div>
    </div>
</section>
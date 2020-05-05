@if(!empty($data))
@foreach($data as $product)
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

@endforeach
@endif
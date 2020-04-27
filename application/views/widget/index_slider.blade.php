<section>
    <div class="carousel slide" id="introCarousel">
        <ol class="carousel-indicators">
        </ol>
        <div class="carousel-inner" role="listbox">
            @foreach($list_silder as $key=>$row)
            <div class="carousel-item <?= $key == 0 ? "active" : "" ?>">
                <div class="carousel-background">
                    <img alt="" src="{{base_url()}}{{$row->image->src}}" width="100%" />
                </div>
                <div class="carousel-container">

                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
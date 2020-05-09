<div class="inset-lg-left-15">
    <!-- Section Blog Modern-->
    <aside class="text-left">
        <!-- Search Form-->
        <!-- RD Search Form-->
        <form class="form-search rd-search" action="search-results.html" method="GET">
            <div class="form-group">
                <label class="form-label form-search-label form-label-sm rd-input-label" for="blog-sidebar-2-form-search-widget">Search</label>
                <input class="form-search-input form-control #{inputClass}" id="blog-sidebar-2-form-search-widget" type="text" name="s" autocomplete="off">
            </div>
            <button class="form-search-submit" type="submit"><span class="mdi mdi-magnify"></span></button>
        </form>
        <div class="row offset-top-20">
            <div class="col-sm-6 col-md-12">
                <div class="card card-custom">
                    <div class="text-uppercase card-header">Danh mục</div>
                    <div class="card-body">
                        <!-- Category-->
                        <ul class="list list-marked list-marked-burnt-sienna list-bordered">
                            @foreach($list_cate as $row)
                            <li><a class="link-default" href="{{base_url()}}index/category/{{$row->id}}">{{ $row->{pick_language($row,'name_')} }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row offset-top-20">
            <div class="col-sm-6 col-md-12">
                <div class="card card-custom">
                    <div class="text-uppercase card-header">Topics</div>
                    <div class="card-body">
                        <!-- Category-->
                        <ul class="list list-marked list-marked-burnt-sienna list-bordered">
                            @foreach($list_topics as $row)
                            <li><a class="link-default" href="{{base_url()}}index/category/{{$row->id}}">{{ $row->{pick_language($row,'name_')} }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row offset-top-20">
            <div class="col-sm-6 col-md-12">
                <!-- Archive-->
                <div class="card card-custom">
                    <div class="text-uppercase card-header">New posts</div>
                    <div class="card-body">
                        @foreach($news as $row)
                        <div class="unit unit-horizontal unit-spacing-xs">
                            <div class="unit-left">
                                <img class="img-rounded" src="{{base_url()}}{{$row->image->src}}" alt="" width="70" height="70">
                            </div>
                            <div class="unit-body"><a class="link-default" href="{{base_url()}}/index/post/{{$row->id}}">{{$row->title}}</a>
                                <div>
                                    <time>{{date('F j,Y',strtotime($row->date))}}</time>
                                </div>
                            </div>
                        </div>
                        <hr class="my-2">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </aside>
</div>
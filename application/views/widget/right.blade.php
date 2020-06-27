<div class="inset-lg-left-15">
    <!-- Section Blog Modern-->
    <aside class="text-left">
        <!-- Search Form-->
        <!-- RD Search Form-->
        <div class="row">
            <div class="col-sm-6 col-md-12">
                <div class="card card-custom card-color">
                    <div class="text-uppercase card-header">{{lang('danh_muc')}}</div>
                    <div class="card-body py-0" style="max-height: 400px;overflow: auto;">
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
                <div class="card card-custom card-color">
                    <div class="text-uppercase card-header">{{lang('topic')}}</div>
                    <div class="card-body py-0" style="max-height: 400px;overflow: auto;">
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
                <div class="card card-custom card-color" style="max-height: 400px;overflow: auto;">
                    <div class="text-uppercase card-header">{{lang('post')}}</div>
                    <div class="card-body" style="max-height: 400px;overflow: auto;">
                        @foreach($news as $row)
                        <div class="unit unit-horizontal unit-spacing-xs">
                            <div class="unit-left">
                                <img class="img-rounded" src="@if(empty($row->image)){{base_url()}}public/image/temp.png @else{{base_url()}}{{$row->image->src}}@endif" alt="" width="70" height="70">
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
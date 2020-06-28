<?= $widget->index_slider() ?>
<section class="section-20 bg-gray-lighter">
    <div class="container-wide">
        <div class="row">
            <div class="col-12">
                <div class="card card-custom">
                    <div class="card-body">
                        <div class="header-title">
                            <span>{{lang("topic")}}</span>
                        </div>
                        <div class="responsive1" style="min-height: 200px;">
                            @foreach($topics as $row)
                            <div class="item m-2">
                                <a class="" href="{{base_url()}}index/category/{{$row->id}}">
                                    <img class="img-responsive" src="@if(isset($row->image)){{$row->image->src}}@endif" alt="">
                                    <div class="caption text-center">
                                        <p>
                                            {{ $row->{pick_language($row,'name_')} }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@foreach($category as $row)
<section class="section-20 bg-gray-lighter">
    <div class="container-wide">
        <div class="row">
            <div class="col-12">
                <div class="card card-custom1">
                    <div class="card-header">
                        <a href="{{base_url()}}index/category/{{$row->id}}" class="header_title">
                            <span>{{ $row->{pick_language($row,'name_')} }} ({{$row->count_product}})</span>
                        </a>
                        <div style="margin-left:auto;">
                            <ul class="sub_category">
                                <li class="index_category active" data-id="{{$row->id}}">
                                    <a href="#" class="text-dark">
                                        {{lang("all")}}
                                    </a>
                                </li>
                                @if(!empty($row->child))
                                @foreach($row->child as $child)
                                <li class="index_category" data-id="{{$child->id}}">
                                    <a href="#" class="text-dark">
                                        {{ $child->{pick_language($child,'name_')} }}
                                    </a>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row no-gutters index_product" style="min-height: 400px;">
                            <div class="text-center col-12 h4">
                                <i class="fas fa-circle-notch fa-spin"></i>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endforeach
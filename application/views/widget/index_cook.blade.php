<section class="section-20 bg-gray-lighter">
    <div class="container-wide">
        <div class="row">
            <div class="col-12">
                <div class="card card-custom">
                    <h5 class="card-header">
                        <a href="{{base_url()}}index/category/2" class="text-warning">
                            Ready to cook
                        </a>
                        <div style="margin-left:auto;font-size:13px;">
                            <div class="d-none d-sm-block">
                                <ul class="nav-custom index_category" data-id="2">
                                    <li>
                                        <a href="#" class="active" data-id="0">Tất cả</a>
                                    </li>
                                    @foreach($list_category as $key=>$row)
                                    <li>
                                        <a href="#" data-id="{{$row->id}}">{{ $row->{pick_language($row,'name_')} }}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <a class="d-block d-sm-none" href="{{base_url()}}index/category/2">Xem thêm</a>
                        </div>
                    </h5>

                    <div class="card-body mt-2">
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
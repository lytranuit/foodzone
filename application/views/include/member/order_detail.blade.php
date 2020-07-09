<section class="m-5">
    <div class="container">
        <div class="row clearfix">
            <div class="col-12">
                <div class="card card-fluid">
                    <div class="card-header drag-handle">
                        {{lang("details_order")}} # {{$data->code}}
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header drag-handle">
                        {{lang("cart_info_title")}}
                    </div>
                    <div class="card-body">
                        <p class="font-weight-bold">{{$data->receiver_name}}</p>
                        <div>{{lang('login_email_label')}}: {{$data->receiver_email}}</div>
                        <div>{{lang('login_phone_label')}}: {{$data->receiver_phone}}</div>
                        <div>{{lang('login_address_label')}}: {{$data->receiver_address}}</div>
                        <div>{{lang('login_area_label')}}: {{$data->receiver_area}}</div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        {{lang("product_name")}}
                                    </th>
                                    <th>
                                        {{lang("price_order")}}
                                    </th>
                                    <th>
                                        {{lang("quantity")}}
                                    </th>
                                    <th>
                                        {{lang("amount")}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data->details as $row)
                                <tr>
                                    <td>
                                        <div class="d-inline-block">
                                            <img class="img-responsive" src="http://simbaeshop.com{{$row->image_url}}" width="70" />
                                        </div>
                                        <div class="d-inline-block" style="vertical-align: top;">
                                            <a href="{{base_url()}}index/details/{{$row->product_id}}" class="text-dark font-weight-bold">{{ $row->name }}</a>
                                            <div>{{lang("code")}}: <span class="font-weight-bold">{{$row->code}}</span></div>
                                            <div>{{lang("dvt")}}: <span class="font-weight-bold">{{$row->volume_order}}</span></div>
                                        </div>
                                    </td>
                                    <td>
                                        {{number_format($row->unit_price * $row->special_unit,0,",",".")}}đ
                                    </td>
                                    <td>
                                        {{number_format($row->quantity,0,",",".")}}
                                    </td>
                                    <td>
                                        {{number_format($row->subtotal,0,",",".")}}đ
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3"><span>{{lang("total")}}</span></td>
                                    <td>{{number_format($data->amount,0,",",".")}} ₫</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><span>{{lang("service_fee")}}</span></td>
                                    <td>{{number_format($data->service_fee,0,",",".")}} ₫</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><span>{{lang("amount")}}</span></td>
                                    <td><b class="big">{{number_format($data->total_amount,0,",",".")}} ₫</b></td>
                                </tr>
                            </tfoot>
                        </table>
                        @if($data->status == 1)
                        <div class="float-right">
                            <a href="{{base_url()}}member/huy_don/{{$data->code}}" data-type='confirm' title='Bạn có muốn hủy đơn hàng này?' class="text-white btn btn-danger">
                                {{lang("cancle_order")}}
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    tfoot td {
        border-top: 0px !important;
        text-align: right;
    }

    tfoot tr:first-child td {
        border-top: 1px solid #dee2e6 !important;
    }
</style>
<script>
    $(document).ready(function() {
        $(document).off("click", "[data-type='confirm']").on("click", "[data-type='confirm']", function(e) {
            e.preventDefault();
            var title = $(this).attr("title");
            var href = $(this).attr("href");
            if (confirm(title) == true) {
                if (href)
                    location.href = href;
            }
            return false;
        })
    })
</script>
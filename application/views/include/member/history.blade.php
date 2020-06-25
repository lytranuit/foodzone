<section class="m-5">
    <div class="container">
        <div class="row clearfix">
            <div class="col-12">
                <div class="card card-fluid">
                    <div class="card-header drag-handle">
                        {{lang("my_order")}}
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        {{lang("code_order")}}
                                    </th>
                                    <th>
                                        {{lang("date_order")}}
                                    </th>
                                    <th>
                                        {{lang("amount_order")}}
                                    </th>
                                    <th>
                                        {{lang("status_order")}}
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(!empty($data))
                                @foreach($data as $row)
                                <tr>
                                    <td>
                                        <a href="{{base_url()}}member/order_detail/{{$row->code}}">{{$row->code}}</a>
                                    </td>
                                    <td>
                                        {{date("d/m/Y",strtotime($row->order_date))}}
                                    </td>
                                    <td>
                                        {{number_format($row->total_amount,0,",",".")}} đ
                                    </td>
                                    <td>
                                        @if($row->status == 1)
                                        Mới đặt hàng
                                        @elseif($row->status == 2)
                                        Đã xác nhận, chờ giao
                                        @elseif($row->status == 8)
                                        Đang giao hàng
                                        @elseif($row->status == 3)
                                        Đã thanh toán
                                        @elseif($row->status == 4)
                                        Hoàn tất giao hàng
                                        @elseif($row->status == 5)
                                        Đã hủy
                                        @endif
                                        <!-- <select name="status" id="id_status" class="filter input-small">
                                            <option value="">-- All --</option>
                                            <option value="1">Mới đặt hàng</option>
                                            <option value="2">Đã xác nhận, chờ giao</option>
                                            <option value="8">Đang giao hàng</option>
                                            <option value="3">Đã thanh toán</option>
                                            <option value="4">Hoàn tất giao hàng</option>
                                            <option value="5">Đã hủy</option>
                                        </select> -->
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
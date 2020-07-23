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
                                        {{lang("status_" . $row->status)}}
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
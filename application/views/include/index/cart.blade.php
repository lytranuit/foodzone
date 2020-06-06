<?= $widget->post_header(lang("cart_title")) ?>
<section class="py-5 cart bg-gray-lighter">
    <div class="container">
        <div class="card d-none d-lg-block">
            <div class="card-body">
                <div class="row no-gutters">
                    <div class="col-lg-1">
                        <span>{{lang("product_name")}}</span>
                    </div>
                    <div class="col-lg-11 col-9">
                        <div class="row no-gutters">
                            <div class="col-lg-4">

                            </div>
                            <div class="col-lg-2 text-center">
                                <span>{{lang("product_dvt")}}</span>
                            </div>
                            <div class="col-lg-2 text-center">
                                <span>{{lang("quantity")}}</span>
                            </div>
                            <div class="col-lg-2 text-center">
                                <span>{{lang("amount")}}</span>
                            </div>
                            <div class="col-lg-2 text-center">
                                <span>{{lang("action")}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($cart['details'] as $row)
        <div class="card mt-2 product" data-id="{{$row->id}}">
            <div class="card-body">
                <div class="row no-gutters">
                    <div class="col-lg-1 col-3">
                        <img class="img-responsive" src="@if($row->image->type == 2) http://simbaeshop.com{{$row->image->src}} @else {{base_url()}}{{$row->image->src}} @endif" />
                    </div>
                    <div class="col-lg-11 col-9">
                        <div class="row no-gutters">
                            <div class="col-lg-4">
                                <a href="{{base_url()}}index/details/{{$row->id}}" class="text-black font-weight-bold">{{ $row->{pick_language($row,'name_')} }}</a>
                                <div>{{lang("code")}}: <span class="font-weight-bold">{{$row->code}}</span></div>
                            </div>
                            <div class="col-lg-2 text-lg-center mt-3">

                                @if(!empty($row->units))
                                <select class="unit_select">
                                    @foreach($row->units as $unit)
                                    <option value="{{$unit->id}}" @if($unit->id == $row->unit_id) selected @endif>
                                        {{ $unit->{pick_language($unit,'name_')} }}
                                    </option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                            <div class="col-lg-2 text-lg-center mt-3">
                                <div style="max-width:100px;display: inline-block;">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-down" type="button">-</button>
                                        </div>
                                        <input type="text" class="form-control-custom text-center quantity" value="{{$row->qty}}">
                                        <div class="input-group-append">
                                            <button class="btn btn-up" type="button">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-6 text-lg-center mt-3">
                                <b>{{number_format($row->amount,0,",",".")}}đ</b>
                            </div>
                            <div class="col-lg-2 col-6 text-lg-center text-right mt-3">
                                <a href="#" class="text-danger remove_product"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="col-lg-6">

            </div>
            <div class="col-lg-6">
                <div class="card cart-page-footer mt-2">
                    <div class="card-body">
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>
                                        <b>{{lang("total")}}</b>
                                    </td>
                                    <td class="text-right">
                                        {{number_format($cart['amount_product'],0,",",".")}}đ
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>{{lang("service_fee")}}</b>
                                    </td>
                                    <td class="text-right">
                                        0 đ
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>{{lang("amount")}}</b>
                                    </td>
                                    <td class="text-right">
                                        <b class="big text-danger">{{number_format($cart['amount_product'],0,",",".")}}đ</b>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="text-center border-0">
                                        <a class="text-top btn btn-burnt-sienna btn-shape d-inline-block" href="{{base_url()}}/index/checkout">
                                            <span>{{lang("order_btn")}}</span>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .form-control-custom {
        display: block;
        line-height: 14px;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #f4f4f4;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        position: relative;
        -ms-flex: 1 1 auto;
        flex: 1 1 auto;
        width: 1%;
        margin-bottom: 0;
    }

    .btn-up,
    .btn-down {
        font-size: 20px;
        padding: 0px 10px;
        line-height: 1px;
    }

    @media (max-width: 978px) {
        .cart .container {
            padding: 0;
            margin: 0;
        }


    }
</style>
<table class="total-line-table table table-borderless">
    <tbody class="border-bottom">
        <tr class="total-line total-line--subtotal">
            <th class="total-line__name" scope="row">{{lang("total")}}</th>
            <td class="text-right">
                <span class="font-weight-bold" data-amount="{{$cart['amount_product']}}">
                    {{number_format($cart['amount_product'],0,",",".")}}đ
                </span>
            </td>
        </tr>


        <tr class="total-line total-line--shipping">
            <th class="total-line__name" scope="row">{{lang("service_fee")}}</th>
            <td class="text-right">
                <span class="">
                    @if($cart['service_fee'] == -1)
                    {{lang("price_zero")}}
                    @else
                    {{number_format($cart['service_fee'],0,",",".")}}đ
                    @endif
                </span>
            </td>
        </tr>
    </tbody>
    <tfoot class="total-line-table__footer">
        <tr class="total-line">
            <th class="total-line__name payment-due-label" scope="row">
                <span class="payment-due-label__total">{{lang("amount")}}</span>
            </th>
            <td class="text-right">
                <span class="font-weight-bold" style="font-size:20px;">
                    {{number_format($cart['paid_amount'],0,",",".")}}đ
                </span>

                <div>{{NumberToTextVN($cart['paid_amount'])}}</div>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="border-0 text-center">
                <button class="text-top btn btn-burnt-sienna btn-shape">
                    <span>{{lang("cart_finish")}}</span>
                </button>
            </td>
        </tr>
    </tfoot>
</table>
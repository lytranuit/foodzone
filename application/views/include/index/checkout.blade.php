<?= $widget->post_header("Đơn hàng") ?>
<section class="py-5 cart bg-gray-lighter">

    <form id="contactForm" name="fast_checkout_form" action="{{base_url()}}index/complete" method="post" class="cm-processed-form">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="checkout-steps cm-save-fields clearfix" id="checkout_steps">
                        <div class="ty-step__container-active ty-step-one fast-checkout">
                            <div id="fast_checkout_body" class="ty-step__body-active babi-ty-step--body-active">
                                <div class="section section--contact-information">
                                    @if(!$is_login)
                                    <div class="card">
                                        <div class="card-header">
                                            Thông tin cá nhân
                                        </div>
                                        <div class="card-body">
                                            <p class="layout-flex__item">
                                                <span aria-hidden="true">Bạn đã có tài khoản?</span>
                                                <a href="{{base_url()}}/index/login?next={{current_url()}}" class="link">
                                                    Đăng nhập
                                                </a>
                                            </p>
                                            <div class="form-group">
                                                <input type="email" name="email" required="" placeholder="Email" title="Email" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    @else
                                    <input type="hidden" name="email" value="{{$userdata['email']}}">
                                    <input type="hidden" name="user_id" value="{{$userdata['user_id']}}">
                                    @endif
                                </div>

                                <div class="card my-3">
                                    <div class="card-header">
                                        Địa chỉ nhận hàng
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{ $userdata['name'] or '' }}" required="" placeholder="Tên người nhận hàng" title="Tên người nhận hàng" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="phone" value="{{ $userdata['phone'] or '' }}" required="" placeholder="Số điện thoại" title="Số điện thoại" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" name="address" value="{{ $userdata['address'] or '' }}" required="" placeholder="Địa chỉ" title="Địa chỉ" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <textarea id="fast-checkout-notes" name="notes" class="form-control" rows="4" cols="72" placeholder="Ghi chú cho Shop (nếu có)" title="Ghi chú cho Shop (nếu có)"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--checkout_steps-->
                    </div>
                    <!-- Inline script moved to the bottom of the page -->
                </div>
                <div class="col-md-6">
                    <div class="card bg-light">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12">
                                    <table class="product-table table table-borderless border-bottom">
                                        @foreach($cart['details'] as $row)
                                        <tr class="product" data-id="{{$row->id}}">
                                            <td class="product__image">
                                                <div class="product-thumbnail">
                                                    <div class="product-thumbnail__wrapper">
                                                        <img class="img-responsive" src="@if($row->image->type == 2) http://simbaeshop.com{{$row->image->src}} @else {{base_url()}}{{$row->image->src}} @endif" />
                                                    </div>
                                                    <span class="product-thumbnail__quantity" aria-hidden="true">{{$row->qty}}</span>
                                                </div>

                                            </td>
                                            <td class="product__description">
                                                <a href='' class="font-weight-bold text-black">{{ $row->{pick_language($row,'name_')} }}</a>
                                                <div>Code:{{$row->code}}</div>
                                            </td>
                                            <td class="product__price">
                                                <span class="order-summary__emphasis">{{number_format($row->amount,0,",",".")}}đ</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                                <div class="col-12">
                                    <table class="total-line-table table table-borderless">
                                        <tbody class="border-bottom">
                                            <tr class="total-line total-line--subtotal">
                                                <th class="total-line__name" scope="row">Tổng tiền</th>
                                                <td class="text-right">
                                                    <span class="font-weight-bold" data-amount="{{$cart['amount_product']}}">
                                                        {{number_format($cart['amount_product'],0,",",".")}}đ
                                                    </span>
                                                </td>
                                            </tr>


                                            <tr class="total-line total-line--shipping">
                                                <th class="total-line__name" scope="row">Phí giao hàng</th>
                                                <td class="text-right">
                                                    <span class="" data-checkout-total-shipping-target="0">
                                                        0
                                                    </span>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <tfoot class="total-line-table__footer">
                                            <tr class="total-line">
                                                <th class="total-line__name payment-due-label" scope="row">
                                                    <span class="payment-due-label__total">Thành tiền</span>
                                                </th>
                                                <td class="text-right">
                                                    <span class="font-weight-bold" style="font-size:20px;">
                                                        {{number_format($cart['amount_product'],0,",",".")}}đ
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" class="border-0 text-center">
                                                    <button class="text-top btn btn-burnt-sienna btn-shape">
                                                        <span>Hoàn tất đơn hàng</span>
                                                    </button>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</section>
<style>
    .product-thumbnail {
        width: 4.6em;
        height: 4.6em;
        border-radius: 8px;
        background: #fff;
        position: relative
    }

    .product-thumbnail::after {
        content: '';
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        border-radius: 8px;
        border: 1px rgba(0, 0, 0, 0.1) solid;
        z-index: 2
    }

    .product-thumbnail__wrapper {
        width: 100%;
        height: 100%;
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        z-index: 1
    }

    .product-thumbnail__image {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        max-width: 100%;
        max-height: 100%;
        margin: auto
    }

    .product-thumbnail__quantity {
        font-size: 0.85714em;
        font-weight: 500;
        line-height: 1.75em;
        white-space: nowrap;
        text-align: center;
        border-radius: 1.75em;
        background-color: rgba(114, 114, 114, 0.9);
        color: #fff;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        min-width: 1.75em;
        height: 1.75em;
        padding: 0 0.58333em;
        position: absolute;
        right: -0.75em;
        top: -0.75em;
        z-index: 3
    }

    .table-borderless td,
    .table-borderless th {
        border: none;
    }

    .form-control {
        display: block;
        width: 100%;
        padding: .375rem .75rem;
        font-size: 12px;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }

    .link {
        text-decoration: none;
        color: #cbba9c;
        -webkit-transition: color 0.2s ease-in-out;
        transition: color 0.2s ease-in-out;
    }

    .product_remove {
        font-size: 10px;
        white-space: nowrap;
        text-align: center;
        border-radius: 1.75em;
        background-color: red;
        color: #fff;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        min-width: 1.75em;
        height: 1.75em;
        padding: 0 0.58333em;
        position: absolute;
        left: -0.75em;
        top: -0.75em;
        z-index: 3;
        cursor: pointer;
    }
</style>
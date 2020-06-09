<p>Xin chào <strong>{{$name}}</strong>!</p>

<p>Chúng tôi xin thông báo đã nhận được đơn hàng số <strong>{{$code}}</strong> của bạn với chi tiết như sau,<br />
    <br />
    Please be informed that your PO <strong>{{$code}}</strong> has been received with below details,<br />
    <br />
    <span style="color:rgb(0, 0, 0); font-family:calibri; font-size:15px">下記の通り、ご注文が送信されました PO&nbsp;</span><strong>{{$code}}, 　</strong><span style="color:rgb(0, 0, 0); font-family:calibri; font-size:15px">確定まで少々お待ちください。</span></p>

<p><strong><u>Thông tin khách hàng - Customers information -&nbsp;お客様情報:</u></strong></p>

<table cellpadding="5" cellspacing="0" style="width:600px">
    <tbody>
        <tr>
            <td>
                <p><strong>Thông tin người nhận hàng - Consignees information -&nbsp;配送先情報</strong></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Họ tên: {{$name}}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Email: {{$email}}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Điện thoại: {{$phone}}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Đia chỉ:</p>
                <p>{{$address}}</p>
            </td>
        </tr>
    </tbody>
</table>

<p><strong>Ngày đặt hàng - Order date -&nbsp;注文日</strong>: <strong>{{$order_date}}</strong></p>

<p><strong><u>Thông tin đơn hàng- PO information -&nbsp;注文情報</u></strong>: <strong>{{$code}}</strong></p>

<table border="1" cellpadding="5" cellspacing="0" style="width:600px">
    <tbody>
        <tr>
            <td>
                <p><strong><span style="font-family:times new roman,times,serif">Mã sản phẩm- Product ID -</span>&nbsp;商品ID</strong></p>
            </td>
            <td>
                <p><strong><span style="font-family:times new roman,times,serif">Tên sản phẩm - Product name -</span> 商品名</strong></p>
            </td>
            <td>
                <p><strong><span style="font-family:times new roman,times,serif">Hình ảnh- Picture -</span>&nbsp;画像</strong></p>
            </td>
            <td>
                <p><span style="font-family:arial,helvetica,sans-serif"><strong><span style="font-family:times new roman,times,serif">Đơn giá -Unit Price -</span> 単価</strong></span></p>
            </td>
            <td>
                <p><span style="font-family:arial,helvetica,sans-serif"><strong><span style="font-family:times new roman,times,serif">Số lượng- Quantity </span>-&nbsp;数量</strong></span></p>
            </td>
            <td>
                <p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif"><strong><span style="font-family:times new roman,times,serif">Đơn vị</span>- Unit -&nbsp;</strong></span><strong>計算ユニット​</strong></span><span style="font-family:arial,helvetica,sans-serif"><strong>&nbsp;</strong></span></p>
            </td>
            <td>
                <p><span style="font-family:arial,helvetica,sans-serif"><strong><span style="font-family:times new roman,times,serif">Thành tiền- Sub total -</span>&nbsp;</strong></span><strong>小計</strong></p>
            </td>
        </tr>
        @foreach($details as $row)
        <tr>
            <td>{{$row->code}}</td>
            <td>{{$row->name_vi}}</td>
            <td><img src="@if($row->image->type == 2) http://simbaeshop.com{{$row->image->src}} @else {{base_url()}}{{$row->image->src}} @endif" style="max-height:140px" /></td>
            <td>{{number_format($row->price,0,",",".")}} VND</td>
            <td>{{$row->qty}}</td>
            <td>@if(!empty($row->unit)){{$row->unit->name_vi}}@endif</td>
            <td>{{number_format($row->amount,0,",",".")}} VND</td>
        </tr>
        @endforeach
    </tbody>
</table>

<p><span style="font-family:arial,helvetica,sans-serif"><strong><u>Phí; giao hàng -&nbsp;<span style="color:rgb(0, 0, 0)">Shipping Fee - </span>送料</u>:<span style="color:rgb(255, 0, 0)"> {{$service_fee}} VND</span></strong></span></p>

<p><span style="font-family:arial,helvetica,sans-serif"><strong><u>Tổng tiền - Grand total - 合計</u>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:rgb(255, 0, 0)">{{number_format($total,0,",",".")}} VND</span>&nbsp;</strong></span></p>

<p><span style="font-family:arial,helvetica,sans-serif"><u><strong>Ghi chú; - Notes - </strong></u></span><u><strong>備考</strong></u><span style="font-family:arial,helvetica,sans-serif"><strong>:</strong> <strong><span style="color:#FF0000">{{$notes}}</span></strong></span></p>

<p>&nbsp;</p>

<p><strong><span style="font-family:arial,helvetica,sans-serif">Trân trọng - Sincerely Yours -&nbsp;ありがとうございました,</span></strong></p>

<p><span style="font-family:arial,helvetica,sans-serif">Simba E-shop Team<br />
        Điện thoại:&nbsp;<span style="color:#FF0000"><strong>028 7770 4567</strong></span><br />
        Email: <u>simbasales@simba.com.vn</u></span></p>

<p><span style="font-size:16px"><span style="font-family:times new roman,times,serif"><strong><em><span style="color:#008000">Cảm ơn Quý; khách hàng đã ủng hộ Simba E-shop!</span></em></strong></span></span></p>

<p><span style="font-size:16px"><span style="font-family:times new roman,times,serif"><em><strong><span style="color:#008000">Thank you for shopping at Simba E-shop!</span></strong></em></span></span></p>

<p><span style="font-size:16px"><span style="font-family:times new roman,times,serif"><em><strong><span style="color:#008000">Simba E-shop をご利用頂き、ありがとうございました！</span></strong>&nbsp;</em></span></span></p>
<p>Xin ch&agrave;o {{customer_name}} ({{customer_code}})!</p>

<p>Ch&uacute;ng t&ocirc;i xin th&ocirc;ng b&aacute;o đ&atilde; nhận được đơn h&agrave;ng số <strong>{{code}}</strong> của bạn với chi tiết như sau,<br />
    <br />
    Please be informed that your PO <strong>{{code}}&nbsp;</strong>has been received with below details,<br />
    <br />
    <span style="color:rgb(0, 0, 0); font-family:calibri; font-size:15px">下記の通り、ご注文が送信されました PO&nbsp;</span><strong>{{code}}, 　</strong><span style="color:rgb(0, 0, 0); font-family:calibri; font-size:15px">確定まで少々お待ちください。</span></p>

<p><strong><u>Th&ocirc;ng tin kh&aacute;ch h&agrave;ng - Customer&#39;s information -&nbsp;お客様情報:</u></strong></p>

<table border="1" cellpadding="5" cellspacing="0" style="width:600px">
    <tbody>
        <tr>
            <td>
                <p><strong>Thông tin người nhận hàng - Consignee&#39;s information -&nbsp;配送先情報</strong></p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Họ tên: {{customer_name}}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Email: {{customer_email}}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Điện thoại: {{customer_phone}}</p>
            </td>
        </tr>
        <tr>
            <td>
                <p>Đia chỉ:</p>
                <p>{{customer_address}}</p>
            </td>
        </tr>
    </tbody>
</table>

<p><strong>Ng&agrave;y đặt h&agrave;ng - Order date -&nbsp;注文日</strong>: <strong>{{order_date}}</strong></p>

<!-- <p><strong>Ng&agrave;y giao h&agrave;ng - Delivery date - 配送日</strong><strong>:&nbsp;{{delivery_date}}</strong></p> -->

<p><strong><u>Th&ocirc;ng tin đơn h&agrave;ng- PO information -&nbsp;注文情報</u></strong>: <strong>{{code}}</strong></p>

<table border="1" cellpadding="5" cellspacing="0" style="width:600px">
    <tbody>
        <tr>
            <td>
                <p><strong><span style="font-family:times new roman,times,serif">M&atilde; sản phẩm- Product ID -</span>&nbsp;商品ID</strong></p>
            </td>
            <td>
                <p><strong><span style="font-family:times new roman,times,serif">T&ecirc;n sản phẩm - Product name -</span> 商品名</strong></p>
            </td>
            <td>
                <p><strong><span style="font-family:times new roman,times,serif">H&igrave;nh ảnh- Picture -</span>&nbsp;画像</strong></p>
            </td>
            <td>
                <p><span style="font-family:arial,helvetica,sans-serif"><strong><span style="font-family:times new roman,times,serif">Đơn gi&aacute; -Unit Price -</span> 単価</strong></span></p>
            </td>
            <td>
                <p><span style="font-family:arial,helvetica,sans-serif"><strong><span style="font-family:times new roman,times,serif">Số lượng- Quantity </span>-&nbsp;数量</strong></span></p>
            </td>
            <td>
                <p><span style="font-size:12px"><span style="font-family:arial,helvetica,sans-serif"><strong><span style="font-family:times new roman,times,serif">Đơn vị</span>- Unit -&nbsp;</strong></span><strong>計算ユニット​</strong></span><span style="font-family:arial,helvetica,sans-serif"><strong>&nbsp;</strong></span></p>
            </td>
            <td>
                <p><span style="font-family:arial,helvetica,sans-serif"><strong><span style="font-family:times new roman,times,serif">Th&agrave;nh tiền- Sub total -</span>&nbsp;</strong></span><strong>小計</strong></p>
            </td>
        </tr>
        <tr>
            <td>{{code}}</td>
            <td>{{title}}</td>
            <td><img alt="{{title}}" src="{{image}}" style="max-height:140px" /></td>
            <td>{{pr}} VND</td>
            <td>{{qty}}</td>
            <td>{{volume}}</td>
            <td>{{total}} VND</td>
        </tr>
    </tbody>
</table>

<p><span style="font-family:arial,helvetica,sans-serif"><strong><u>Ph&iacute; giao h&agrave;ng -&nbsp;<span style="color:rgb(0, 0, 0)">Shipping Fee - </span>送料</u>:<span style="color:rgb(255, 0, 0)"> {{service_fee}} VND</span></strong></span></p>

<p><span style="font-family:arial,helvetica,sans-serif"><strong><u>Tổng tiền - Grand total - 合計</u>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="color:rgb(255, 0, 0)">{{total}} VND</span>&nbsp;</strong> (<em>{{total_amount_in_words}})</em></span></p>

<p><span style="font-family:arial,helvetica,sans-serif"><u><strong>Ghi ch&uacute; - Notes - </strong></u></span><u><strong>備考</strong></u><span style="font-family:arial,helvetica,sans-serif"><strong>:</strong> <strong><span style="color:#FF0000">{{notes}}</span></strong></span></p>

<p>&nbsp;</p>

<p><strong><span style="font-family:arial,helvetica,sans-serif">Tr&acirc;n trọng - Sincerely Yours -&nbsp;ありがとうございました,</span></strong></p>

<p><span style="font-family:arial,helvetica,sans-serif">Simba E-shop Team<br />
        Điện thoại:&nbsp;<span style="color:#FF0000"><strong>028 7770 4567</strong></span><br />
        Email: <u>simbasales@simba.com.vn</u></span></p>

<p><span style="font-size:16px"><span style="font-family:times new roman,times,serif"><strong><em><span style="color:#008000">C&aacute;m ơn Qu&yacute; kh&aacute;ch h&agrave;ng đ&atilde; ủng hộ Simba E-shop!</span></em></strong></span></span></p>

<p><span style="font-size:16px"><span style="font-family:times new roman,times,serif"><em><strong><span style="color:#008000">Thank you for shopping at Simba E-shop!</span></strong></em></span></span></p>

<p><span style="font-size:16px"><span style="font-family:times new roman,times,serif"><em><strong><span style="color:#008000">Simba E-shop をご利用頂き、ありがとうございました！</span></strong>&nbsp;</em></span></span></p>
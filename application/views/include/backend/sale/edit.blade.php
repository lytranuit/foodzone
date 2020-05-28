<div class="row clearfix">
    <div class="col-12">
        <form method="POST" action="" id="form-dang-tin">
            <input type="hidden" name="user_id" value="0" />
            <section class="card card-fluid">
                <h5 class="card-header">
                    Sửa Đơn hàng
                    <div class="ml-auto">
                        <button type="submit" name="dangtin" class="btn btn-sm btn-primary float-right">Save</button>
                    </div>
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group row">
                                <b class="col-12 col-sm-3 col-form-label text-sm-right">Mã đơn hàng:<i class="text-danger">*</i></b>
                                <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                    <input class="form-control" type='text' name="code" readonly="" required="" disabled="" />
                                    <input class="form-control" type='hidden' name="id" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <b class="col-12 col-sm-3 col-form-label text-sm-right">Tên khách hàng:<i class="text-danger">*</i></b>
                                <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                    <input class="form-control" type='text' name="name" required="" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <b class="col-12 col-sm-3 col-form-label text-sm-right">Số điện thoại:</b>
                                <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                    <input class="form-control" type='text' name="phone" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <b class="col-12 col-sm-3 col-form-label text-sm-right">Email khách hàng:</b>
                                <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                    <input class="form-control" type='text' name="email" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <b class="col-12 col-sm-3 col-form-label text-sm-right">Địa chỉ giao hàng:</b>
                                <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                    <input class="form-control" type='text' name="address" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <b class="col-12 col-sm-3 col-form-label text-sm-right">Notes:</b>
                                <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                    <textarea class="form-control" name="notes">
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <b class="col-12 col-sm-3 col-form-label text-sm-right">Status:<i class="text-danger">*</i></b>
                                <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                    <select class="form-control" name="status">
                                        <option value="1">Mới đặt hàng</option>
                                        <option value="2">Đã xác nhận</option>
                                        <option value="3">Đang vận chuyển</option>
                                        <option value="4">Đã thanh toán</option>
                                        <option value="5">Ghi nợ</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </form>
        <div class="row mt-5">
            <div class="col-12">
                <div class="card card-fluid">
                    <div class="card-header">
                        Sản phẩm
                    </div>
                    <div class="card-body">
                        <table id="quanlytin" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Code</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Tổng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tin->data->details as $row)
                                <tr data-id='{{$row->id}}' data-price='{{$row->price}}'>
                                    <td>
                                        <img class="img-responsive" width="100" src="@if($row->image->type == 2) http://simbaeshop.com{{$row->image->src}} @else {{base_url()}}{{$row->image->src}} @endif" />
                                    </td>
                                    <td>{{$row->name_vi}}</td>
                                    <td>{{$row->code}}</td>
                                    <td>{{number_format($row->price,0,",",".")}} đ</td>
                                    <td>{{$row->qty}}</td>
                                    <td><span class="amount">{{number_format($row->amount,0,",",".")}}</span> đ</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <h4 class="ml-auto">Tổng đơn hàng: <span class="text-danger total_amount">{{number_format($tin->total_amount,0,",",".")}} đ</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function() {
        var tin = <?= json_encode($tin) ?>;
        fillForm($("#form-dang-tin"), tin);
        $.validator.setDefaults({
            debug: true,
            success: "valid"
        });
        $("#form-dang-tin").validate({
            highlight: function(input) {
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function(input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function(error, element) {
                $(element).parents('.form-group').append(error);
            },
            submitHandler: function(form) {
                form.submit();
                return false;
            }
        });
    });
</script>
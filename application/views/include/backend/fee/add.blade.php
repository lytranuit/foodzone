<div class="row clearfix">
    <div class="col-12">
        <form method="POST" action="" id="form-dang-tin">
            <section class="card card-fluid">
                <h5 class="card-header">
                    <div class="d-inline-block w-100">
                        <button type="submit" name="dangtin" class="btn btn-sm btn-primary float-right">Save</button>
                    </div>
                </h5>
                <div class="card-body">
                    <div class="form-group row">
                        <b class="col-12 col-lg-2 col-form-label">Khu vực:<i class="text-danger">*</i></b>
                        <div class="col-12 col-lg-4 pt-1">
                            <input class="form-control form-control-sm" type='text' name="name" required="" placeholder="Khu vực" />
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
</div>
<div class="row clearfix mt-3">
    <div class="col-12">
        <section class="card card-fluid">
            <h5 class="card-header drag-handle">
                <a class="btn btn-success btn-sm text-white" data-target="#fee-modal" data-toggle="modal">Thêm</a>
            </h5>
            <div class="card-body">
                <table id="quanly" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Đơn giá tối thiểu (>)</th>
                            <th>Đơn giá tối đa (<=)</th> <th>Phí giao hàng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
<div aria-hidden="true" aria-labelledby="fee-modalLabel" class="modal fade" id="fee-modal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="comment-modalLabel">
                    Phí giao hàng
                </h4>
            </div>
            <div class="modal-body">
                <div class="main">
                    <!--<p>Sign up once and watch any of our free demos.</p>-->
                    <form id="form-fee">
                        <input type="hidden" value="0" name="id" />
                        <div class="form-group">
                            <b class="form-label">Đơn giá tối thiểu:</b>
                            <div class="form-line">
                                <input name="min" class="form-control form-control-sm price">
                            </div>
                        </div>
                        <div class="form-group">
                            <b class="form-label">Đơn giá tối đa:</b>
                            <div class="form-line">
                                <input name="max" class="form-control form-control-sm price">
                            </div>
                        </div>
                        <div class="form-group">
                            <b class="form-label">Phí giao hàng:</b>
                            <div class="form-line">
                                <input name="fee" class="form-control form-control-sm price">
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary waves-effect" type="submit" name="cap_nhat">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function() {
        $('#quanly').DataTable({
            "lengthMenu": [
                [-1],
                ["All"]
            ],
            "columns": [{
                    "data": "min_format"
                },
                {
                    "data": "max_format"
                },
                {
                    "data": "fee_format"
                },
                {
                    "data": "action"
                }
            ]
        })
        $('.price').inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ",",
            autoGroup: true,
            suffix: ' VND', //No Space, this will truncate the first character
            rightAlign: false
        });
        $.validator.setDefaults({
            debug: true,
            success: "valid"
        });

        $("#form-fee").validate({
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
                let data = $(form).serialize();
                $('#fee-modal').trigger('click');
                save_fee(data);
                return false;
            }
        });
        $(document).on("click", ".fee_add", function() {
            $("#form-fee")[0].reset();
            $("#form-fee [name=id]").val(0);
        });
        $(document).on("click", ".fee_edit", function() {
            let id = $(this).data("id");
            let data_fee = $('#quanly').dataTable().fnGetData();
            let data = null;
            for (let i = 0; i < data_fee.length; i++) {
                if (data_fee[i]['id'] == id) {
                    data = data_fee[i];
                    break;
                }
            }
            fillForm($("#form-fee"), data);
        });

        $(document).on("click", ".fee_remove", function() {
            let parent = $(this).parents("tr").get(0);
            $('#quanly').dataTable().fnDeleteRow($('#quanly').dataTable().fnGetPosition(parent));
            let id = $(this).data("id");
            $.ajax({
                url: path + "fee/save_fee",
                data: {
                    id: id,
                    area_id: 0,
                    cap_nhat: true
                },
                dataType: "JSON",
                type: "POST"
            });
        })
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
                let data_fee = $('#quanly').dataTable().fnGetData();
                let append = "";
                for (let i = 0; i < data_fee.length; i++) {
                    let id = data_fee[i].id;
                    append += "<input type='hidden' name='fee[]' value='" + id + "' />";
                }
                $(form).append(append);
                form.submit();
                return false;
            }
        });
    });

    function save_fee(data_up) {
        $.ajax({
            url: path + "fee/save_fee",
            data: data_up,
            dataType: "JSON",
            type: "POST",
            success: function(data) {
                data = format_fee(data);
                console.log(data);
                if ($("[name=id]").val() > 0) {
                    let data_fee = $('#quanly').dataTable().fnGetData();
                    for (let i = 0; i < data_fee.length; i++) {
                        if (data_fee[i]['id'] == data['id']) {
                            $('#quanly').dataTable().fnUpdate(data, i);
                            break;
                        }
                    }

                } else {
                    $('#quanly').dataTable().fnAddData(data);
                }
                $("#form-fee")[0].reset();
                $("[name=id]").val(0);
                // $("#quanly tbody").append(rendered);
            }
        });
    }

    function format_fee(data) {
        data['action'] = '<a href="#" class="btn btn-warning btn-sm fee_edit mr-2" data-target="#fee-modal" data-toggle="modal" data-id="' + data['id'] + '"><i class="fas fa-pencil-alt"></i></a><a href="#" class="btn btn-danger btn-sm fee_remove" data-id="' + data['id'] + '"><i class="far fa-trash-alt"></i></a>';
        data['min_format'] = number_format(data['min'], 0, ",", ".") + " VND";
        data['max_format'] = number_format(data['max'], 0, ",", ".") + " VND";
        data['fee_format'] = number_format(data['fee'], 0, ",", ".") + " VND";

        return data;
    }
</script>
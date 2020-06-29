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
                    <div class="form-group row">
                        <b class="col-12 col-lg-2 col-form-label">Đơn hàng tối thiểu:<i class="text-danger">*</i></b>
                        <div class="col-12 col-lg-4 pt-1">
                            <input class="form-control form-control-sm min_amount" type='text' name="min_amount" required="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <b class="col-12 col-lg-2 col-form-label">Phí giao hàng:<i class="text-danger">*</i></b>
                        <div class="col-12 col-lg-4 pt-1">
                            <input class="form-control form-control-sm price" type='text' name="price" required="" />
                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function() {
        var tin = <?= json_encode($tin) ?>;
        fillForm($("#form-dang-tin"), tin);
        $('.price').inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ",",
            autoGroup: true,
            suffix: ' VND', //No Space, this will truncate the first character
            rightAlign: false
        });
        $('.min_amount').inputmask("numeric", {
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
<div class="row clearfix">
    <div class="col-12">
        <form method="POST" action="" id="form-dang-tin">
            <input type="hidden" name="parent_id" value="0" />
            <section class="card card-fluid">
                <h5 class="card-header">
                    <div class="d-inline-block w-100">
                        <button type="submit" name="dangtin" class="btn btn-sm btn-primary float-right">Save</button>
                    </div>
                </h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group row">
                                <b class="col-12 col-lg-1 col-form-label">Tên:<i class="text-danger">*</i></b>
                                <div class="col-12 col-lg-3 pt-1">
                                    <input id="price" class="form-control form-control-sm" type='text' name="name" required />
                                </div>
                                <b class="col-12 col-lg-1 col-form-label">Địa chỉ:<i class="text-danger">*</i></b>
                                <div class="col-12 col-lg-3 pt-1">
                                    <input id="price" class="form-control form-control-sm" type='text' name="address" required />
                                </div>

                            </div>
                            <div class="form-group row">
                                <b class="col-12 col-lg-1 col-form-label">Kinh độ:<i class="text-danger">*</i></b>
                                <div class="col-12 col-lg-3 pt-1">
                                    <input id="price" class="form-control form-control-sm" type='text' name="longitude" required />
                                </div>
                                <b class="col-12 col-lg-1 col-form-label">Vĩ độ:<i class="text-danger">*</i></b>
                                <div class="col-12 col-lg-3 pt-1">
                                    <input id="price" class="form-control form-control-sm" type='text' name="latitude" required />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">

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
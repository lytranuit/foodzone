<?= $widget->post_header(lang("sign_up")) ?>
<div class="container my-5">
    <div class="row justify-content-md-center">
        <div class="col-lg-9">
            <form method="POST" action="" id="form-dang-tin">
                <input type="hidden" name="dangtin" value="1" />
                <input type="hidden" name="active" value="1" />
                <section class="card">
                    <div class="card-header">
                        {{lang("sign_up")}}
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <b class="col-12 col-sm-3 col-form-label text-sm-right">{{lang('login_identity_label')}}:<i class="text-danger">*</i></b>
                                    <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                        <input type="text" class="form-control" value="" name="username" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <b class="col-12 col-sm-3 col-form-label text-sm-right">{{lang('login_password_label')}}:<i class="text-danger">*</i></b>
                                    <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                        <input type="password" class="form-control" name="newpassword" minlength="6" required="" aria-required="true">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <b class="col-12 col-sm-3 col-form-label text-sm-right">{{lang('login_confirm_password_label')}}:<i class="text-danger">*</i></b>
                                    <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                        <input type="password" class="form-control" name="confirmpassword" minlength="6" required="" aria-required="true">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <b class="col-12 col-sm-3 col-form-label text-sm-right">{{lang('login_name_label')}}:<i class="text-danger">*</i></b>
                                    <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                        <input type="text" class="form-control" value="" name="last_name" minlength="3" required="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <b class="col-12 col-sm-3 col-form-label text-sm-right">{{lang('login_phone_label')}}:<i class="text-danger">*</i></b>
                                    <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                        <input type="text" class="form-control" value="" name="phone" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <b class="col-12 col-sm-3 col-form-label text-sm-right">{{lang('login_email_label')}}:<i class="text-danger">*</i></b>
                                    <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                        <input type="email" class="form-control" value="" name="email" required="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <b class="col-12 col-sm-3 col-form-label text-sm-right">{{lang('login_address_label')}}:</b>
                                    <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                        <input type="text" class="form-control" value="" name="address">
                                    </div>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <button class="text-top btn btn-burnt-sienna btn-shape d-inline-block">
                                        <span>{{lang('sign_up')}}</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        let msg = '<?= $msg ?>';
        if (msg == 1) {
            alert(dup_username);
        } else if (msg == 2) {
            alert(dup_email);
        }
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
                // var username = $("input[name=username]").val();
                $.ajax({
                    url: path + "index/checkregister",
                    data: $(form).serialize(),
                    dataType: "JSON",
                    success: function(data) {
                        if (data.success == 1) {
                            form.submit();
                            return false;
                        } else {
                            alert(data.msg);
                        }
                    }
                });

                return false;
            }
        });

    })
</script>
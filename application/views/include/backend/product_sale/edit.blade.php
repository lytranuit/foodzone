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
                        <b class="col-12 col-lg-2 col-form-label">Tên:<i class="text-danger">*</i></b>
                        <div class="col-12 col-lg-4 pt-1">
                            <input class="form-control form-control-sm" type='text' name="name" required="" placeholder="Tên" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <b class="col-12 col-lg-2 col-form-label">Mô tả:</b>
                        <div class="col-lg-10">
                            <textarea class="form-control" name="description" placeholder="Mô tả"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <b class="col-12 col-lg-2 col-form-label">Sản phẩm:</b>
                        <div class="col-lg-10">
                            <select class="chosen" name="products[]" style="width: 200px;" multiple>
                                @foreach($product as $row)
                                <option value="{{$row->id}}">{{$row->code}} - {{$row->name_vi}}</option>
                                @endforeach
                            </select>
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
        $(".chosen").chosen({
            width: "100%"
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
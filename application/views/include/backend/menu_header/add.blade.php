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
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <b class="col-12 col-lg-4 col-form-label">Tiếng việt:<i class="text-danger">*</i></b>
                                <div class="col-12 col-lg-8 pt-1">
                                    <input class="form-control form-control-sm" type='text' name="name_vi" required="" placeholder="Tên" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <b class="col-12 col-lg-4 col-form-label">Tiếng Anh:</b>
                                <div class="col-12 col-lg-8 pt-1">
                                    <input class="form-control form-control-sm" type='text' name="name_en" placeholder="Tên - Tiếng Anh" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <b class="col-12 col-lg-4 col-form-label">Tiếng Nhật:</b>
                                <div class="col-12 col-lg-8 pt-1">
                                    <input class="form-control form-control-sm" type='text' name="name_jp" placeholder="Tên - Tiếng Nhật" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">

                                <b class="col-12 col-lg-2 col-form-label">Loại:</b>
                                <div class="col-12 col-lg-10 pt-1">
                                    <select class="form-control" name="type">
                                        <option value="1">Link</option>
                                        <option value="2">Danh mục</option>
                                        <option value="3">Chủ đề</option>
                                        <option value="4">Khuyến mãi</option>
                                        <option value="5">Bài viết</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group row link">
                                <b class="col-12 col-lg-2 col-form-label">Link:</b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <input class="form-control" name="link" value="#" />
                                </div>
                            </div>
                            <div class="form-group row category">
                                <b class="col-12 col-lg-2 col-form-label">Category:</b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <select class="form-control" name="category_id">
                                        @foreach($categories as $row)
                                        <option value="{{$row->id}}">{{$row->name_vi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row topics">
                                <b class="col-12 col-lg-2 col-form-label">Topic:</b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <select class="form-control" name="category_id">
                                        @foreach($topics as $row)
                                        <option value="{{$row->id}}">{{$row->name_vi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </section>
        </form>
    </div>
</div>
<script type='text/javascript'>
    $(document).ready(function() {
        $("[name=type]").change(function() {
            $(".link,.category,.topics").hide();
            $(".category select,.topics select").prop("disabled", true);
            let value = $(this).val();
            if (value == 1) {
                $(".link").show();
            } else if (value == 2) {
                $(".category").show();
                $(".category select").prop("disabled", false);
            } else if (value == 3) {
                $(".topics").show();
                $(".topics select").prop("disabled", false);
            }
        })
        $("[name=type]").change();
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
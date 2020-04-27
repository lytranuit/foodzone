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
                        <div class="col-lg-8">
                            <div class="form-group row">
                                <b class="col-12 col-lg-2 col-form-label">Mã:<i class="text-danger">*</i></b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <input class="form-control form-control-sm" type='text' name="code" required placeholder="Mã hàng" />
                                </div>
                                <b class="col-12 col-lg-2 col-form-label">Giá bán:<i class="text-danger">*</i></b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <input id="price" class="form-control form-control-sm" type='text' name="price" required placeholder="Giá bán" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <b class="col-12 col-lg-2 col-form-label">Đơn vị tính:</b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <input class="form-control form-control-sm" type='text' name="DVT" placeholder="Đơn vị tính" />
                                </div>
                                <b class="col-12 col-lg-2 col-form-label">Quy cách:</b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <input class="form-control form-control-sm" type='text' name="volume" placeholder="Quy cách" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                    <div class="image_ft"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#menu0">Tiếng Việt</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu1">Tiếng anh</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu2">Tiếng Nhật</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu3">Ready to Eat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu4">Ready to Cook</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="menu0" class="tab-pane active">
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Tên:<i class="text-danger">*</i></b>
                                        <div class="col-12 col-lg-4 pt-1">
                                            <input class="form-control form-control-sm" type='text' name="name_vi" required="" placeholder="Tên" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Mô tả sơ lược:</b>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" name="description_vi" placeholder="Mô tả"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Mô tả chi tiết:</b>
                                        <div class="col-lg-12">
                                            <textarea class="edit" name="detail_vi" placeholder="Tiếng việt"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Thành phần nguyên liệu:</b>
                                        <div class="col-lg-12">
                                            <textarea class="edit" name="element_vi" placeholder="Tiếng việt"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Hướng dẫn sử dụng:</b>
                                        <div class="col-lg-12">
                                            <textarea class="edit" name="guide_vi" placeholder="Tiếng việt"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu1" class=" tab-pane fade">
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Tên:</b>
                                        <div class="col-12 col-lg-4 pt-1">
                                            <input class="form-control form-control-sm" type='text' name="name_en" placeholder="Tên - Tiếng Anh" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Mô tả sơ lược:</b>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" name="description_en" placeholder="Mô tả - Tiếng Anh"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Mô tả chi tiết:</b>
                                        <div class="col-lg-12">
                                            <textarea class="edit" name="detail_en" placeholder="Tiếng Anh"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Thành phần nguyên liệu:</b>
                                        <div class="col-lg-12">
                                            <textarea class="edit" name="element_en" placeholder="Tiếng Anh"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Hướng dẫn sử dụng:</b>
                                        <div class="col-lg-12">
                                            <textarea class="edit" name="guide_en" placeholder="Tiếng Anh"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu2" class=" tab-pane fade">
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Tên:</b>
                                        <div class="col-12 col-lg-4 pt-1">
                                            <input class="form-control form-control-sm" type='text' name="name_jp" placeholder="Tên - Tiếng Nhật" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Mô tả sơ lược:</b>
                                        <div class="col-lg-12">
                                            <textarea class="form-control" name="description_jp" placeholder="Mô tả - Tiếng Nhật"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Mô tả chi tiết:</b>
                                        <div class="col-lg-12">
                                            <textarea class="edit" name="detail_jp" placeholder="Tiếng nhật"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Thành phần nguyên liệu:</b>
                                        <div class="col-lg-12">
                                            <textarea class="edit" name="element_jp" placeholder="Tiếng nhật"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Hướng dẫn sử dụng:</b>
                                        <div class="col-lg-12">
                                            <textarea class="edit" name="guide_jp" placeholder="Tiếng nhật"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu3" class=" tab-pane fade">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="text-danger">Danh mục sản phẩm</label>
                                        </div>
                                        @foreach($eat as $row)
                                        <div class="col-12">
                                            <div class="custom-checkbox custom-control">
                                                <input name="category_list[]" type="checkbox" id="eCheckbox{{$row->id}}" class="custom-control-input" value="{{$row->id}}">
                                                <label class="custom-control-label" for="eCheckbox{{$row->id}}">{{$row->name_vi}}</label>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div id="menu4" class=" tab-pane fade">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="text-danger">Danh mục sản phẩm</label>
                                        </div>
                                        @foreach($cook as $row)
                                        <div class="col-12">
                                            <div class="custom-checkbox custom-control">
                                                <input name="category_list[]" type="checkbox" id="eCheckbox{{$row->id}}" class="custom-control-input" value="{{$row->id}}">
                                                <label class="custom-control-label" for="eCheckbox{{$row->id}}">{{$row->name_vi}}</label>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
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
        $(".image_ft").imageFeature();
        var tin = <?= json_encode($tin) ?>;
        fillForm($("#form-dang-tin"), tin);
        if (tin.image) {
            $(".image_ft").imageFeature("set_image", tin.image);
        }
        $('#price').inputmask("numeric", {
            radixPoint: ".",
            groupSeparator: ",",
            autoGroup: true,
            suffix: ' VND', //No Space, this will truncate the first character
            rightAlign: false,
            oncleared: function() {
                self.Value('');
            }
        });
        $('.edit').froalaEditor({
            heightMin: 200,
            heightMax: 500, // Set the image upload URL.
            imageUploadURL: '<?= base_url() ?>admin/uploadimage',
            // Set request type.
            imageUploadMethod: 'POST',
            // Set max image size to 5MB.
            imageMaxSize: 5 * 1024 * 1024,
            // Allow to upload PNG and JPG.
            imageAllowedTypes: ['jpeg', 'jpg', 'png', 'gif'],
            htmlRemoveTags: [],
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
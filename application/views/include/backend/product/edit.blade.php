<div class="row clearfix">
    <div class="col-12">
        <form method="POST" action="" id="form-dang-tin">
            <section class="card card-fluid">
                <h5 class="card-header">
                    <div>
                        <select class="chosen" id="product_simba">
                            <option value="0">Lấy Sản phẩm từ Simba</option>
                            @foreach($product_simba as $row)
                            <option value="{{$row->id}}">{{$row->code}} - {{$row->name_vi}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div style="margin-left:auto">
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
                                <b class="col-12 col-lg-2 col-form-label">Xuất xứ:</b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <select name="origin_id" class="form-control form-control-sm">
                                        @foreach($origin as $row)
                                        <option value="{{$row->id}}">{{$row->name_vi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <b class="col-12 col-lg-2 col-form-label">Bảo quản:</b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <select name="preservation_id" class="form-control form-control-sm">
                                        @foreach($preservation as $row)
                                        <option value="{{$row->id}}">{{$row->name_vi}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <b class="col-12 col-lg-2 col-form-label">Hạn sử dụng:</b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <input class="form-control form-control-sm" type='text' name="expiry_date" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <b class="col-12 col-lg-2 col-form-label">Hiển thị:</b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <div class="switch-button switch-button-xs switch-button-success">
                                        <input type="hidden" class="input-tmp" checked="" name="active" value="0">
                                        <input type="checkbox" checked="" id="switch2" name="active" value="1">
                                        <span>
                                            <label for="switch2"></label>
                                        </span>
                                    </div>
                                </div>
                                <b class="col-12 col-lg-2 col-form-label">Sắp xếp:</b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <input id="price" class="form-control form-control-sm" type='number' name="order" />
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
                                    <a class="nav-link" data-toggle="tab" href="#menu6">Đơn bị tính</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu7">Hình ảnh khác</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu5">Sản phẩm liên quan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu3">Danh mục</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu4">Topics</a>
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
                                <div id="menu5" class=" tab-pane fade">
                                    <div class="row">
                                        <div class="col-12">
                                            <label class="text-danger">Sản phẩm liên quan</label>
                                            <select class="chosen" name="related[]" style="width: 200px;" multiple>
                                                @foreach($product as $row)
                                                <option value="{{$row->id}}">{{$row->code}} - {{$row->name_vi}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu6" class=" tab-pane fade">
                                    <div class="row clearfix">
                                        <div class="col-12">
                                            <section class="card card-fluid">
                                                <h5 class="card-header drag-handle">
                                                    <a class="btn btn-success btn-sm text-white" data-target="#dvt-modal" data-toggle="modal">Thêm</a>
                                                </h5>
                                                <div class="card-body">
                                                    <table id="quanly" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Tiếng Việt</th>
                                                                <th>Tiếng Anh</th>
                                                                <th>Tiếng Nhật</th>
                                                                <th>Đơn vị</th>
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
                                </div>
                                <div id="menu7" class=" tab-pane fade">
                                    <div class="row clearfix">
                                        <div class="col-12">
                                            <section class="card card-fluid">
                                                <h5 class="card-header drag-handle">
                                                    <a class="btn btn-success btn-sm text-white multiple_image">Thêm</a>
                                                </h5>
                                                <div class="card-body">
                                                    <table id="quanlyimage" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <tH>Hình ảnh</tH>
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
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
</div>


<div aria-hidden="true" aria-labelledby="dvt-modalLabel" class="modal fade" id="dvt-modal" role="dialog" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="comment-modalLabel">
                    Đơn vị tính
                </h4>
            </div>
            <div class="modal-body">
                <div class="main">
                    <!--<p>Sign up once and watch any of our free demos.</p>-->
                    <form id="form-dvt">
                        <input type="hidden" value="0" name="id" />
                        <div class="form-group">
                            <b class="form-label">Tiếng Việt:<i class="text-danger">*</i></b>
                            <div class="form-line">
                                <input name="name_vi" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <b class="form-label">Tiếng Anh</b>
                            <div class="form-line">
                                <input name="name_en" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <b class="form-label">Tiếng Nhật</b>
                            <div class="form-line">
                                <input name="name_jp" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <b class="form-label">Đơn vị:<i class="text-danger">*</i></b>
                            <div class="form-line">
                                <input name="special_unit" type="number" required class="form-control">
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
        $(".image_ft").imageFeature();
        var tin = <?= json_encode($tin) ?>;
        fillForm($("#form-dang-tin"), tin);
        if (tin.image) {
            $(".image_ft").imageFeature("set_image", tin.image);
        }
        $(".multiple_image").imageFeature({
            multiple: true,
            id: 'multi'
        }).on("done", function(event, ...data) {
            for (let i = 0; i < data.length; i++) {
                let row = data[i];
                row['image'] = '<img src="' + row['image'] + '" width="200"/>';

                row['action'] = '<a href="#" class="btn btn-danger btn-sm image_remove" data-id="' + row['image_id'] + '"><i class="far fa-trash-alt"></i></a>';

                $('#quanlyimage').dataTable().fnAddData(row);
            }
        });
        $('#quanly').DataTable({
            "lengthMenu": [
                [-1],
                ["All"]
            ],
            "columns": [{
                    "data": "name_vi"
                },
                {
                    "data": "name_en"
                },
                {
                    "data": "name_jp"
                },
                {
                    "data": "special_unit"
                },
                {
                    "data": "action"
                }
            ]
        });

        $('#quanlyimage').DataTable({
            "lengthMenu": [
                [-1],
                ["All"]
            ],
            "columns": [{
                    "data": "image"
                },
                {
                    "data": "action"
                }
            ]
        })
        if (tin.units) {
            for (let i = 0; i < tin.units.length; i++) {
                let data = tin.units[i];
                data['action'] = '<a href="#" class="btn btn-warning btn-sm dvt_edit mr-2" data-target="#dvt-modal" data-toggle="modal" data-id="' + data['id'] + '"><i class="fas fa-pencil-alt"></i></a><a href="#" class="btn btn-danger btn-sm dvt_remove" data-id="' + data['id'] + '"><i class="far fa-trash-alt"></i></a>';
                $('#quanly').dataTable().fnAddData(data);
            }
        }

        if (tin.other_image) {
            for (let i = 0; i < tin.other_image.length; i++) {
                let row = tin.other_image[i];
                let src = row['type'] == 2 ? row['src'] : path + row['src'];
                row['image'] = '<img src="' + src + '" width="200"/>';
                row['image_id'] = row['id'];
                row['action'] = '<a href="#" class="btn btn-danger btn-sm image_remove" data-id="' + row['id'] + '"><i class="far fa-trash-alt"></i></a>';

                $('#quanlyimage').dataTable().fnAddData(row);
            }
        }
        $(".chosen").chosen({
            width: "100%"
        });
        $("#product_simba").change(function() {
            let val = $(this).val();
            $.ajax({
                url: path + "product/get_simba/" + val,
                dataType: "JSON",
                success: function(data) {
                    data['origin_id'] = data['origin_country_id'];
                    data['price'] = data['retail_price'];
                    fillForm($("#form-dang-tin"), data);
                    if (data.image) {
                        $(".image_ft").imageFeature("set_image", data.image);
                    }
                    $('[name=detail_vi]').froalaEditor('html.set', data['detail_vi'])
                    $('[name=detail_en]').froalaEditor('html.set', data['detail_en'])
                    $('[name=detail_jp]').froalaEditor('html.set', data['detail_jp'])

                    $('[name=element_vi]').froalaEditor('html.set', data['description_vi'])
                    $('[name=element_en]').froalaEditor('html.set', data['description_en'])
                    $('[name=element_jp]').froalaEditor('html.set', data['description_jp'])

                    $('[name=guide_vi]').froalaEditor('html.set', data['guide_vi'])
                    $('[name=guide_en]').froalaEditor('html.set', data['guide_en'])
                    $('[name=guide_jp]').froalaEditor('html.set', data['guide_jp'])

                    $('[name=description_vi]').val('')
                    $('[name=description_en]').val('')
                    $('[name=description_jp]').val('')

                }
            })
        })
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
                let data_dvt = $('#quanly').dataTable().fnGetData();
                let append = "";
                for (let i = 0; i < data_dvt.length; i++) {
                    let id = data_dvt[i].id;
                    append += "<input type='hidden' name='dvt[]' value='" + id + "' />";
                }
                $(form).append(append);


                let data_image = $('#quanlyimage').dataTable().fnGetData();
                // console.log(data_image);
                // return;
                append = "";
                for (let i = 0; i < data_image.length; i++) {
                    let id = data_image[i].image_id;
                    append += "<input type='hidden' name='image_other[]' value='" + id + "' />";
                }
                $(form).append(append);
                form.submit();
                return false;
            }
        });

        $("#form-dvt").validate({
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
                $.ajax({
                    url: path + "product/save_dvt",
                    data: $(form).serialize(),
                    dataType: "JSON",
                    type: "POST",
                    success: function(data) {
                        $('#dvt-modal').trigger('click');
                        data['action'] = '<a href="#" class="btn btn-warning btn-sm dvt_edit mr-2" data-target="#dvt-modal" data-toggle="modal" data-id="' + data['id'] + '"><i class="fas fa-pencil-alt"></i></a><a href="#" class="btn btn-danger btn-sm dvt_remove" data-id="' + data['id'] + '"><i class="far fa-trash-alt"></i></a>';

                        if ($("[name=id]").val() > 0) {
                            let data_dvt = $('#quanly').dataTable().fnGetData();
                            for (let i = 0; i < data_dvt.length; i++) {
                                if (data_dvt[i]['id'] == data['id']) {
                                    $('#quanly').dataTable().fnUpdate(data, i);
                                    break;
                                }
                            }

                        } else {
                            $('#quanly').dataTable().fnAddData(data);
                        }
                        form.reset();
                        // $("#quanly tbody").append(rendered);
                    }
                });
                return false;
            }
        });
        $(document).on("click", ".dvt_edit", function() {
            let id = $(this).data("id");
            let data_dvt = $('#quanly').dataTable().fnGetData();
            let data = null;
            for (let i = 0; i < data_dvt.length; i++) {
                if (data_dvt[i]['id'] == id) {
                    data = data_dvt[i];
                    break;
                }
            }
            fillForm($("#form-dvt"), data);
        });

        $(document).on("click", ".dvt_remove", function() {
            let parent = $(this).parents("tr").get(0);
            $('#quanly').dataTable().fnDeleteRow($('#quanly').dataTable().fnGetPosition(parent));
            let id = $(this).data("id");
            $.ajax({
                url: path + "product/save_dvt",
                data: {
                    id: id,
                    product_id: 0,
                    cap_nhat: true
                },
                dataType: "JSON",
                type: "POST"
            });
        })


        $(document).on("click", ".image_remove", function() {
            let parent = $(this).parents("tr").get(0);
            $('#quanlyimage').dataTable().fnDeleteRow($('#quanlyimage').dataTable().fnGetPosition(parent));
        })
    });
</script>
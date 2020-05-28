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
                    <div class="row">
                        <div class="col-lg-8">
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
                            <div class="form-group row">
                                <b class="col-12 col-lg-2 col-form-label">Hiển thị ở trang chủ:</b>
                                <div class="col-12 col-lg-4 pt-1">
                                    <div class="switch-button switch-button-xs switch-button-success">
                                        <input type="hidden" class="input-tmp" checked="" name="is_home" value="0">
                                        <input type="checkbox" checked="" id="switch3" name="is_home" value="1">
                                        <span>
                                            <label for="switch3"></label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group row">
                                <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                    <div class="image_ft"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
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
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="menu0" class="container tab-pane active"><br>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Danh mục:<i class="text-danger">*</i></b>
                                        <div class="col-12 col-lg-4 pt-1">
                                            <input class="form-control form-control-sm" type='text' name="name_vi" required="" placeholder="Tên" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Mô tả:</b>
                                        <div class="col-lg-10">
                                            <textarea class="form-control edit" name="description_vi" placeholder="Mô tả"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu1" class="container tab-pane fade"><br>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Danh mục:<i class="text-danger">*</i></b>
                                        <div class="col-12 col-lg-4 pt-1">
                                            <input class="form-control form-control-sm" type='text' name="name_en" placeholder="Tên - Tiếng Anh" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Mô tả:</b>
                                        <div class="col-lg-10">
                                            <textarea class="form-control edit" name="description_en" placeholder="Mô tả - Tiếng Anh"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div id="menu2" class="container tab-pane fade"><br>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Danh mục:<i class="text-danger">*</i></b>
                                        <div class="col-12 col-lg-4 pt-1">
                                            <input class="form-control form-control-sm" type='text' name="name_jp" placeholder="Tên - Tiếng Nhật" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <b class="col-12 col-lg-2 col-form-label">Mô tả:</b>
                                        <div class="col-lg-10">
                                            <textarea class="form-control edit" name="description_jp" placeholder="Mô tả - Tiếng Nhật"></textarea>
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

<div class="row mt-5">
    <div class="col-12">
        <div class="card card-fluid">
            <div class="card-header">
                Sản phẩm
                <div class="ml-auto">
                    <select class="form-control product_add" multiple>
                        @foreach($products_add as $row)
                        <option value="{{$row->id}}">
                            {{$row->code}} - {{$row->name_vi}}
                        </option>
                        @endforeach
                    </select>
                    <button class="btn btn-success add_product">
                        Add
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="dd" id="nestable2">
                    <ol class="dd-list ui-sortable" id="nestable">
                        @foreach($products as $row)
                        <li class="dd-item ui-sortable-handle" id="menuItem_{{$row->id}}" data-id="{{$row->id}}">
                            <div class="dd-handle">
                                <div>{{$row->product->code}} - {{$row->product->name_vi}}</div>
                                <div class="dd-nodrag btn-group ml-auto">
                                    <a class="btn btn-sm btn-outline-light" href="{{base_url()}}product/edit/{{$row->product_id}}">Edit</a>
                                    <a class="btn btn-sm btn-outline-light" href="{{base_url()}}eat/remove_product/{{$row->id}}" data-type="confirm" title="Xóa ra khỏi dạnh mục">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <ol class="dd-list"></ol>
                        </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="height: 300px">
</div>
<script type='text/javascript'>
    $(document).ready(function() {
        $("select[multiple]").chosen();

        $(".image_ft").imageFeature();
        var tin = <?= json_encode($tin) ?>;
        fillForm($("#form-dang-tin"), tin);
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
        if (tin.image) {
            $(".image_ft").imageFeature("set_image", tin.image);
        }
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
                var arraied = $('#nestable').nestedSortable('toArray', {
                    excludeRoot: true
                });
                console.log(arraied);
                let append = "";
                for (var i = 0; i < arraied.length; i++) {
                    let id = arraied[i]['id'];
                    append += "<input type='hidden' name='product_category[]' value='" + id + "' />";
                }
                $(form).append(append);
                form.submit();
                return false;
            }
        });
        $('#nestable').nestedSortable({
            forcePlaceholderSize: true,
            items: 'li',
            opacity: .6,
            maxLevels: 1,
            placeholder: 'dd-placeholder',
        });
        $(".add_product").click(function() {

            let product = $(".product_add").val();
            let category_id = tin['id'];
            $.ajax({
                type: "POST",
                data: {
                    data: JSON.stringify(product),
                    category_id: category_id,
                },
                url: path + "eat/addproductcategory",
                success: function(msg) {
                    // alert("Success!");
                    location.reload();
                }
            })
        });
    });
</script>
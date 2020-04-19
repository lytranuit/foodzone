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
                        <div class="col-8">
                            <div class="form-group row">
                                <b class="col-12 col-sm-3 col-form-label text-sm-right">Thứ tự:<i class="text-danger">*</i></b>
                                <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                    <input class="form-control form-control-sm" type='number' name="order" required="" placeholder="Thứ tự" />
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group row">
                                <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                    <input class="form-control form-control-sm" type='hidden' name="image_id" required="" />
                                    <img style='max-width:100%;' data-target="#image-modal" data-toggle="modal" src="{{base_url()}}public/image/temp.png" class="image_feature" style="cursor:pointer;" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </form>
    </div>
</div>
<!-- THAY DOI MAT KHAU Modal-->
<div aria-hidden="true" aria-labelledby="image-modalLabel" class="modal fade" id="image-modal" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" id="comment-modalLabel">
                    Image
                </p>
                <button type="button" class="btn btn-success" id="btn-upload">Upload</button>
                <input id="input-upload" type="file" accept="image/*" class="d-none" />
            </div>
            <div class="modal-body">
                <div id="image-main" class="row">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success select_image" data-dismiss="modal">Select</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Cancle</button>
            </div>
        </div>
    </div>
</div>

<script id="image_template" type="x-tmpl-mustache">
    <div class="col-md-1 p-2">
        <a href="#" class="rounded border d-inline-block image_tmp" data-id="<?= '{{id}}' ?>" data-src="{{base_url()}}<?= '{{src}}' ?>">
            <img class="img-responsive" src="{{base_url()}}<?= '{{src}}' ?>" style="max-width:100%;"/>
        </a>
    </div>
</script>
<script type='text/javascript'>
    $(document).ready(function() {
        function load_images() {
            $.ajax({
                url: path + "ajax/images",
                dataType: "JSON",

            }).then(function(data) {
                $("#image-main").empty();
                html = "";
                for (let i = 0; i < data.length; i++) {
                    let data_image = data[i];
                    let image_template = $('#image_template').html();
                    let rendered = Mustache.render(image_template, data_image);
                    html += rendered;
                }
                $("#image-main").html(html);
            })
        }
        $(".select_image").click(function() {
            let active_image = $(".image_tmp.border-info");
            let id = active_image.data("id");
            let src = active_image.data("src");
            $(".image_feature").attr("src", src);
            $("[name=image_id]").val(id);
        });
        $(document).off("click", ".image_tmp").on("click", ".image_tmp", function() {
            $(".image_tmp").removeClass("border-info");
            $(this).addClass("border-info");
            console.log("ok");
        })
        $(".image_feature").click(function() {
            load_images();
        });
        $("#input-upload").change(function() {
            let file = $(this)[0].files[0];
            console.log(file);
            let m_data = new FormData;
            m_data.append("file", file);
            $.ajax({
                url: path + "ajax/uploadimage",
                data: m_data,
                type: 'POST',
                contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                processData: false, // NEEDED, DON'T OMIT THIS
            }).then(function() {
                load_images();
            });
        })
        $("#btn-upload").click(function() {
            $("#input-upload").click();
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
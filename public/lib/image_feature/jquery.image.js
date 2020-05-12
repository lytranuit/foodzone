(function ($) {
    var wigoID = 0;
    var $doc = $(document);
    $.widget('dt.imageFeature', {
        options: {
            lazyLoad: false,
            multiple: false,
            id: null
        },
        _create: function () {
            var el = this.element;
            var opt = this.options;
            var self = this;
            /*
             * ADD CLASS NAMESPACE
             */
            this._namespaceID = this.eventNamespace || ('wigo' + wigoID);
            this._id = wigoID
            wigoID++;
            if (opt.id)
                wigoID = opt.id
            if (opt.multiple == false) {
                this.input = $('<input class="form-control form-control-sm" type="hidden" name="image_id" required="" />').appendTo(el);
                this.image = $('<img style="max-width:100%;cursor:pointer; "data-target="#image-modal-' + wigoID + '" data-toggle="modal" src="' + path + 'public/image/temp.png" class="image_feature" />').appendTo(el);
            } else {
                $(el).attr("data-target", "#image-modal-multi").attr("data-toggle", "modal");
            }
            this.modal = $('<div aria-hidden="true" aria-labelledby="image-modalLabel" class="modal fade" id="image-modal-' + wigoID + '" role="dialog" tabindex="-1">'
                + '<div class="modal-dialog modal-xl" role="document">'
                + '    <div class="modal-content">'
                + '        <div class="modal-header">'
                + '            <p class="modal-title" id="comment-modalLabel">'
                + '                Image'
                + '            </p>'
                + '            <button type="button" class="btn btn-success" id="btn-upload">Upload</button>'
                + '            <input id="input-upload" type="file" accept="image/*" class="d-none" />'
                + '        </div>'
                + '        <div class="modal-body">'
                + '            <div class="image-main row">'
                + '            </div>'
                + '        </div>'
                + '        <div class="modal-footer">'
                + '            <button type="button" class="btn btn-success select_image" data-dismiss="modal">Select</button>'
                + '            <button type="button" class="btn btn-success" data-dismiss="modal">Cancle</button>'
                + '        </div>'
                + '    </div>'
                + '</div>'
                + '</div>').appendTo("body");
            this.template = '<div class="col-md-1 p-2">'
                + '    <a href="#" class="rounded border d-inline-block image_tmp" data-id="{{id}}" data-src="' + path + '{{src}}">'
                + '        <img class="img-responsive" src="' + path + '{{src}}" style="max-width:100%;"/>'
                + '    </a>'
                + '</div>'
            /*
             * BAT SU KIEN
             */
            this._bindEvents();
        },
        _bindEvents: function () {
            var self = this;
            var el = this.element;
            var opt = this.options;
            var event_remove;
            // window.addEventListener('paste', ... or
            if (opt.multiple == false) {
                $(".select_image", self.modal).click(function () {
                    let active_image = $(".image_tmp.border-info", self.modal);
                    let id = active_image.data("id");
                    let src = active_image.data("src");
                    $(self.image).attr("src", src);
                    $(self.input).val(id);
                });
                $(this.modal).off("dblclick", ".image_tmp").on("dblclick", ".image_tmp", function () {
                    $(".select_image", self.modal).trigger("click");
                });
                $(this.modal).off("click", ".image_tmp").on("click", ".image_tmp", function () {
                    $(".image_tmp", this.modal).removeClass("border-info");
                    $(this).addClass("border-info");
                })
                $(this.image).click(function () {
                    self.load_images();
                });
            } else {
                $(el).click(function () {
                    self.load_images();
                });
                $(".select_image", self.modal).click(function () {
                    let data = $(".image_tmp.border-info", self.modal).map(function () {
                        return { image_id: $(this).data("id"), image: $(this).data("src") };
                    }).get();
                    console.log(data);
                    $(el).trigger("done", data);
                });
                $(this.modal).off("click", ".image_tmp").on("click", ".image_tmp", function () {
                    $(this).toggleClass("border-info");
                });
            }
            $("#input-upload", this.modal).change(function () {
                let file = $(this)[0].files[0];
                let m_data = new FormData;
                m_data.append("file", file);
                $.ajax({
                    url: path + "ajax/uploadimage",
                    data: m_data,
                    type: 'POST',
                    contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
                    processData: false, // NEEDED, DON'T OMIT THIS
                }).then(function () {
                    self.load_images();
                });
            })
            $("#btn-upload", this.modal).click(function () {
                $("#input-upload", this.modal).click();
            });

        },
        _destroy: function () {
        },
        _setOption: function (key, value) {
            var self = this;
            self._super(key, value);
        },
        load_images: function () {
            let self = this;
            $.ajax({
                url: path + "ajax/images",
                dataType: "JSON",

            }).then(function (data) {
                $(".image-main", self.modal).empty();
                html = "";
                for (let i = 0; i < data.length; i++) {
                    let data_image = data[i];
                    let rendered = Mustache.render(self.template, data_image);
                    html += rendered;
                }
                $(".image-main", self.modal).html(html);
            })
        },
        set_image: function (image) {
            let id = image.id;
            let src = path + image.src;
            if (image.type == 2) {
                src = "http://simbaeshop.com" + image.src;
            }
            $(this.image).attr("src", src)
            $(this.input).val(id);
        }
    });
})(jQuery);
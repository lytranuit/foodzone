$(document).ready(function () {

    ///MOVE MODAL RA NGOÀI
    $(".app-main .modal").detach().appendTo("body");
    ////Confirm
    $(document).off("click", "[data-type='confirm']").on("click", "[data-type='confirm']", function (e) {
        e.preventDefault();
        var title = $(this).attr("title");
        var href = $(this).attr("href");
        if (confirm(title) == true) {
            location.href = href;
        }
        return false;
    })
})

var fillForm = function (form, data) {
    $('input, select, textarea', form).not("[type=file]").each(function () {
        var type = $(this).attr('type');
        var name = $(this).attr('name');
        if (!name)
            return;
        name = name.replace("[]", "");

        var value = "";
        if ($(this).hasClass("input-tmp"))
            return
        if ($.type(data[name]) !== "undefined" && $.type(data[name]) !== "null") {
            value = data[name];
        } else {
            return;
        }

        switch (type) {
            case 'checkbox':
                $(this).prop('checked', false);
                var rdvalue = $(this).val();
                if (rdvalue == value || value.indexOf(rdvalue) != -1) {
                    $(this).prop('checked', true);
                }
                break;
            case 'radio':
                $(this).removeAttr('checked', 'checked');
                var rdvalue = $(this).val();
                if (rdvalue == value) {
                    $(this).prop('checked', true);
                }
                break;
            default:
                $(this).val(value);
                break;
        }
        //            $('select', form).selectpicker('render');
    });
}
$(document).ready(function () {
    $(".index_category a").click(async function (e) {
        e.preventDefault();
        let parent = $(this).parents(".index_category");
        let section = $(this).parents("section");
        let menu_id = parent.data("id");
        let id = $(this).data("id");

        $(".index_category a", section).removeClass("active");
        $(this).addClass("active");

        let spinner = "<div class='text-center h4 col-12'><i class='fas fa-circle-notch fa-spin'></i></div>";
        $(".index_product", section).html(spinner);
        let product = await $.ajax({
            url: path + "ajax/product",
            data: { category_id: id, menu_id: id, limit: 30 },
            dataType: "HTML"
        });
        $(".index_product", section).html(product);
    });
    ////TRIGGER
    $(".index_category").each(function () {
        $("a.active", $(this)).trigger("click");
    })
})
<!-- ============================================================== -->
<!-- pageheader -->
<!-- ============================================================== -->
<div class="row clearfix">
    <div class="col-12">
        <section class="card card-fluid">
            <h5 class="card-header drag-handle">
                <a class="btn btn-success btn-sm" href="{{base_url()}}cook/add">Thêm</a>
                <div style="margin-left:auto;">
                    <a class="btn btn-sm btn-primary" id='save' href="#">Save</a>
                </div>
            </h5>
            <div class="card-body">
                <div class="dd" id="nestable2">
                    <?= $html_nestable ?>
                </div>
            </div>
        </section>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#nestable').nestedSortable({
            forcePlaceholderSize: true,
            items: 'li',
            opacity: .6,
            placeholder: 'dd-placeholder',
        });
        $("#save").click(function() {
            var arraied = $('#nestable').nestedSortable('toArray', {
                excludeRoot: true
            });

            $.ajax({
                type: "POST",
                data: {
                    data: JSON.stringify(arraied)
                },
                url: path + "cook/saveordercategory",
                success: function(msg) {
                    alert("Success!");
                }
            })
        });
        $(document).off("click", ".dd-item-delete").on("click", ".dd-item-delete", async function() {
            var parent = $(this).closest(".dd-item");
            var id = parent.data("id");
            var array = [id];
            $(".dd-item", parent).each(function() {
                var id = $(this).data("id");
                array.push(id);
            });
            var r = confirm("Delete it?");
            if (r == true) {
                var promiseAll = [];
                for (var i = 0; i < array.length; i++) {
                    var id = array[i]
                    var promise = $.ajax({
                        type: "POST",
                        data: {
                            data: JSON.stringify({
                                id: id,
                                deleted: 1
                            })
                        },
                        url: path + "cook/savecategory"
                    })
                    promiseAll.push(promise);
                }
                await Promise.all(promiseAll);
                location.reload();
            }
        })
    });
</script>
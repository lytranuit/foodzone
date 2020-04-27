<!-- ============================================================== -->
<!-- pageheader -->
<!-- ============================================================== -->
<div class="row clearfix">
    <div class="col-12">
        <section class="card card-fluid">
            <h5 class="card-header drag-handle">
                <a class="btn btn-success btn-sm" href="{{base_url()}}eat/add">Thêm</a>
            </h5>
            <div class="card-body">
                <table id="quanlytin" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Danh mục</th>
                            <th>Mô tả</th>
                            <th>Hiển thị</th>
                            <th>Thứ tự</th>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('#quanlytin').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url": path + "eat/table",
                "dataType": "json",
                "type": "POST",
            },
            "columns": [{
                    "data": "name_vi"
                }, {
                    "data": "description_vi"
                }, {
                    "data": "active"
                }, {
                    "data": "order"
                },
                {
                    "data": "action"
                }
            ]

        });
    });
</script>
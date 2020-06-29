<!-- ============================================================== -->
<!-- pageheader -->
<!-- ============================================================== -->
<div class="row clearfix">
    <div class="col-12">
        <section class="card card-fluid">
            <h5 class="card-header drag-handle">
                <a class="btn btn-success btn-sm" href="{{base_url()}}fee/add">Thêm</a>
            </h5>
            <div class="card-body">
                <table id="quanlytin" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Khu vực</th>
                            <th>Đơn hàng tối thiểu</th>
                            <th>Phí giao hàng</th>
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
                "url": path + "fee/table",
                "dataType": "json",
                "type": "POST",
            },
            "columns": [{
                    "data": "name"
                }, {
                    "data": "min_amount"
                }, {
                    "data": "price"
                },
                {
                    "data": "action"
                }
            ]

        });
    });
</script>
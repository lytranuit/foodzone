<!-- ============================================================== -->
<!-- pageheader -->
<!-- ============================================================== -->
<div class="row clearfix">
    <div class="col-12">
        <section class="card card-fluid">
            <h5 class="card-header drag-handle">
                <a class="btn btn-success btn-sm" href="{{base_url()}}product_price/add">Thêm</a>
            </h5>
            <div class="card-body">
                <table id="quanlytin" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Tên</th>
                            <th>Đơn vi tính</th>
                            <th>Giá</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
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
                "url": path + "product_price/table",
                "dataType": "json",
                "type": "POST",
            },
            "columns": [{
                    "data": "code"
                },
                {
                    "data": "name_vi"
                },
                {
                    "data": "unit_name"
                },
                {
                    "data": "price"
                },
                {
                    "data": "date_from"
                },
                {
                    "data": "date_to"
                },
                {
                    "data": "action"
                }
            ]

        });
    });
</script>
<!-- ============================================================== -->
<!-- pageheader -->
<!-- ============================================================== -->
<div class="row clearfix">
    <div class="col-12">
        <section class="card card-fluid">
            <h5 class="card-header drag-handle">

            </h5>
            <div class="card-body">
                <table id="quanlytin" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Mã</th>
                            <th>Ngày đặt hàng</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Status</th>
                            <th>Tổng số tiền</th>
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
                "url": path + "sale/table",
                "dataType": "json",
                "type": "POST",
            },
            "columns": [{
                    "data": "code"
                },
                {
                    "data": "order_date"
                }, {
                    "data": "name"
                }, {
                    "data": "phone"
                }, {
                    "data": "address"
                }, {
                    "data": "status"
                }, {
                    "data": "total_amount"
                },
                {
                    "data": "action"
                }
            ]

        });
    });
</script>
<div class="row clearfix">
    <div class="col-12">

        <form id="form_advanced_validation" method="POST" novalidate="novalidate">
            <section class="card card-fluid">
                <h5 class="card-header drag-handle">
                    Ngôn ngữ
                    <div style="margin-left:auto">
                        <button class="btn btn-primary btn-sm float-right" type="submit" id="Save">Cập nhật</button>
                    </div>
                </h5>
                <div class="card-body">
                    <table id="quanlytin" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Key</th>
                                <th>Tiếng Việt</th>
                                <th>Tiếng Anh</th>
                                <th>Tiếng Nhật</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0 ?>
                            @foreach($moduleData as $key=>$row)

                            <?php $i++ ?>
                            <tr>
                                <td>{{$i}}</td>
                                <td class="key">{{$key}}</td>
                                <td><input type='text' style="width:100%;" class="form-control vietnamese" value='{{$row['vietnamese'] or ""}}' /></td>
                                <td><input type='text' style="width:100%;" class="form-control english" value='{{$row['english'] or ""}}' /></td>
                                <td><input type='text' style="width:100%;" class="form-control japanese" value='{{$row['japanese'] or ""}}' /></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </form>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#quanlytin').DataTable({
            "lengthMenu": [
                [-1],
                ["All"]
            ]
        });
        $("#Save").click(function(e) {
            e.preventDefault();
            var data = {
                vietnamese: {},
                english: {},
                japanese: {}
            };
            $("#quanlytin tbody tr").each(function() {
                var key = $(".key", $(this)).text();
                var vietnamese = $(".vietnamese", $(this)).val();
                var english = $(".english", $(this)).val();
                var japanese = $(".japanese", $(this)).val();
                data['vietnamese'][key] = vietnamese;
                data['english'][key] = english;
                data['japanese'][key] = japanese;
            });
            //            console.log(data);
            //           return false;
            $.ajax({
                url: path + "admin/savelanguage",
                type: "POST",
                dataType: "JSON",
                data: {
                    data: JSON.stringify(data)
                },
                success: function(res) {
                    location.reload();
                }
            })
        })
    });
</script>
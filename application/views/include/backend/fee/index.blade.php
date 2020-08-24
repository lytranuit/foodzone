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
                @if(!empty($areas))
                <div class="dd" id="nestable2">
                    <ol class="dd-list ui-sortable" id="nestable">
                        @foreach($areas as $row)
                        <li class="dd-item ui-sortable-handle" id="menuItem_{{$row['id']}}" data-id="{{$row['id']}}">
                            <div class="dd-handle">
                                <div>{{$row['name']}}</div>
                                <div class="dd-nodrag btn-group ml-auto">
                                    <a class="btn btn-sm btn-outline-light" href="{{base_url()}}fee/edit/{{$row['id']}}">Edit</a>
                                    <a class="btn btn-sm btn-outline-light" href="{{base_url()}}fee/remove/{{$row['id']}}" data-type="confirm" title="Xóa">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </div>
                            </div>
                            <ol class="dd-list">
                                @foreach($row['child'] as $row1)
                                <li class="dd-item ui-sortable-handle" id="menuItem_{{$row1['id']}}" data-id="{{$row1['id']}}">
                                    <div class="dd-handle">
                                        <div>{{$row1['name']}}</div>
                                        <div class="dd-nodrag btn-group ml-auto">
                                            <a class="btn btn-sm btn-outline-light" href="{{base_url()}}fee/edit/{{$row1['id']}}">Edit</a>
                                            <a class="btn btn-sm btn-outline-light" href="{{base_url()}}fee/remove/{{$row1['id']}}" data-type="confirm" title="Xóa">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <ol class="dd-list">

                                    </ol>
                                </li>
                                @endforeach
                            </ol>
                        </li>
                        @endforeach
                    </ol>
                </div>
                @endif
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
            maxLevels: 2,
            placeholder: 'dd-placeholder',
            update: function(event, ui) {
                var arraied = $('#nestable').nestedSortable('toArray', {
                    excludeRoot: true
                });

                $.ajax({
                    type: "POST",
                    data: {
                        data: JSON.stringify(arraied)
                    },
                    url: path + "fee/saveorderarea",
                    success: function(msg) {
                        alert("Success!");
                    }
                })
            }
        });
    });
</script>
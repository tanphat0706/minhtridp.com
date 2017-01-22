@extends('backend.master')
@section('title', 'Yêu cầu báo giá')
@section('page_title') Yêu cầu báo giá
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header"></div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="categorylist" class="table table-condensed display responsive nowrap" cellspacing="0" width="100%" >
                        <thead style="color: blue;">
                        <tr>
                            <th>Mã ĐH</th>
                            <th>Khách hàng</th>
                            <th width="200px">Đơn hàng</th>
                            <th>Tình trạng</th>
                            <th>Kết quả</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                            <th>#</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    {{--@include('partial.confirm', ['body' => trans('category.confirm_delete')])--}}
@endsection

@section('js')
    $(function() {
    $('#categorylist').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ route("json-order-list") }}',
    columns: [
    {data: 'order_code', name: 'order_feedback.order_code'},
    {data: 'customer', name: 'users.name'},
    {data: 'content', name: 'order_feedback.content'},
    {data: 'status', name: 'order_feedback.status'},
    {data: 'result', name: 'order_feedback.result', className: 'text-center'},
    {data: 'created_at', name: 'order_feedback.created_at'},
    {data: 'updated_at', name: 'order_feedback.updated_at'},
    {data: 'action', name: 'action', orderable: false, searchable:false} ],

    initComplete: function () {
    this.api().columns().every(function () {
    var column = this;
    var input = document.createElement("input");
    $(input).appendTo($(column.footer()).empty()) .on('change', function ()
    { column.search($(this).val(), false, false, true).draw(); }); }); } });
    });

@endsection

@extends('backend.master')
@section('title', trans('user.list'))
@section('page_title') {{ trans('user.list') }}
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header"></div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="userslist" class="table table-condensed display responsive nowrap" cellspacing="0" width="100%" >
                    <thead style="color: blue;">
                        <tr>
                            <th>{{ trans('user.name') }}</th>
                            <th>{{ trans('user.email') }}</th>
                            <th>{{ trans('user.is_customer') }}</th>
                            <th>{{ trans('user.status') }}</th>
                            <th>{{ trans('user.created_at') }}</th>
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

<div class="box-footer">
    <button type="button" onclick="window.location='{{ route("create-user") }}'" class="btn btn-primary"><i class="fa fa-plus-circle"></i> {{ trans('user.add')}}</button>
</div>


    @include('partial.confirm', ['body' => trans('user.confirm_delete')])
@endsection

@section('js')
$(function() {
$('#userslist').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ route("json-users-list") }}',
    columns: [
        {data: 'userName', name: 'users.name'},
        {data: 'email', name: 'users.email'},
        {data: 'is_customer', name: 'is_customer', className: 'text-center'},
        {data: 'status', name: 'status', className: 'text-center'},
        {data: 'created_at', name: 'users.created_at'},
        {data: 'action', name: 'action', orderable: false, searchable:false} ],

     initComplete: function () {
        this.api().columns().every(function () {
        var column = this;
        var input = document.createElement("input");
        $(input).appendTo($(column.footer()).empty()) .on('change', function ()
        { column.search($(this).val(), false, false, true).draw(); }); }); } });
});


function confirmDelete(formId)
{
    bootbox.confirm( '{{ trans('user.confirm_delete') }}', function(result) {
        if(result == true){
           $('#'+formId).submit();
        }
    });
}

@endsection

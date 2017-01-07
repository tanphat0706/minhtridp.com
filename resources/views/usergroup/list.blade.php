@extends('backend.master')
@section('title', trans('user_group.list'))
@section('page_title') {{ trans('user_group.list') }}
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header"></div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="userGroupslist" class="table table-condensed">
                    <thead style="color: blue;">
                        <tr>
                            <th>{{ trans('user_group.name') }}</th>
                            <th>{{ trans('user_group.note') }}</th>
                            <th>{{ trans('user_group.created_at') }}</th>
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
    <button type="button" onclick="window.location='{{ route("create-user-group") }}'" class="btn btn-primary">{{ trans('user_group.add')}}</button>
</div>

    @include('partial.confirm', ['body' => trans('user_group.confirm_delete')])
@endsection

@section('js')
$(function() {
$('#userGroupslist').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ url("admin/user-group/getUserGroupsJson") }}',
    columns: [
        {data: 'name', name: 'users_groups.name'},
        {data: 'note', name: 'users_groups.note'},
        {data: 'created_at', name: 'users_groups.created_at'},
        {data: 'action', name: 'action', orderable: false, searchable:false} ],

     initComplete: function () {
        this.api().columns().every(function () {
        var column = this;
        var input = document.createElement("input");
        $(input).appendTo($(column.footer()).empty()) .on('change', function ()
        { column.search($(this).val(), false, false, true).draw(); }); }); } });
});

function confirmDelete(url)
{
    var id = $(url).attr('href').substring(1);
    $('#yes-button').attr('onclick', 'deleteUserGroup('+id+')');
    $('#confirm-modal').modal();
}
function deleteUserGroup(id)
{
    $.ajax({
        url: '{!! url('admin/user-group/delete') !!}' + '/' + id,
        type: 'POST',
        dataType: 'JSON',
        data: {id: id, _token: '{!! csrf_token() !!}'},
        beforeSend: function() {
            $('#modal-confirm-loading').show();
        },
        success: function(data) {
             window.location.href = data.url;
             $('#modal-confirm-loading').hide();
             $('#close-confirm').click();
        },
        error: function(data) {
             $('#modal-confirm-loading').hide();
             $('#close-confirm').click();
        }
    });
}
@endsection

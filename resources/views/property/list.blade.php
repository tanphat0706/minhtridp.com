@extends('backend.master')
@section('title', trans('property.list'))
@section('page_title') {{ trans('property.list') }}
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header"></div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="propertylist" class="table table-condensed display responsive nowrap" cellspacing="0" width="100%" >
                        <thead style="color: blue;">
                        <tr>
                            <th>{{ trans('property.name') }}</th>
                            <th>{{ trans('property.description') }}</th>
                            <th>{{ trans('property.updated_at') }}</th>
                            <th>{{ trans('property.created_at') }}</th>
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
        <button type="button" onclick="window.location='{{ route("property-create") }}'" class="btn btn-primary"><i class="fa fa-plus-circle"></i> {{ trans('property.add')}}</button>
    </div>


    @include('partial.confirm', ['body' => trans('property.confirm_delete')])
@endsection

@section('js')
    $(function() {
    $('#propertylist').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ route("json-property-list") }}',
    columns: [
    {data: 'name', name: 'name'},
    {data: 'description', name: 'description'},
    {data: 'created_at', name: 'created_at'},
    {data: 'updated_at', name: 'updated_at'},
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
    bootbox.confirm( '{{ trans('property.confirm_delete') }}', function(result) {
    if(result == true){
    $('#'+formId).submit();
    }
    });
    }

@endsection

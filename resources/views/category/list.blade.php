@extends('backend.master')
@section('title', trans('category.list'))
@section('page_title') {{ trans('category.list') }}
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
                            <th>{{ trans('category.name') }}</th>
                            {{--<th>{{ trans('category.image_url') }}</th>--}}
                            <th style="width:450px;">{{ trans('category.description') }}</th>
                            <th>{{ trans('category.status') }}</th>
                            <th>{{ trans('category.created_at') }}</th>
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
        <button type="button" onclick="window.location='{{ route("category-create") }}'" class="btn btn-primary"><i class="fa fa-plus-circle"></i> {{ trans('category.add')}}</button>
    </div>


    @include('partial.confirm', ['body' => trans('category.confirm_delete')])
@endsection

@section('js')
    $(function() {
    $('#categorylist').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ route("json-categories-list") }}',
    columns: [
    {data: 'name', name: 'categories.name'},
    {{--{data: 'image_url', name: 'categories.image_url'},--}}
    {data: 'description', name: 'categories.description'},
    {data: 'status', name: 'categories.status', className: 'text-center'},
    {data: 'created_at', name: 'categories.created_at'},
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
    bootbox.confirm( '{{ trans('category.confirm_delete') }}', function(result) {
    if(result == true){
    $('#'+formId).submit();
    }
    });
    }

@endsection

@extends('backend.master')
@section('title', trans('carousel.list'))
@section('page_title') {{ trans('carousel.list') }}
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header"></div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="carousellist" class="table table-condensed display responsive nowrap" cellspacing="0" width="100%" >
                        <thead style="color: blue;">
                        <tr>
                            <th>{{ trans('carousel.title') }}</th>
                            {{--<th>{{ trans('category.image_url') }}</th>--}}
                            <th style="width:450px;">{{ trans('carousel.description') }}</th>
                            <th>{{ trans('carousel.status') }}</th>
                            <th>{{ trans('carousel.created_at') }}</th>
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
        <button type="button" onclick="window.location='{{ route("carousel-create") }}'" class="btn btn-primary"><i class="fa fa-plus-circle"></i> {{ trans('carousel.add')}}</button>
    </div>


    @include('partial.confirm', ['body' => trans('carousel.confirm_delete')])
@endsection

@section('js')
    $(function() {
    $('#carousellist').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{{ route("json-carousel-list") }}',
    columns: [
    {data: 'title', name: 'carousel.title'},
    {{--{data: 'image_url', name: 'categories.image_url'},--}}
    {data: 'description', name: 'carousel.description'},
    {data: 'status', name: 'carousel.status', className: 'text-center'},
    {data: 'created_at', name: 'carousel.created_at'},
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
    bootbox.confirm( '{{ trans('carousel.confirm_delete') }}', function(result) {
    if(result == true){
    $('#'+formId).submit();
    }
    });
    }

@endsection

@extends('backend.master')
@section('title', trans('property.add'))
@section('page_title') {{ trans('property.add') }}
@stop

@section('content')
    <!-- left column -->
    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        {!! Form::open(['route'=>['property-store'], 'method'=> 'POST']) !!}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">{{ trans('property.name') }}</label>
                        <span class="required">*</span>
                        {!!Form::text('name', null , array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>

                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">{{ trans('property.description') }}</label>
                        {!!Form::text('description', null , array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>
                </div>
                <!-- /.col -->
            </div>

            <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus-circle"></i> {{trans('system.finish')}}</button>
            </div>

        </div>
        <!-- /.box -->
        {!! Form::close() !!}
    </div>

    <!-- /.row -->
@endsection
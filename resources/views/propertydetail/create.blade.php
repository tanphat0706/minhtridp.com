@extends('backend.master')
@section('title', trans('propertydetail.add'))
@section('page_title') {{ trans('propertydetail.add') }}
@stop

@section('content')
    <!-- left column -->
    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        {!! Form::open(['route'=>['propertydetail-store'], 'method'=> 'POST']) !!}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">{{ trans('propertydetail.name') }}</label>
                        <span class="required">*</span>
                        {!!Form::text('name', null , array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">{{ trans('propertydetail.description') }}</label>
                        {!!Form::text('description', null , array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="property_id">{{ trans('propertydetail.property') }}</label>
                        <span class="required">*</span>
                        {!!Form::select('property_id', $property, null, ['class' =>'form-control' ]) !!}
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
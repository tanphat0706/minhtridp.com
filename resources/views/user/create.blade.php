@extends('backend.master')
@section('title', trans('user.add'))
@section('page_title') {{ trans('user.add') }}
@stop

@section('content')
    <!-- left column -->
    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        {!! Form::open(['route'=>['store-user'], 'method'=> 'POST']) !!}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">{{ trans('user.name') }}</label>
                        <span class="required">*</span>
                        {!!Form::text('name', null , array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">{{ trans('user.email') }}</label>
                        <span class="required">*</span>
                        {!!Form::text('email', null , array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">{{ trans('user.password') }}</label>
                        <span class="required">*</span>
                        {!!Form::password('password', array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">{{ trans('user.password_confirmation') }}</label>
                        <span class="required">*</span>
                        {!!Form::password('password_confirmation', array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {!! Form::label('status', trans('user.status'), ['class' => 'control-label']) !!}
                        {!! Form::select('status', $listStatus, null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user_group">{{ trans('user.user_group') }}</label>
                        <span class="required">*</span>
                        {!!Form::select('user_group', $userGroup, null, ['class' =>'form-control' ]) !!}
                    </div>
                </div>
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
@section('js')
    $( ".select2" ).select2();
@endsection
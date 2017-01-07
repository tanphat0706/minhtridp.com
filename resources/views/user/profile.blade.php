@extends('backend.master')
@section('title', trans('user.profile'))
@section('page_title') {{ trans('user.profile') }}
@stop
@section('content')
    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        {!! Form::open(['route'=>['update-profile'], 'method'=> 'POST'])
        !!}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">{{ trans('user.name') }}</label>
                        <span class="required">*</span>
                        {!!Form::text('name', $user->name, array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">{{ trans('user.email') }}</label>
                        <span class="required">*</span>
                        {!!Form::text('email', $user->email, array('class' => 'form-control formwidth', 'autocomplete' => 'off', 'disabled' => 'disabled')) !!}
                    </div>

                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">{{ trans('user.old_password') }}</label>
                        <span class="required">*</span>
                        {!!Form::password('old_password', array('class' =>'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">{{ trans('user.password') }}</label>
                        <span class="required">*</span>
                        {!!Form::password('password', array('class' =>'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">{{
                            trans('user.password_confirmation') }}</label>
                        <span class="required">*</span>
                        {!! Form::password('password_confirmation', array('class' => 'form-control formwidth', 'autocomplete' => 'off' )) !!}
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- /.row -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">{{trans('system.finish') }}</button>
            </div>

        </div>
        <!-- /.box -->
        {!! Form::close() !!}
    </div>
    <!-- /.row -->

    @endsection
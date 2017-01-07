@extends('backend.master')
    @section('title', trans('user.edit'))
    @section('page_title') {{ trans('user.edit') }}
@stop
@section('content')
    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        {!! Form::open(['route'=>['update-user', $user->id], 'method'=> 'POST']) !!}
        {!! Form::hidden('is_customer', $user->isCustomer()) !!}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">{{ trans('user.name') }}</label>
                        <span class="required">*</span>
                        {!!Form::text('name', $user->name , array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">{{ trans('user.email') }}</label>
                        <span class="required">*</span>
                        {!!Form::text('email', $user->email , array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">{{ trans('user.password') }}</label>
                        {!!Form::password('password', array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">{{ trans('user.password_confirmation') }}</label>
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
                        {!! Form::select('status', $listStatus, $user->status, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="user_group">{{ trans('user.user_group') }}</label>
                        <span class="required">*</span>
                        {!!Form::select('user_group', $userGroup, $user->group_id, ['class' =>'form-control' ]) !!}
                    </div>
                </div>

                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i class="fa-download fa"></i> {{trans('system.finish') }}</button>
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
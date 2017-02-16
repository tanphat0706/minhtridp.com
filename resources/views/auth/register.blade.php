@extends('frontend.template')
@section('title', 'Tài khoản | Minh Trí DP')

@section('content')
    <div class="container hidden-xs breadcrumb no-padding">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb no-margins hidden-xs">
                    <li>
                        <a href="#"><i class="fa fa-home"></i>
                            <span class="ng-hide">Trang chủ</span>
                        </a>
                    </li>
                    <li>
                        <a href="/booklets">
                            <span>Liên hệ</span>
                        </a>
                    </li>
                </ol>

                <ol class="breadcrumb no-margins visible-xs">
                    <li><a href="#"><i class="fa icon-angle-left"></i></a></li>
                    <li>
                        Liên hệ
                    </li>
                </ol>

            </div>
        </div>
    </div>
    <div class="container" id="account">
        <div class="row">
            <div class="col-md-6 col-xs-12">
                <div class="register panel panel-default">
                    <h2 style="text-align: center">Đăng ký tài khoản</h2>
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ url('/register') }}">
                            {{ csrf_field() }}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Name<span class="required">*</span></label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong class="has-error">{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail Address<span class="required">*</span></label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong class="has-error">{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                            </div>
                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                <label for="phone" class="col-md-4 control-label">Phone<span class="required">*</span></label>
                                    <input id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}">
                                    @if ($errors->has('phone'))
                                        <span class="help-block">
                                        <strong class="has-error">{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Password<span class="required">*</span></label>
                                    <input id="password" type="password" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong class="has-error">{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                            </div>

                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                <label for="password-confirm" class="col-md-4 control-label">Confirm Password<span class="required">*</span></label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                                    @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                        <strong class="has-error">{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 no-padding">
                                    <label for="password-confirm" class="col-md-4 control-label"><span class="required">*</span> Bắt buộc</label>
                                </div>
                                <div class="col-md-6 no-padding">
                                    <button type="submit" class="col-md-12 btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i> Register
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="login panel panel-default">
                    <h2 style="text-align: center">Đăng nhập</h2>
                    <div class="panel-body">
                        @if ($errors->has('l_email'))
                            <span class="help-block">
                                        <strong class="has-error">{{ $errors->first('l_email') }}</strong>
                                    </span>
                        @endif
                            @if ($errors->has('l_password'))
                                <span class="help-block">
                                        <strong class="has-error">{{ $errors->first('l_password') }}</strong>
                                    </span>
                            @endif
                            {{ Form::open(array('route' => 'login', 'method' => 'POST', 'class' => 'form-vertical' )) }}
                            <div class="form-group{{ $errors->has('l_email') ? ' has-error' : '' }}">
                                <label for="l_email" class="col-md-4 control-label">Email</label>
                                {!!Form::email('l_email', old('l_email') , array('class' => 'form-control', 'placeholder' => 'Email')) !!}
                            </div>
                            <div class="form-group{{ $errors->has('l_email') ? ' has-error' : '' }}">
                                <label for="l_password class="col-md-4 control-label">Password</label>
                                {!!Form::password('l_password', array('class' => 'form-control', 'placeholder' => 'Password')) !!}
                            </div>
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="checkbox icheck">
                                        <label>
                                            <input type="checkbox" name="remember"> {{ trans('auth.remember_me') }}
                                        </label>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-xs-4">
                                    <button type="submit" class="col-md-12 btn btn-primary btn-block btn-flat">{{trans('auth.login') }}</button>
                                </div>
                                <!-- /.col -->
                            </div>
                            {{ Form::close() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

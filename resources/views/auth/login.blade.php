<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>{{ trans('system.app_name') }} | Log in</title>
<!-- Tell the browser to be responsive to screen width -->
<meta
    content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"
    name="viewport">
<!-- Bootstrap 3.3.4 -->
{!! Html::style('css/bootstrap/css/bootstrap.min.css') !!}
<!-- Font Awesome Icons -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
{!! Html::style('dist/css/AdminLTE.min.css') !!}
<!-- iCheck -->
{!! Html::style('plugins/iCheck/square/blue.css') !!}


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="login-page">
    <div class="login-box">
        <div class="login-logo">
            <b style="color: #000;"> {{ trans('system.app_name') }} | {{ trans('auth.login') }}</b>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                {{ trans('auth.login_error') }}<br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {{ Form::open(array('route' => 'login', 'method' => 'POST', 'class' => 'form-vertical' )) }}
                <div class="form-group has-feedback">
                    {!!Form::email('email', old('email') , array('class' => 'form-control', 'placeholder' => 'Email')) !!}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    {!!Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) !!}
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
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
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{trans('auth.login') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
            {{ Form::close() }}

                     <a href="{{ url('admin/password/reset') }}">{{ trans('auth.forget_password') }}</a><br>

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    {!! Html::script('plugins/jQuery/jQuery-2.1.4.min.js') !!}

    <!-- Bootstrap 3.3.2 JS -->
    {!! Html::script('css/bootstrap/js/bootstrap.min.js') !!}
    <!-- iCheck -->
    {!! Html::script('plugins/iCheck/icheck.min.js') !!}
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
</body>
</html>
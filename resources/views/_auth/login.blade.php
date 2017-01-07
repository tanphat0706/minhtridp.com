<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Let's Join With Us</title>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="{{asset('css/normalize.css')}}">


    <link rel="stylesheet" href="{{asset('css/style_auth.css')}}">




</head>

<body>

<div class="form">

    <ul class="tab-group">
        <li class="tab active"><a href="#login">{{trans('auth.signin')}}</a></li>
        <li class="tab"><a href="#signup">{{trans('auth.signup')}}</a></li>

    </ul>

    <div class="tab-content">
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
        <div id="login">
            <h1>Welcome Back!</h1>

            {{ Form::open(array('route' => 'login', 'method' => 'POST' )) }}
            <div class="field-wrap">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    {!!Form::email('email', old('email')) !!}
                    {{--<input type="email"required autocomplete="off"/>--}}
                </div>

                <div class="field-wrap">
                    <label>
                        Password<span class="req">*</span>
                    </label>
                    {!!Form::password('password') !!}
                    {{--<input type="password"required autocomplete="off"/>--}}
                </div>

                <p class="forgot"><a href="#">Forgot Password?</a></p>

                <button class="button button-block"/>{{trans('auth.signin')}}</button>

            </form>

        </div>
        <div id="signup">
            <h1>Sign Up for Free</h1>

            <form action="/" method="post">


                    <div class="field-wrap">
                        <label>
                            Full Name<span class="req">*</span>
                        </label>
                        <input type="text"required autocomplete="off"/>
                    </div>


                <div class="field-wrap">
                    <label>
                        Email Address<span class="req">*</span>
                    </label>
                    <input type="email"required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Set A Password<span class="req">*</span>
                    </label>
                    <input type="password"required autocomplete="off"/>
                </div>

                <div class="field-wrap">
                    <label>
                        Confirm Password<span class="req">*</span>
                    </label>
                    <input type="password"required autocomplete="off"/>
                </div>
                <button type="submit" class="button button-block"/>Get Started</button>

            </form>

        </div>



    </div><!-- tab-content -->

</div> <!-- /form -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="{{asset('js/index.js')}}"></script>




</body>
</html>
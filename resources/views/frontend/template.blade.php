<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', '')</title>
    <link href="{{asset('css/instant.css')}}" rel="stylesheet">
    <link href="{{asset('css/style-frontend.css')}}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,500,500italic,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Fira+Sans:400,400italic,500,500italic,700' rel='stylesheet'
          type='text/css'>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    {{--<script src="{{asset('js/jquery.mobile-1.4.5.min.js')}}"></script>--}}
    <script src="{{asset('css/bootstrap/js/bootstrap.min.js')}}"></script>
</head>

<body>

    {{--HEADER--}}
    @include('frontend/header')
    {{--CONTENT--}}
    <div id="sitewrapper">
        <div id="ReassurancePoints" class="hidden-xs">
            <div class="container">

                    <div class="col-lg-12 text-center top-info">
                        <div class="row">
                            <div class="col-sm-6 col-md-4 reassurance-col">
                                <img src="{{asset('images/star.png')}}">
                                <span>Thiết kế & In ấn Chuyên nghiệp</span>
                            </div>
                            <div class="col-sm-6 col-md-4 reassurance-col last-col">
                                <img src="{{asset('images/clock-2.png')}}">
                                <span>Đặt hàng & nhận hàng sau 2 đến 3 ngày</span>
                            </div>
                            <div class="hidden-sm col-md-4 reassurance-col middle-col">
                                <img src="{{asset('images/delivery.png')}}">
                                <span>Dịch vụ giao hàng tận nơi</span>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="container">
            @if (\Session::has('error'))
                <div class="alert alert-danger fadeOut">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ \Session::get('error') }}
                </div>
            @endif
            @if (\Session::has('message'))
                <div class="alert alert-info fadeOut">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                     {{ \Session::get('message') }}
                </div>
            @endif
        </div>
        @yield('content')
    </div>

    {{--FOOTER--}}
    @include('frontend/footer')
    {!! Html::script('js/jquery.number.js') !!}
    <script src='//cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
</body>

</html>
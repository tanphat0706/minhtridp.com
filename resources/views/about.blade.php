@extends('frontend.template')
@section('title', 'Giới thiệu | Minh Trí DP')

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
                            <span>Giới thiệu</span>
                        </a>
                    </li>
                </ol>

                <ol class="breadcrumb no-margins visible-xs">
                    <li><a href="#"><i class="fa icon-angle-left"></i></a></li>
                    <li>
                        Giới thiệu
                    </li>
                </ol>

            </div>
        </div>
    </div>
    <div id="about" class="container no-padding">
        <div class="col-md-12">
                <img class="img-responsive" src="{{asset('images/about.png')}}">
                <h1>Về Minh Trí DP</h1>
                <p>Đang cập nhật...</p>
            </div>
    </div>
    <div class="container-fluid" style="background: #f3f3f3;">
        <div class="container no-padding">
            <div class="home-offers-carousel home-last-widget">
                <div class="container">
                    <div class="item active">
                        <div class="row products">
                            <div class="brand-colour col-md-4 col-sm-6 col-xs-12">
                                <div class="product-cont">
                                    <div class="bg">
                                        <div class="details">
                                            <div class="product-title col-xs-12 brand-text">Why print with us</div>
                                            <div class="product-title-mini col-xs-12">
                                                Đang cập nhật...
                                            </div>
                                            <div class="info"><p>
                                                    Đang cập nhật...
                                                </p></div>
                                        </div>
                                        <img src="http://placehold.it/360x250">
                                    </div>
                                </div>
                            </div>

                            <div class="brand-colour col-md-4 col-sm-6 col-xs-12">
                                <div class="product-cont">
                                    <div class="bg">
                                        <div class="details">
                                            <div class="product-title col-xs-12 brand-text">Quanlity</div>
                                            <div class="product-title-mini col-xs-12">
                                                Đang cập nhật...
                                            </div>
                                            <div class="info"><p>
                                                    Đang cập nhật...
                                                </p></div>
                                        </div>
                                        <img src="http://placehold.it/360x250">
                                    </div>
                                </div>
                            </div>

                            <div class="brand-colour col-md-4 col-sm-6 col-xs-12">
                                <div class="product-cont">
                                    <div class="bg">
                                        <img src="http://placehold.it/360x250">
                                        <div class="details">
                                            <div class="product-title col-xs-12 brand-text">Say hello</div>
                                            <div class="product-title-mini col-xs-12">
                                                Đang cập nhật...
                                            </div>
                                            <div class="info"><p>
                                                    Đang cập nhật...
                                                </p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- end ngRepeat: list in featuredProductList -->
                </div>
            </div>
        </div>
    </div>

@endsection
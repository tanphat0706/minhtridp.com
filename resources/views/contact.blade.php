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
    <div id="contact" class="container no-padding">
        <div class="col-md-12">
                <img class="img-responsive" src="{{asset('images/contact.png')}}">
                <h1>Hãy liên hệ với Minh Trí DP</h1>
                <p>Đang cập nhật...</p>
            </div>
    </div>
    <div class="container-fluid" style="background: #f3f3f3;">
        <div class="container no-padding">
            <div class="home-offers-carousel home-last-widget">
                <div class="container">
                    <div class="item active">
                        <div class="row products">
                            <div class="brand-colour col-md-7 col-sm-6 col-xs-12">
                                <div class="product-cont">
                                    <div class="bg">
                                        <div class="details">
                                            <div class="product-title col-xs-12 brand-text">CTY TNHH MTV Thiết Kế In Ấn Quảng Cáo Minh Trí </div>
                                            <div class="product-title-mini col-xs-12">
                                                Giờ làm việc:
                                            </div>
                                            <div class="info">
                                                Thứ hai – Thứ bảy: 08:00 – 18:00
                                                <p></p>
                                                Chủ nhật: 09:00-13:00
                                            </div>
                                            <div class="product-title-mini col-xs-12">
                                                Văn phòng: 208 Lý Thái Tổ, Phường 1, Quận 3, TP.Hồ Chí Minh
                                            </div>
                                        </div>
                                        <img src="http://placehold.it/650x450?text=map650x450">
                                    </div>
                                </div>
                            </div>

                            <div class="brand-colour col-md-5 col-sm-6 col-xs-12">
                                <div class="product-cont">
                                    <div class="bg">
                                        <div class="details">
                                            <div class="product-title col-xs-12 brand-text">Thông tin liên hệ</div>
                                            <div class="info useful">
                                                <p><span class="product-title-mini">Bộ phận kinh doanh | </span><a
                                                            href="#">sales@minhtridp.com</a><br>
                                                    Để giải đáp những thắc mắc về đơn hàng hoặc yêu cầu báo giá, Quý khách vui lòng liên hệ bộ phận kinh doanh thông qua email trên.
                                                </p>
                                                <p><span class="product-title-mini">Bộ phận thiết kế |</span><br>
                                                    Đang cập nhật...
                                                </p>
                                                <p><span class="product-title-mini">Chăm sóc khách hàng | </span><a
                                                            href="#">minhtridp@gmail.com</a><br>
                                                    Đang cập nhật...
                                                </p>
                                            </div>
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
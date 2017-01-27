@extends('frontend.template')
@section('title', trans('system.home'))
@section('content')
    <div id="home-page" ng-controller="InstantPrint.HomePageController" class="ng-scope">
        <div class="home-slider hero-unit">
            <div class="container-fluid no-padding">
                @include('frontend/carousel')
            </div>
        </div>
        <div class="home-offers-carousel ng-scope" ng-controller="InstantPrint.FeaturedProductsController"
             ng-init="init()" id="featured-products-section">
            <div class="container">
                <div class="pc-display spnoibat"><span>Sản phẩm nổi bật</span></div>
                <div class="sp-display col-lg-12 text-center">
                    <div class="row lined">
                        <span>Popular Products</span>
                    </div>
                </div>
                <!-- ngRepeat: list in featuredProductList -->
                <div class="item ng-scope active">
                    <div class="row products">
                        <!-- ngRepeat: item in list -->
                        @foreach($cates as $cate)
                            <div ng-repeat="item in list"
                                 class="brand-colour col-md-3 col-sm-6 col-xs-12 ng-scope">
                                {{--<div class="product-title col-xs-12 brand-text ng-binding">{{$cate->name}}</div>--}}
                                <div class="product-cont">
                                    <div class="bg">
                                        <a title="Booklets" href="#booklets/">
                                            <img alt="{{$cate->name}}"
                                                 src="{{asset('images/category_img/thumbnail/' . $cate->thumbs_img)}}">
                                        </a>

                                        <div class="details">
                                            <div class="product-title col-xs-12 brand-text ng-binding">{{$cate->name}}</div>
                                            <div class="info ng-binding"><p><?php echo $cate->home_description ?></p>
                                            </div>
                                            <div class="btn btn-primary-dark-grey">
                                                <a href="#booklets/">{{$cate->name}}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end ngRepeat: item in list -->
                        @endforeach
                    </div>
                </div><!-- end ngRepeat: list in featuredProductList -->
            </div>
        </div>

        <div class="company-info">
            <div class="container">
                <div class="row ">
                    <div class="col-sm-6 col-xs-12">
                        <div class="header">
                            <h1 class="content-header">We're instantprint.&nbsp;</h1>
                        </div>
                        <div class="text">
                            <p class="intro">The online print company that specialises in 24 hour flyer &amp; leaflets,
                                business cards, posters, and stationery printing.</p>
                            <p class="intro">Our ambition is to deliver the best through technology, innovation and
                                development to ensure faster turnaround times, sharper pricing and a service that's
                                worth talking about. So next time you need print, think instant print.<br><br><strong>You
                                    do the business.<span class="sub-header"
                                                          style="color: #5f9f3b;"> We do the print.</span></strong></p>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="selling-points">
                            <div class="row">
                                <div class="col-md-6 col-sm-12 col-xs-6">
                                    <a href="#delivery-and-turnaround">
                                        <div class="sell">
                                            <div class="col-xs-12">
                                                <img class="img-responsive"
                                                     src="./images/dispatch.png"
                                                     alt="Alternate Text">
                                                <div class="col-md-12">
                                                    <p class="point text-center">24hr dispatch as standard</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-6">
                                    <a href="#delivery-and-turnaround">
                                        <div class="sell">
                                            <div class="col-xs-12">
                                                <img class="img-responsive"
                                                     src="./images/1hr-delivery.png"
                                                     alt="Alternate Text">
                                                <div class="col-md-12">
                                                    <p class="point text-center">1 hour trackable delivery slot</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-6">
                                    <a href="#artwork-and-design">
                                        <div class="sell">
                                            <div class="col-xs-12">
                                                <img class="img-responsive"
                                                     src="./images/proofing.png"
                                                     alt="Alternate Text">

                                                <div class="col-md-12">
                                                    <p class="point text-center">The only 3 minute proofing tool</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-md-6 col-sm-12 col-xs-6">
                                    <a href="#artwork-and-design">
                                        <div class="sell">
                                            <div class="col-xs-12">
                                                <img class="img-responsive"
                                                     src="./images/artwork-check.png"
                                                     alt="Alternate Text">
                                                <div class="col-md-12">
                                                    <p class="point text-center">Free artwork check on request</p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid no-padding">
            <div class="convincing-container">
                <div class="container no-padding">
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12 convincing-content text-center">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <h2>
                                                Still need convincing?
                                            </h2>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="row">
                                            Why not order one of our free sample packs and take a look for yourself
                                            #enjoytheprint
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-xs-12">
                                        <div class="row">
                                            <a href="#sample-products" class="btn btn-primary btn-lg ">Request a free
                                                sample pack</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="home-offers-carousel home-last-widget">
            <div class="container">
                <!-- ngRepeat: list in featuredProductList -->
                <div class="item ng-scope active">
                    <div class="row products">
                        <!-- ngRepeat: item in list -->

                        <div ng-repeat="item in list"
                             class="brand-colour col-md-3 col-sm-6 col-xs-12">
                            <div class="product-cont">
                                <div class="bg">
                                    <img alt=""
                                         src="{{asset('images/hello.png')}}">
                                    <div class="details">
                                        <div class="product-title col-xs-12 brand-text">Say hello.</div>
                                        <div class="product-title-mini col-xs-12">Purus, eros diam. Torquent blanditiis
                                            phare
                                        </div>
                                        <div class="info"><p>
                                                Hymenaeos hendrerit egestas, illo, tristique aperiam porta duis iusto
                                                elit? Modi nam, tincidunt rhoncus diam, quam, parturient curabitur
                                                occaecati etiam, pariatur lectus Hymenaeos hendrerit egestas, illo,
                                                tristique aperiam porta duis iusto elit? Modi nam
                                            </p></div>
                                        <div class="btn btn-primary-dark-grey">
                                            <a href="#booklets/">{{$cate->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div ng-repeat="item in list"
                             class="brand-colour col-md-4 col-sm-6 col-xs-12">
                            <div class="product-cont">
                                <div class="bg">
                                    <div class="details">
                                        <div class="product-title col-xs-12 brand-text">Giờ làm việc</div>
                                        <div class="product-title-mini col-xs-12">
                                            Thứ hai – Thứ bảy: 08:00 – 18:00
                                            <p></p>
                                            Chủ nhật: 09:00-13:-00
                                        </div>
                                        <div class="info">
                                            <p>Nhằm tạo thuận lợi cho công việc của Quý khách. Ngoài giờ làm việc, Quý khách vẫn có thểđặt hàng tại website hoặc gửi yêu cầu đến email của chúng tôi. Chúng tôi sẽphản hồi trong thời gian sớm nhất</p>
                                        </div>
                                    </div>
                                    <img alt=""
                                         src="{{asset('images/openhour.png')}}">
                                </div>
                            </div>
                        </div>

                        <div ng-repeat="item in list"
                             class="brand-colour col-md-5 col-sm-6 col-xs-12">
                            <div class="product-cont">
                                <div class="bg">
                                    <div class="details">
                                        <div class="product-title col-xs-12 brand-text">Thông tin liên hệ</div>
                                        <div class="info useful">
                                            <p><span class="product-title-mini">Bộ phận kinh doanh |</span><a
                                                        href="#">sale@minhtridp.com</a><br>
                                                Để giải đáp những thắc mắc về đơn hàng hoặc yêu cầu báo giá, Quý khách vui lòng liên hệ bộphận kinh doanh thông qua email trên.
                                            </p>
                                            <p><span class="product-title-mini">Bộ phận thiết kế |</span><a
                                                        href="#">sale@minhtridp.com</a><br>
                                                Emo excepturi? Iure incidunt incididunt velit culpa minus, at class? Ea
                                                dolores beatae ratione odit, dui orci enim hendrerit veniam ipsa, pede.
                                                Emo excepturi? Iure incidunt incididunt velit culpa minus, at class? Ea
                                                dolores beatae ratione odit, dui orci enim hendrerit veniam ipsa, pede
                                            </p>
                                            <p><span class="product-title-mini">Chăm sóc khách hàng |</span><a
                                                        href="#">sale@minhtridp.com</a><br>
                                                Emo excepturi? Iure incidunt incididunt velit culpa minus, at class? Ea
                                                dolores beatae ratione odit, dui orci enim hendrerit veniam ipsa, pede
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

    <div class="push"></div>
@endsection
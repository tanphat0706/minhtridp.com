@extends('frontend.template')

@section('content')
    <div id="ReassurancePoints" class="hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center top-info">
                    <div class="row">
                        <div class="col-sm-6 col-md-4 reassurance-col">
                            <img src="./images/star.png">
                            <span>Official Trustpilot score: 9.1 - Excellent!</span>
                        </div>
                        <div class="hidden-sm col-md-4 reassurance-col middle-col">
                            <img src="./images/delivery.png">
                            <span>£4.99 delivery, free on orders over £75</span>
                        </div>
                        <div class="col-sm-6 col-md-4 reassurance-col last-col">
                            <img src="./images/clock-2.png">
                            <span>Order &amp; approve by 5pm for next day dispatch</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container hidden-xs breadcrumb no-padding">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb no-margins hidden-xs" itemscope="" itemtype="http://schema.org/BreadcrumbList">
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a href="#" itemprop="item"><i class="fa fa-home"></i>
                            <span itemprop="name" class="ng-hide">Home</span>
                        </a>
                        <meta itemprop="position" content="1">
                    </li>
                    <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
                        <a href="/booklets" itemprop="item">
                            <span itemprop="name">Booklets</span>
                        </a>
                        <meta itemprop="position" content="2">
                    </li>
                </ol>

                <ol class="breadcrumb no-margins visible-xs">
                    <li><a href="#"><i class="fa icon-angle-left"></i></a></li>
                    <li>
                        Booklets
                    </li>
                </ol>

            </div>
        </div>

    </div>
    <div class="container no-padding">
        <div class="container cate-description">
            <div class="col-xs-12 visible-xs">
                <img class="img-responsive" src="#umbraco-media/2968/booklets-2.png">
            </div>
            <div class="col-md-12 banner-content no-margins">
                <h1>Booklet &amp; Brochure Printing</h1>
                <p>Whether you’re looking to create a magazine, catalogue or programme to showcase your products and
                    services, our booklets have got you covered. Printed on a range of sizes and paper options, you
                    don’t have to hold back when making your choice. From durable yet stylish stapled brochures, to
                    perfect bound booklets, which are printed on and finished with nothing but silk paper. For a
                    personal touch, don’t forget our sublime Order of Service Booklets.</p>
            </div>
        </div>
    </div>
    <div class="container cate-list no-padding">
        <div class="col-md-9 products no-padding">
            <div class="row products-row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="product-cont">
                        <div class="bg">
                            <img alt="" class="img-responsive"
                                 src="{{asset('images/category_img/thumbnail/img_flyer_&_leaflet_1469345166-thumbs.jpg')}}">
                            <div class="details">
                                <div class="product-title col-xs-12 brand-text">A6 Flyer & Leaflet</div>
                                <div class="cate-price col-xs-12">from 5$</div>
                                <div class="info"><p>
                                        Hymenaeos hendrerit egestas, illo, tristique aperiam porta duis iusto
                                        elit? Modi nam, tincidunt rhoncus diam, quam, parturient curabitur
                                        occaecati etiam, pariatur lectus Hymenaeos hendrerit egestas
                                    </p></div>
                                <div class="btn btn-primary-dark-grey">
                                    <a href="#booklets/">Buy this product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="product-cont">
                        <div class="bg">
                            <img alt="" class="img-responsive"
                                 src="{{asset('images/category_img/thumbnail/img_flyer_&_leaflet_1469345166-thumbs.jpg')}}">
                            <div class="details">
                                <div class="product-title col-xs-12 brand-text">A6 Flyer & Leaflet</div>
                                <div class="cate-price col-xs-12">from 5$</div>
                                <div class="info"><p>
                                        Hymenaeos hendrerit egestas, illo, tristique aperiam porta duis iusto
                                        elit? Modi nam, tincidunt rhoncus diam, quam, parturient curabitur
                                        occaecati etiam, pariatur lectus Hymenaeos hendrerit egestas
                                    </p></div>
                                <div class="btn btn-primary-dark-grey">
                                    <a href="#booklets/">Buy this product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="product-cont">
                        <div class="bg">
                            <img alt="" class="img-responsive"
                                 src="{{asset('images/category_img/thumbnail/img_flyer_&_leaflet_1469345166-thumbs.jpg')}}">
                            <div class="details">
                                <div class="product-title col-xs-12 brand-text">A6 Flyer & Leaflet</div>
                                <div class="cate-price col-xs-12">from 5$</div>
                                <div class="info"><p>
                                        Hymenaeos hendrerit egestas, illo, tristique aperiam porta duis iusto
                                        elit? Modi nam, tincidunt rhoncus diam, quam, parturient curabitur
                                        occaecati etiam, pariatur lectus Hymenaeos hendrerit egestas
                                    </p></div>
                                <div class="btn btn-primary-dark-grey">
                                    <a href="#booklets/">Buy this product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row products-row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="product-cont">
                        <div class="bg">
                            <img alt="" class="img-responsive"
                                 src="{{asset('images/category_img/thumbnail/img_flyer_&_leaflet_1469345166-thumbs.jpg')}}">
                            <div class="details">
                                <div class="product-title col-xs-12 brand-text">A6 Flyer & Leaflet</div>
                                <div class="cate-price col-xs-12">from 5$</div>
                                <div class="info"><p>
                                        Hymenaeos hendrerit egestas, illo, tristique aperiam porta duis iusto
                                        elit? Modi nam, tincidunt rhoncus diam, quam, parturient curabitur
                                        occaecati etiam, pariatur lectus Hymenaeos hendrerit egestas
                                    </p></div>
                                <div class="btn btn-primary-dark-grey">
                                    <a href="#booklets/">Buy this product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="product-cont">
                        <div class="bg">
                            <img alt="" class="img-responsive"
                                 src="{{asset('images/category_img/thumbnail/img_flyer_&_leaflet_1469345166-thumbs.jpg')}}">
                            <div class="details">
                                <div class="product-title col-xs-12 brand-text">A6 Flyer & Leaflet</div>
                                <div class="cate-price col-xs-12">from 5$</div>
                                <div class="info"><p>
                                        Hymenaeos hendrerit egestas, illo, tristique aperiam porta duis iusto
                                        elit? Modi nam, tincidunt rhoncus diam, quam, parturient curabitur
                                        occaecati etiam, pariatur lectus Hymenaeos hendrerit egestas
                                    </p></div>
                                <div class="btn btn-primary-dark-grey">
                                    <a href="#booklets/">Buy this product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="product-cont">
                        <div class="bg">
                            <img alt="" class="img-responsive"
                                 src="{{asset('images/category_img/thumbnail/img_flyer_&_leaflet_1469345166-thumbs.jpg')}}">
                            <div class="details">
                                <div class="product-title col-xs-12 brand-text">A6 Flyer & Leaflet</div>
                                <div class="cate-price col-xs-12">from 5$</div>
                                <div class="info"><p>
                                        Hymenaeos hendrerit egestas, illo, tristique aperiam porta duis iusto
                                        elit? Modi nam, tincidunt rhoncus diam, quam, parturient curabitur
                                        occaecati etiam, pariatur lectus Hymenaeos hendrerit egestas
                                    </p></div>
                                <div class="btn btn-primary-dark-grey">
                                    <a href="#booklets/">Buy this product</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 banner-right">
            <img class="img-reponsive" src="{{asset('images/banner-right.png')}}" >
        </div>
    </div>

@endsection
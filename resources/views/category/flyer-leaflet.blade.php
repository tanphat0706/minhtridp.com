@extends('frontend.template')
@section('title', trans('category.flyer-leaflet'))

@section('content')
    <div class="container hidden-xs breadcrumb no-padding">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb no-margins hidden-xs">
                    <li>
                        <a href="#"><i class="fa fa-home"></i>
                            <span class="ng-hide">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="/booklets">
                            <span>Booklets</span>
                        </a>
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
    <div class="container">
        <div class="cate-description">
            <div class="col-xs-12 visible-xs">
                <img class="img-responsive" src="#umbraco-media/2968/booklets-2.png">
            </div>
            <div class="col-md-12 banner-content no-margins">
                <h1>Flyers & Leaflets Printing</h1>
                <p>Flyers are the perfect way to stand out from the crowd when promoting your business. Flyers & leaflets are used to help you unlock the market, especially with our wide variety of sizes and styles. There are three silk paper options available; 150gsm economy, 250gsm premium and 350gsm exclusive. You can personalise a flyer by using your own artwork, or tweak one of our templates – there are hundreds to choose from!</p>
            </div>
        </div>
    </div>
    <div class="container cate-list">
        <div class="col-md-9 products no-padding">
            <div class="row products-row">
                @for($i=0; $i<6;$i++)
                    <div class="each-product col-md-4 col-sm-4 col-xs-12">
                        <div class="product-cont">
                            <div class="bg">
                                <a href="{{route('a4-flyer')}}">
                                    <img alt="" class="img-responsive"
                                         src="{{asset('images/category_img/thumbnail/img_flyer_&_leaflet_1469345166-thumbs.jpg')}}">
                                </a>
                                <div class="details">
                                    <a href="{{route('a4-flyer')}}">
                                        <div class="product-title col-xs-12 brand-text">A6 Flyer & Leaflet</div>
                                    </a>
                                    <div class="info"><p>
                                            Hymenaeos hendrerit egestas, illo, tristique aperiam porta duis iusto
                                            elit? Modi nam, tincidunt rhoncus diam, quam, parturient curabitur
                                            occaecati etiam, pariatur lectus Hymenaeos hendrerit egestas
                                        </p></div>
                                    <div class="btn btn-primary-dark-grey">
                                        <a href="{{route('a4-flyer')}}">Xem sản phẩm này</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
        <div class="col-md-3 banner-right">
            <img class="img-reponsive" src="{{asset('images/banner-right.png')}}" >
        </div>
    </div>

@endsection
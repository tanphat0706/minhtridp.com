@extends('frontend.template')
@section('title', trans('category.flyer-leaflet'))

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
                            <span>Tin tức</span>
                        </a>
                    </li>
                </ol>

                <ol class="breadcrumb no-margins visible-xs">
                    <li><a href="#"><i class="fa icon-angle-left"></i></a></li>
                    <li>
                        Tin tức
                    </li>
                </ol>

            </div>
        </div>

    </div>
    <div id="blog" class="container no-padding">
        <div class="col-md-12">
            <img class="img-responsive" src="{{asset('images/blog.png')}}">
            <h1>Những thông tin mới nhất về ngành in tại Minh Trí DP</h1>
        </div>
    </div>

    <div class="container cate-list">
        <div class="col-md-12 products no-padding">
            <div class="row products-row">
                @for($i=1; $i<6;$i++)
                    <div class="each-product col-md-4 col-sm-4 col-xs-12">
                        <div class="product-cont">
                            <div class="bg">
                                <a href="#">
                                    <img alt="" class="img-responsive"
                                         src="{{asset('images/blog'.$i.'.jpg')}}">
                                </a>
                                <div class="details">
                                    <a href="#">
                                        <div class="product-title col-xs-12 brand-text">Tin tức {{$i}}</div>
                                    </a>
                                    <div class="info"><p>
                                            Hymenaeos hendrerit egestas, illo, tristique aperiam porta duis iusto
                                            elit? Modi nam, tincidunt rhoncus diam, quam, parturient curabitur
                                            occaecati etiam, pariatur lectus Hymenaeos hendrerit egestas
                                        </p></div>
                                    <div class="btn btn-primary-dark-grey">
                                        <a href="#">Xem chi tiết</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
@endsection
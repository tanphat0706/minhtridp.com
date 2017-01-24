<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1" class=""></li>
        <li data-target="#myCarousel" data-slide-to="2" class=""></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        {{--*/ $carousel = \Carousel::where('status',1)->orderBy('order_number', 'asc')->get() /*--}}
        {{--*/ $flag = 1 /*--}}
        @foreach($carousel as $item )
            <div class="item {{ $flag==1 ? 'active' : '' }}">
                <div class="container" style="background-color: #91989f">
                    {{--<div class="row">--}}
                        <img class="img-responsive col-sm-12 no-padding"
                             src="{{asset('images/carousel_img/'.$item->img_url)}}"
                             alt="{{$item->title}}">
                    {{--</div>--}}
                    {{--<div class="carousel-caption grey-text">--}}
                        {{--<h2>--}}
                            {{--{{$item->title}}--}}
                        {{--</h2>--}}
                        {{--<hr class="text-center">--}}
                        {{--<h4 class="pc-display">--}}
                            {{--{{$item->description}}--}}
                        {{--</h4>--}}
                        {{--<div class="carousel-buttons">--}}
                            {{--<div class="start-shop white">--}}
                                {{--<a href="#bundles" class="btn btn-primary-white btn-lg">Shop now</a>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                </div>
            </div>
            {{--*/ $flag++ /*--}}
        @endforeach
    </div>
    <div class="control-btn">
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <script type="text/javascript">
//        if (screen.width < 768) {
//            $(document).ready(function() {
//                $("#myCarousel").swiperight(function() {
//                    $(this).carousel('prev');
//                });
//                $("#myCarousel").swipeleft(function() {
//                    $(this).carousel('next');
//                });
//            });
//        }
    </script>
</div>
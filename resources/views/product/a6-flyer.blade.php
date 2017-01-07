@extends('frontend.template')
@section('title', trans('category.a6-flyer-leaflet'))

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
    <div class="container cate-list no-padding">
        <div class="col-md-6">
            <div class="detail-product-img">
                <img class="img-reponsive" src="{{asset('images/products/a6-flyer.png')}}" >
            </div>
            <div class="detail-product-left">

            </div>
        </div>
        <div class="col-md-6">
            <div class="product-info">
                <h1>A6 Flyers & Leaflets</h1>
                <p>A6 flyers and leaflets are a fun, cost effective alternative to the classic A5. The A6 flyer makes the ideal hand-out; whether you’re promoting a club night, fashion pop-up, fitness class or book club.</p>
                <p>Our A6 flyers are printed on high quality silk stock and measure up to the size of a postcard. No matter how you choose to use it, the A6 flyer is sure to bring the charm and make an impact. 5000 flyers is currently our most popular run length and currently on sale so why not bag yourself a bargain.
                </p>
            </div>
            <div class="option-price">
                <style>
                    ul.tab {
                        list-style-type: none;
                        margin: 0;
                        padding: 0;
                        overflow: hidden;
                        background-color: #fff;
                    }

                    /* Float the list items side by side */
                    ul.tab li {float: left;}
                    {
                        color: #353535;
                    }
                    /* Style the links inside the list items */
                    ul.tab li a {
                        display: inline-block;
                        color: #bbb;
                        font-weight: bold;
                        text-align: center;
                        padding: 14px 16px;
                        text-decoration: none;
                        transition: 0.3s;
                        font-size: 17px;
                    }

                    /* Change background color of links on hover */
                    ul.tab li a:hover,ul.tab li a.active{
                        background-color: #f1f1f1;
                        color: #353535;
                    }

                    /* Create an active/current tablink class */
                    ul.tab li a:focus, .active {
                        color: #353535;
                        background-color: #f1f1f1;
                    }

                    /* Style the tab content */
                    .tabcontent {
                        background-color: #f1f1f1;
                        display: none;
                        padding: 6px 12px;
                        -webkit-animation: fadeEffect 1s;
                        animation: fadeEffect 1s;
                    }

                    @-webkit-keyframes fadeEffect {
                        from {opacity: 0;}
                        to {opacity: 1;}
                    }

                    @keyframes fadeEffect {
                        from {opacity: 0;}
                        to {opacity: 1;}
                    }
                </style>
                <body>

                <h3>Select prices</h3>

                <ul class="tab">
                    <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'prices-tab')" id="defaultOpen">Prices</a></li>
                    <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'specs-tab')">Specs</a></li>
                    <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'help-tab')">Help</a></li>
                </ul>

                <div id="prices-tab" class="tabcontent">
                    <h3>Prices</h3>
                    <p>London is the capital city of England.</p>
                </div>

                <div id="specs-tab" class="tabcontent">
                    <h3>Specs</h3>
                    <p>Paris is the capital of France.</p>
                </div>

                <div id="help-tab" class="tabcontent">
                    <h3>Help</h3>
                    <p>Tokyo is the capital of Japan.</p>
                </div>

                <script>
                    document.getElementById("defaultOpen").click();
                    function openCity(evt, cityName) {
                        var i, tabcontent, tablinks;
                        tabcontent = document.getElementsByClassName("tabcontent");
                        for (i = 0; i < tabcontent.length; i++) {
                            tabcontent[i].style.display = "none";
                        }
                        tablinks = document.getElementsByClassName("tablinks");
                        for (i = 0; i < tablinks.length; i++) {
                            tablinks[i].className = tablinks[i].className.replace(" active", "");
                        }
                        document.getElementById(cityName).style.display = "block";
                        evt.currentTarget.className += " active";
                    }
                </script>
            </div>
        </div>
    </div>

@endsection
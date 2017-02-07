@extends('frontend.template')
@section('title', 'Tờ rơi A4 | Minh Trí DP')

@section('content')
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
                            <span>Tờ rơi A4</span>
                        </a>
                    </li>
                </ol>

                <ol class="breadcrumb no-margins visible-xs">
                    <li><a href="#"><i class="fa icon-angle-left"></i></a></li>
                    <li>
                        Tờ rơi A4
                    </li>
                </ol>

            </div>
        </div>

    </div>
    <div class="container cate-list no-padding">
        {!! Form::open(['route'=>['bao-gia'], 'method'=> 'POST', 'class' => 'product-form']) !!}
        <div class="col-md-6">
            <div class="detail-product-img">
                <img class="img-reponsive" src="{{asset('images/products/a6-flyer.png')}}" >
            </div>
            <div class="detail-product-left">
                <div class="product-summary">
                    <h3>Chi Tiết Đơn Hàng</h3>
                    <hr>
                    <p><b style="color: #5f9f3b">Số mặt: </b><b id="option_1"></b></p>
                    <p><b style="color: #5f9f3b">Cán màng: </b><b id="option_2"></b></p>
                    <p><b style="color: #5f9f3b">Số lượng: </b><b id="quantity"></b></p>

                    <br>
                    <p style="max-width: 100%;overflow: hidden"><input class="btn btn-primary-dark-grey" type="submit" value="Yêu cầu báo giá"></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-info">
                <h1>Tờ Rơi A4</h1>
                <p>Đang cập nhật...</p>
                <p>
                </p>
            </div>
            <div class="option-price">

                <h3>Chọn thông tin chi tiết cho đơn hàng</h3>

                <ul class="tab">
                    <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'prices-tab')" id="defaultOpen">Chi tiết</a></li>
                    <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'specs-tab')">Quy cách</a></li>
                    <li><a href="javascript:void(0)" class="tablinks" onclick="openCity(event, 'help-tab')">Hỗ trợ</a></li>
                </ul>

                <div id="prices-tab" class="tabcontent">

                    <input type="hidden" name="product_name" value="A6 Flyers & Leaflets">
                    <div class="row">
                            <div class="col-md-12 product-option-div">
                                <div class="select-style left">
                                    <select name="option1" id="option1">
                                        <option value="1 mặt">1 mặt</option>
                                        <option value="2 mặt">2 mặt</option>
                                    </select>
                                </div>
                                <div class="select-style right">
                                    <select name="option2" id="option2">
                                        <option value="Cán màng mờ">Cán màng mờ</option>
                                        <option value="Cán màng bóng">Cán màng bóng</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h3>Chọn số lượng:</h3>
                            </div>
                            <div class="col-md-12 qty-div">
                                <label class="btn btn-success active">50 cái<input type="radio" checked value="50" name="qty" id="default" class="badgebox"></label>
                                <label class="btn btn-success">100 cái<input type="radio" value="100" name="qty" id="primary" class="badgebox"></label>
                                <label class="btn btn-success">150 cái<input type="radio" value="150" name="qty" id="info" class="badgebox"></label>
                                <label class="btn btn-success">200 cái<input type="radio" value="200" name="qty" id="success" class="badgebox"></label>
                                <label class="btn btn-success">250 cái<input type="radio" value="250" name="qty" id="warning" class="badgebox"></label>
                                <label class="btn btn-success">300 cái<input type="radio" value="300" name="qty" id="danger" class="badgebox"></label>
                                <label class="btn btn-success">350 cái<input type="radio" value="350" name="qty" id="default" class="badgebox"></label>
                                <label class="btn btn-success">400 cái<input type="radio" value="400" name="qty" id="primary" class="badgebox"></label>
                                <label class="btn btn-success">550 cái<input type="radio" value="550" name="qty" id="info" class="badgebox"></label>
                                <label class="btn btn-success">600 cái<input type="radio" value="600" name="qty" id="success" class="badgebox"></label>
                                <label class="btn btn-success">650 cái<input type="radio" value="650" name="qty" id="warning" class="badgebox"></label>
                                <label class="btn btn-success">700 cái<input type="radio" value="700" name="qty" id="danger" class="badgebox"></label>
                                <label class="btn btn-success">750 cái<input type="radio" value="750" name="qty" id="default" class="badgebox"></label>
                                <label class="btn btn-success">800 cái<input type="radio" value="800" name="qty" id="primary" class="badgebox"></label>
                                <label class="btn btn-success">850 cái<input type="radio" value="850" name="qty" id="info" class="badgebox"></label>
                                <label class="btn btn-success">900 cái<input type="radio" value="900" name="qty" id="success" class="badgebox"></label>
                                <label class="btn btn-success">950 cái<input type="radio" value="950" name="qty" id="warning" class="badgebox"></label>
                                <label class="btn btn-success">1000 cái<input type="radio" value="1000" name="qty" id="danger" class="badgebox"></label>
                            </div>

                        </div>
                    </div>

                </div>

                <div id="specs-tab" class="tabcontent">
                    <h3>Quy cách chung</h3>
                    <p>Kích thước: A4 (21 x 29.7 cm) </p>
                    <p>Kỹ thuật in: Offset 4 màu (CMYK) </p>
                    <p>Thành phẩm: Theo yêu cầu</p>
                    <p>Thời gian sản xuất: Từ 1 đến 2 ngày làm việc (*)</p>
                    <p>Thời gian giao hàng: 1 ngày sau khi hoàn thành</p>
                    <p><i>(*): Thời gian sản xuất được tính sau khi duyệt mẫu thiết kế</i></p>
                </div>

                <div id="help-tab" class="tabcontent">
                    <h3>Hỗ trợ</h3>
                    <p>Đang cập nhật...</p>
                </div>

                <script>
                    $(document).ready(function(){
                        $('#option_1').text($('#option1').val());
                        $('#option_2').text($('#option2').val());
                        $("#quantity").text($("input[name='qty']").val()+' cái');
                        $("#option1").change(function(){
                            $('#option1 option').each(function() {
                                if ($(this).is(':selected')){
                                    $('#option_1').text($('#option1').val());
                                }
                            });
                        });
                        $("#option2").change(function(){
                            $('#option2 option').each(function() {
                                if ($(this).is(':selected')){
                                    $('#option_2').text($('#option2').val());
                                }
                            });
                        });
                        $("input[name='qty']").click(function() {
                            if($("input[name='qty']").is(':checked')) {
                                $("input[name='qty']").parent().removeClass('active');
                                $(this).parent().addClass('active');
                                var qty = $(this).val();
                                $('#quantity').text(qty+' cái');
                            }
                        });
                    });
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
    {!! Form::close() !!}
    </div>


@endsection
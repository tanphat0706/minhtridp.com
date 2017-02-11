@extends('frontend.template')
@section('title', 'Tờ rơi A4 | Minh Trí DP')

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
    <div id="detail-product" class="container cate-list no-padding">
        <div class="col-md-6">
            <div class="detail-product-img">
                <img class="img-reponsive" src="{{asset('images/products/a4-flyer.png')}}" >
            </div>
            <div class="detail-product-left">
                <div class="product-summary">
                    <h3>Chi Tiết Đơn Hàng</h3>
                    <hr>
                    <p><b style="color: #5f9f3b">File thiết kế: </b><b id="option_3"></b></p>
                    <p><b style="color: #5f9f3b">Chất liệu: </b><b id="option_4"></b></p>
                    <p><b style="color: #5f9f3b">Số mặt in: </b><b id="option_1"></b></p>
                    <p><b style="color: #5f9f3b">Cán màng: </b><b id="option_2"></b></p>
                    <p><b style="color: #5f9f3b">Số lượng: </b><b id="quantity"></b></p>
                    <input type="hidden" id="quantity_hidden">
                    <hr>
                    <p><i>Yêu cầu của bạn sẽ được xử lý trong 1-2 giờ làm việc.</i></p>
                    <hr>
                    <p style="max-width: 100%;overflow: hidden"><input id="yc-bao-gia" class="btn btn-primary-dark-grey" type="button" value="Yêu cầu báo giá"></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-info">
                <h1>Tờ Rơi A4</h1>
                <p>Đang cập nhật...</p>
                <p>
                    <a href="javascript:void(0)" data-toggle="tooltip" title="Dịch vụ giao hàng tận nơi">
                        Dịch vụ giao hàng tận nơi
                    </a>
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
                    {!! Form::open(['route'=>['bao-gia'], 'method'=> 'POST', 'id'=>'bao-gia' ,'class' => 'product-form']) !!}
                    <input type="hidden" name="product_name" value="Tờ rơi A4">
                    <div class="row">
                        <div class="col-md-6 product-option-div">
                            <h5>File thiết kế:</h5>
                            <div class="select-style left">
                                <select name="option3" id="option3">
                                    <option value="Có">Có</option>
                                    <option value="Chưa">Chưa</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 product-option-div">
                            <h5>Chất liệu:</h5>
                            <div class="select-style right">
                                <select name="option4" id="option4">
                                    <option value="Couche 120">Couche 120</option>
                                    <option value="Couche 150">Couche 150</option>
                                    <option value="Couche 200">Couche 200</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 product-option-div">
                            <h5>Số mặt in:</h5>
                            <div class="select-style left">
                                <select name="option1" id="option1">
                                    <option value="1 mặt">1 mặt</option>
                                    <option value="2 mặt">2 mặt</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 product-option-div">
                            <h5>Cán màng:</h5>
                            <div class="select-style right">
                                <select name="option2" id="option2">
                                    <option value="Không cán màng">Không cán màng</option>
                                    <option value="Cán màng bóng">Cán màng bóng</option>
                                    <option value="Cán màng mờ">Cán màng mờ</option>
                                    <option value="Cán vân">Cán vân</option>
                                </select>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                            <div class="col-md-12">
                                <h5>Chọn số lượng:</h5>
                            </div>
                            <div class="col-md-12 qty-div">
                                <label class="btn btn-success active">10 cái<input type="radio" checked value="10" name="qty" id="default" class="badgebox"></label>
                                <label class="btn btn-success">20 cái<input type="radio" value="20" name="qty" id="primary" class="badgebox"></label>
                                <label class="btn btn-success">50 cái<input type="radio" value="50" name="qty" id="info" class="badgebox"></label>
                                <label class="btn btn-success">100 cái<input type="radio" value="100" name="qty" id="success" class="badgebox"></label>
                                <label class="btn btn-success">1.000 cái<input type="radio" value="1000" name="qty" id="warning" class="badgebox"></label>
                                <label class="btn btn-success">2.000 cái<input type="radio" value="2000" name="qty" id="danger" class="badgebox"></label>
                                <label class="btn btn-success">3.000 cái<input type="radio" value="3000" name="qty" id="default" class="badgebox"></label>
                                <label class="btn btn-success">5.000 cái<input type="radio" value="5000" name="qty" id="primary" class="badgebox"></label>
                                <label class="btn btn-success">10.000 cái<input type="radio" value="10000" name="qty" id="info" class="badgebox"></label>
                                <label class="btn btn-success">20.000 cái<input type="radio" value="20000" name="qty" id="success" class="badgebox"></label>
                            </div>

                        </div>
                    {!! Form::close() !!}
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
                    <form id="hotro" class="form-horizontal" action="{{route('needhelp')}}">
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">Họ & Tên:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ht_name" id="ht-name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="pwd">Điện thoại:</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ht_phone" id="ht-phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="email">Email:</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="ht_email" id="ht-email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="content">Nội dung:</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" rows="3" name="ht_content" id="ht-content"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary-dark-grey">Gửi hỗ trợ</button>
                            </div>
                        </div>
                    </form>
                </div>

                <script>

                </script>
            </div>
        </div>

    </div>
    {!! Html::script('js/frontend.js') !!}
@endsection
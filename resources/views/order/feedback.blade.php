@extends('frontend.template')
@section('title', 'Trang cá nhân')

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
                        <a href="{{route('my-page')}}">
                            <span>Trang cá nhân</span>
                        </a>
                    </li>
                    <li>
                        <a href="/booklets">
                            <span>{{$order->order_code}}</span>
                        </a>
                    </li>
                </ol>

            </div>
        </div>

    </div>
    <div class="container my-page no-padding">
        <div class="col-md-3 n no-padding-left">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">Thông tin của bạn</div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <span><i class="fa fa-user"></i></span> {{\Auth::user()->name}}</li>
                        <li class="list-group-item">
                            <span><i class="fa fa-envelope"></i></span> {{\Auth::user()->email}}</li>
                        <li class="list-group-item">
                            <span><i class="fa fa-mobile"></i></span> {{\Auth::user()->phone}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="col-md-12 no-padding">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">Phản hồi báo giá</div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 feedback-summary">
                                        <p>
                                            - Đơn hàng báo giá có mã là <b>{{$order->order_code}}</b>, với sản phẩm <b>{{$order->content}}</b>, quý khách có đồng ý với mức giá <span class="flat label status-label label-danger">{{number_format($order->price)}} VNĐ</span> mà chúng tôi đưa ra không ?
                                        </p>
                                        <p>
                                            - Nếu quý khách <b>đồng ý</b>, chúng tôi sẽ gửi <b>email xác nhận</b> đến quý khách về đơn hàng này.
                                        </p>
                                        <p>
                                            - Nếu quý khách <b>không đồng ý</b>, xin để lại lý do. Xin cảm ơn.
                                        </p>

                                        <textarea id="feedback" name="feedback" rows="2" style="width:100%"></textarea>
                                    <div class="modal-footer">
                                        <form action="{{route('notagree')}}" style="float: right; margin-left: 15px;">
                                            <input id="feedback-content" type="hidden" name="feedback-content" value="">
                                            <input type="hidden" name="order_code" value="{{$order->order_code}}">
                                            <button type="submit" id="notagree" class="btn btn-danger" data-dismiss="modal">Không đồng ý</button>
                                        </form>
                                        <form action="{{route('agree')}}"  style="float: right">
                                            <input type="hidden" name="order_code" value="{{$order->order_code}}">
                                            <button type="submit" id="agree" class="btn btn-info" data-dismiss="modal">Đồng ý</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $("#feedback").change(function(){
                $('#feedback-content').val($('#feedback').val());
            });
        });
    </script>
@endsection
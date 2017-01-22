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
                        <a href="/booklets">
                            <span>Trang cá nhân</span>
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
                        <a href="{{route('change-profile')}}" style="width: 100%" class="btn btn-primary">Thay đổi thông tin</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="col-md-12 no-padding">
                <div class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">Danh sách yêu cầu báo giá</div>
                        <div class="panel-body">
                            <table class="don-hang-tbl table table-bordered">
                                <thead>
                                <tr>
                                    <th width="90px">Mã ĐH</th>
                                    <th width="150px">Đơn hàng</th>
                                    <th>Tình trạng</th>
                                    <th>Báo giá</th>
                                    <th>Ngày yêu cầu</th>
                                    <th>Ngày xử lý</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($orders as $order)
                                <tr>
                                   <td>{{$order->order_code}}</td>
                                   <td>{{$order->content}}</td>
                                   <td>
                                       @if($order->status == 0)
                                           <span class="flat label status-label label-default">Chưa xử lý</span>
                                       @elseif($order->status == 1)
                                           <span class="flat label status-label label-warning">Đang xử lý</span>
                                       @else
                                           <span class="flat label status-label label-success">Đã xử lý</span>
                                       @endif
                                   </td>
                                   <td>
                                       @if($order->price != null && $order->price != 0)
                                           <span class="flat label status-label label-danger">{{number_format($order->price)}} VNĐ</span>
                                       @else
                                           <span class="flat label status-label label-default">Đợi báo giá</span>
                                       @endif
                                   </td>
                                   <td>{{date_format($order->created_at,'d-m-Y H:i')}}</td>
                                    @if($order->status != 0)
                                    <td>{{date_format($order->updated_at,'d-m-Y H:i')}}</td>
                                    @endif
                                   <td>
                                       @if($order->status == 2 && $order->result ==0)
                                       <a href="{{route('feedback',$order->order_code)}}" class="btn btn-info">Phản hồi</a>
                                       @elseif($order->result !=0)
                                           <p class="btn btn-default disabled" style="color: #000">Kết thúc</p>
                                       @endif
                                   </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
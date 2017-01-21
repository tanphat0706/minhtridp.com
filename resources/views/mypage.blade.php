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
                                    <th>Mã ĐH</th>
                                    <th width="200px">Đơn hàng</th>
                                    <th>Tình trạng</th>
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
                                           Chưa xử lý
                                       @elseif($order->status == 1)
                                            Đang xử lý
                                       @else
                                           Đã xử lý
                                       @endif
                                   </td>
                                   <td>{{$order->created_at}}</td>
                                   <td>{{$order->updated_at}}</td>
                                   <td><button type="button" class="btn btn-info">Phản hồi</button></td>
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
    </div>


@endsection
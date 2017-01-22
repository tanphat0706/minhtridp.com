@extends('backend.master')
@section('title', 'Xử lý báo giá')
@section('page_title') Xử lý báo giá
@stop

@section('content')
    <!-- left column -->
    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        {!! Form::model($order,['route'=>['order-update', $order->id], 'method'=> 'PUT']) !!}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Khách hàng</label>
                        {!!Form::text('user', $user->name , array('disabled'=>'disabled','class' => 'form-control formwidth')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        {!!Form::text('user', $user->email , array('disabled'=>'disabled','class' => 'form-control formwidth')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">Số điện thoại</label>
                        {!!Form::text('user', $user->phone , array('disabled'=>'disabled','class' => 'form-control formwidth')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">Phản hồi của khách hàng</label>
                        {!!Form::textarea('comment', null, array('disabled'=>'disabled','rows'=>4,'class' => 'form-control formwidth')) !!}
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Mã đơn hàng</label>
                        {!!Form::text('order_code', null , array('disabled'=>'disabled','class' => 'form-control formwidth')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">Đơn hàng</label>
                        {!!Form::textarea('content', null , array('disabled'=>'disabled','rows'=>4,'class' => 'form-control formwidth')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">Ngày yêu cầu báo giá</label>
                        {!!Form::text('created_at', null , array('disabled'=>'disabled','class' => 'form-control formwidth')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">Nhập báo giá</label>
                        {!!Form::text('price', null , array($order->status == 2 ? 'disabled' : '','id'=>'price','class' => 'form-control formwidth')) !!}
                    </div>
                </div>
                <!-- /.col -->
            </div>

                <!-- /.row -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary" style="float: left;margin-right: 15px;">
                    <i class="fa fa-plus-circle"></i> Lưu báo giá
                </button>
            </div>
            {!! Form::close() !!}

        </div>
        <!-- /.box -->
    </div>
    <!-- /.row -->
    <script type="text/javascript">
        $(document).ready(function () {
            $('#price').number( true, 0);
            $("#price").change(function(){
//                alert($('#price').val());
                $('#send-price').val($('#price').val());
            });
        });
    </script>
@endsection
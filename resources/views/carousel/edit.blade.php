@extends('backend.master')
@section('title', trans('carousel.edit'))
@section('page_title') {{ trans('carousel.edit') }}
@stop

@section('content')
    <!-- left column -->
    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        {{ Form::model($carou, array('route' => ['carousel-update', $carou->id], 'method' => 'PUT','files' => true)) }}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">

                    <div class="form-group">
                        <label for="name">{{ trans('carousel.img_url') }}</label><span class="required">*</span>
                        <div>
                            <img class="img-responsive" style="width:100%;height: 215px"
                                 src="{{asset('images/carousel_img/'.$carou->img_url)}}" id="output">
                        </div>
                        {{--{!! Form::file('image_url',null,['class'=>'form-control']) !!}--}}
                        <input class="form-control" type="file" accept="image/*" name="img_url"
                               onchange="loadFile(event)">
                        <script>
                            var loadFile = function (event) {
                                var output = document.getElementById('output');
                                output.src = URL.createObjectURL(event.target.files[0]);
                            };
                        </script>
                    </div>

                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">{{ trans('carousel.name') }}</label>
                        <span class="required">*</span>
                        {!!Form::text('title', null , array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">{{ trans('carousel.order_number') }}</label>
                        <span class="required">*</span>
                        {!!Form::text('order_number', null,array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">{{ trans('carousel.description') }}</label>
                        <span class="required">*</span>
                        {!!Form::text('description',null, array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                        {{--<textarea id="description" name="description" rows="7" class="form-control"--}}
                                  {{--placeholder="Write your message.."></textarea>--}}
                    </div>
                    <div class="form-group">
                        {!! Form::label('status', trans('user.status'), ['class' => 'control-label']) !!}
                        {!! Form::select('status', $listStatus, null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary"><i
                            class="fa fa-plus-circle"></i> {{trans('system.finish')}}
                </button>
            </div>

        </div>
        <!-- /.box -->
        {!! Form::close() !!}
    </div>
    <!-- /.row -->

@endsection
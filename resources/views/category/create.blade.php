@extends('backend.master')
@section('title', trans('category.add'))
@section('page_title') {{ trans('category.add') }}
@stop

@section('content')
    <!-- left column -->
    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        {!! Form::open(['route'=>['category-store'], 'method'=> 'POST','files' => true]) !!}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">{{ trans('category.name') }}</label>
                        <span class="required">*</span>
                        {!!Form::text('name', null , array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>

                    <div class="form-group col-md-6 col-xs-12" style="float: left;">
                        <label for="name">{{ trans('category.image_url') }}</label><span class="required">*</span>
                        <div>
                            <img class="img-responsive" style="" src="{{asset('images/text.png')}}" id="output">
                        </div>
                        {{--{!! Form::file('image_url',null,['class'=>'form-control']) !!}--}}
                        <input class="form-control" type="file" accept="image/*" name="image_url"
                               onchange="loadFile(event)">
                        <script>
                            var loadFile = function (event) {
                                var output = document.getElementById('output');
                                output.src = URL.createObjectURL(event.target.files[0]);
                            };
                        </script>
                    </div>
                    <div class="form-group col-md-6 col-xs-12" style="float: left;">
                        <label for="name">{{ trans('category.thumbs_img') }}</label><span class="required">*</span>
                        <div>
                            <img class="img-responsive" style="" src="{{asset('images/text.png')}}" id="output2">
                        </div>
                        {{--{!! Form::file('image_url',null,['class'=>'form-control']) !!}--}}
                        <input class="form-control" type="file" accept="image/*" name="thumbs_img"
                               onchange="loadFile2(event)">
                        <script>
                            var loadFile2 = function (event) {
                                var output2 = document.getElementById('output2');
                                output2.src = URL.createObjectURL(event.target.files[0]);
                            };
                        </script>
                    </div>
                    <div class="form-group">
                        {!! Form::label('status', trans('user.status'), ['class' => 'control-label']) !!}
                        {!! Form::select('status', $listStatus, null, ['class' => 'form-control']) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">{{ trans('category.order_number') }}</label>
                        {!!Form::text('order_number', null,array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">{{ trans('category.home_description') }} (description in homepage)</label>
                        <span class="required">*</span>
                        {!!Form::text('home_description', null,array('class' => 'form-control formwidth', 'autocomplete' => 'off')) !!}
                    </div>
                    <div class="form-group">
                        <label for="name">{{ trans('category.description') }}</label>
                        <span class="required">*</span>
                        <textarea id="messageArea" name="description" rows="7" class="form-control ckeditor"
                                  placeholder="Write your message.."></textarea>
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
    <script type="text/javascript">
        CKEDITOR.replace('messageArea',
                {
                    customConfig: 'config.js',
                    toolbar: 'simple'
                })
    </script>
    <!-- /.row -->
@endsection
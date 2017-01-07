@extends('backend.master')
@section('title', trans('product.add'))
@section('page_title') {{ trans('product.add') }}
@stop

@section('content')
    <!-- left column -->
    <!-- general form elements -->
    <div class="box box-primary">
        <!-- form start -->
        {!! Form::open(['route'=>['product-store'], 'method'=> 'POST']) !!}
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">{{ trans('product.name') }}</label>
                        <span class="required">*</span>
                        <input type="text" name="name" class="form-control formwidth">
                    </div>

                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">{{ trans('product.description') }}</label>
                        <input type="text" name="des" class="form-control formwidth">
                    </div>
                </div>
                <!-- /.col -->
            </div>
            @for($i=1; $i<=5; $i++)
            <div class="row property-detail" data-id="{{$i}}" id="pro_{{$i}}">
                <label class="col-md-12" for="name">{{ trans('product.properties') }} {{$i}}</label>
                    <div class="form-group">
                        <div class="col-md-4" >
                            <select id="property_{{$i}}" name="property_id_{{$i}}" class="form-control">
                                <option id="property-{{$i}}"  value="" disabled selected>Please select</option>
                                @foreach($property as $list_property)
                                    <option  id="property-{{$i}}-{{$list_property->id}}" data-detail="{{$model_detail->getItemByPropertyID($list_property->id)}}" value="{{$list_property->id}}">{{$list_property->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5" >
                            <select id="propertyDetail_{{$i}}" name="propertyDetail_id_{{$i}}" class="form-control">
                                <option value="" disabled selected>Select Property first</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="button" class="btn btn-info add" disabled>Add</button>
                            <button type="button" class="btn btn-danger remove">Remove</button>
                        </div>
                    </div>
                <!-- /.col -->
            </div>
            @endfor
        </div>
        <div class="box-footer">
            <button type="submit" class="btn btn-primary"><i
                        class="fa fa-plus-circle"></i> {{trans('system.finish')}}</button>
        </div>
        {!! Form::close() !!}
    </div>
    {!! Html::script('js/product.js') !!}
    <script>
        $(function() {
            $('button.remove').click(function(){
                $(this).attr('disabled', 'disabled');
                $(this).prev().removeAttr('disabled', 'disabled');
                var id = $(this).parents('.property-detail').attr('id');
                $('#'+id+' select').attr('disabled', 'disabled');
                console.log();
            })
            $('button.add').click(function(){
                $(this).attr('disabled', 'disabled');
                $(this).next().removeAttr('disabled', 'disabled');
                var id = $(this).parents('.property-detail').attr('id');
                $('#'+id+' select').removeAttr('disabled', 'disabled');
            })
        });
    </script>
    <!-- /.row -->
@endsection
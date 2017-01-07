<style type="text/css">
	.select-image .item, .selected-image .item{
		display: inline-block;
		max-width: 71px;
	}
	.select-image, .selected-image{
		overflow: auto;
		max-height: 147px;
		margin-top: 10px;
	}
	.select-image .item.active{
		border: 1px solid red;
	}
	.select-image .item:hover{
		border: 1px solid red;
	}
	.select-image::-webkit-scrollbar-track
	{
		-webkit-box-shadow: inset 0 0 5px rgba(0,0,0,0.3);
		background-color: #F5F5F5;
	}
	.select-image::-webkit-scrollbar
	{
		width: 5px;
		background-color: #F5F5F5;
	}
	.select-image::-webkit-scrollbar-thumb
	{
		background-color: #0ae;
		background-image: -webkit-gradient(
			linear, 0 0, 0 100%,
       		color-stop(.5, rgba(255, 255, 255, .2)),
	   		color-stop(.5, transparent), to(transparent)
	   	);
	}
</style>
<div>
	<span id="area-down" class="btn label label-info flat"><i class="fa-arrow-circle-down fa"></i> {{ trans('system.chosse') }}</span>
	<span id="area-up" class="btn label label-info flat" style="display: none;"><i class="fa-arrow-circle-up fa"></i> {{ trans('system.close') }}</span>
	<input id="selected" type="hidden" value="{{ isset($default) ? $default : '' }}" name="{{ isset($name) ? $name : 'select_image' }}">
	<div class="select-image" style="display: none;">
		@if(isset($lists))
			@foreach($lists as $item)
				<span data-toggle="tooltip" title="{{ $item['name'] }}" class="item" id="{{ $item['id'] }}">
					<img class="img-responsive" src="{{ $item['image'] }}">
				</span>
			@endforeach
		@endif
	</div>
	<div class="selected-image">
		@if(isset($lists) && isset($default))
			@foreach($lists as $item)
				@if($item['id'] == $default)
				<span class="item" id="{{ $item['id'] }}">
					<img class="img-responsive" src="{{ $item['image'] }}">
				</span>
				@endif
			@endforeach
		@endif
	</div>
</div>

@section('partial-js')
	$(function(){
		$('.select-image .item').click(function(){
			$('.select-image .item').removeClass('active');
			$(this).addClass('active');
			$('#selected').val($(this).attr('id'));
			$(this).clone().appendTo($('.selected-image').empty());
		});
		$("{{isset($default) ? '.item#'.$default : ''}}").addClass('active');
		$('#area-down').click(function(){
			$('.select-image').slideDown();
			$('.selected-image').fadeOut();
			$('#area-up').show();
			$(this).hide();
		});
		$('#area-up').click(function(){
			$('.select-image').slideUp();
			$('.selected-image').fadeIn();
			$('#area-down').show();
			$(this).hide();
		});
	});
@endsection
@foreach($buttons as $button)
	{{--*/ $option = '' /*--}}
	@if(isset($button['htmlOptions']) && is_array($button['htmlOptions']))
		@foreach($button['htmlOptions'] as $key => $value)
			{{--*/ $option .= $key . '="' . $value . '" ' /*--}}
		@endforeach
	@endif
	<a data-toggle="tooltip" href="{{ $button['href'] }}" class="btn btn-xs btn-{{ $button['type'] }}" {!! $option !!}>
		<i class="fa fa-btn fa-{{ $button['icon'] }}"></i> <span class="hidden-md hidden-sm hidden-xs">{{ $button['label'] }}</span>
	</a>

    @if(isset($button['delete']))
        {!! Form::open(['route'=>[ $button['route'], $button['delete']], 'method'=> 'DELETE', 'id' => $button['id']]) !!}
        {!! Form::close() !!}
    @endif
@endforeach
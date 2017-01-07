<div class="modal fade" tabindex="-1" role="dialog" id="{!! isset($id) ? $id : 'confirm-modal' !!}"> 
    <div class="modal-dialog modal-sm" {!! isset($width) ? 'style="width: '.$width.'"' : '' !!}>
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> 
                <h4 class="modal-title">{!! (isset($header) && $header != null) ? $header : trans('system.message') !!}</h4> 
            </div> 
            <div class="modal-body">
            	@if(isset($body) && $body != null)
            		{!! $body !!}
            	@endif
            </div>
            <img id="modal-confirm-loading" src="{{ url('/images/loading-horizontal.gif') }}" style="width: 100%; height: 5px; display: none">
            <div class="modal-footer">
	        	<button type="button" class="btn btn-default" data-dismiss="modal" id="close-confirm">{!! trans('system.no') !!}</button>
	        	<button id="yes-button" onclick="{!! isset($callback) ? $callback : '' !!}" type="button" class="btn btn-primary">{!! trans('system.yes') !!}</button>
	      	</div>
        </div> 
    </div> 
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="{!! isset($id) ? $id : 'common-modal' !!}"> 
    <div class="modal-dialog" {!! isset($width) ? 'style="width: '.$width.'"' : '' !!}>
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button> 
                <h4 class="modal-title">{!! (isset($header) && $header != null) ? $header : trans('system.message') !!}</h4> 
            </div> 
            <img id="modal-loading" src="{{ url('/images/loading-horizontal.gif') }}" style="width: 100%; height: 10px; display: none">
            <div class="modal-body">
            	@if(isset($body) && $body != null)
            		{!! $body !!}
            	@endif
            </div> 
            <div class="modal-footer">
                <button id="cancel" type="button" class="btn btn-default flat" data-dismiss="modal"><i class="fa-stop-circle-o fa"></i> {{ trans('system.close') }}</button>
            </div>
        </div> 
    </div> 
</div>
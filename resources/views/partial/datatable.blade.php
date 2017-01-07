<table id="list-datatable" class="table table-condensed table-striped table-hover dt-responsive" width="100%">
	<thead>
		<tr class="title">
			@foreach($columns as $column)
				<th></th>
			@endforeach
		</tr>
		@if(isset($filters) && !empty($filters))
			<tr id="filter-area">
				@foreach($columns as $key => $column)
					<th id="{{ $key }}"></th>
				@endforeach
			</tr>
		@endif
	</thead>
</table>
@section('datatable-js')
var columns = {!! json_encode($columns) !!};
var filters = {!! isset($filters) ? json_encode($filters) : '{}' !!};
var defaultOrder = {!! isset($defaultOrder) ? json_encode($defaultOrder) : '[]' !!};
var datatableUrl = '{!! $datatableUrl !!}';
$(function(){
	if(typeof columns == 'undefined' || $.isEmptyObject(columns)) {
        $('#common-modal .modal-body').html('Data column not set');
        $('#common-modal').modal();
    } else if(typeof datatableUrl == 'undefined') {
        $('#common-modal .modal-body').html('Data url not set');
        $('#common-modal').modal();
    } else {
        var table = $('#list-datatable').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            bSortCellsTop: true,
            ajax: datatableUrl,
            dom: 'C lftrip',
            colVis: {
                exclude: [ 0 ]
            },
            order: defaultOrder,
            columns: columns,
            initComplete: function () {
                if(filters != null) {
                    this.api().columns().every(function (index) {
                        var column = this;
                        var filter = filters[column.index()];
                        var select = $(filter)
                            .appendTo( $('#filter-area #'+column.index()).empty() )
                            .on( 'change', function () {
                                var val = $.fn.dataTable.util.escapeRegex(
                                    $(this).val()
                                );

                                column.search( val ? val : '', true, false ).draw();
                            } );
                    }); 
                }
            }
        });
    }
});
@endsection
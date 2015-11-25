
<i 
	class='fa fa-th-list'
	data-toggle='tooltip'
	title='view detail kelas'
	id='view_detail_kelas{!! $list->id !!}'
	style='cursor:pointer;'
></i>

<script type="text/javascript">
$('#view_detail_kelas{!! $list->id !!}').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend.siswakelas.view_detail_kelas", $list->id) }}');
})
</script>

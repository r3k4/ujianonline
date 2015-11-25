<button 
	class="btn btn-link" 
 	data-toggle='tooltip'
 	title='view data kelas'
 	id='view_detail_kelas{!! $list->id !!}'  	
	href="#"
>
 <i class='fa fa-th-list'></i> detail kelas
</button>



<script type="text/javascript">
$('#view_detail_kelas{!! $list->id !!}').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend.kelas.view_detail_kelas", $list->id) }}');
	return false;
});
</script>

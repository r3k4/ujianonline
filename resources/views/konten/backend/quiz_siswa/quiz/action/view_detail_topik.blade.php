<i class='fa fa-eye' 
   id='view_detail{{ $list->id }}' 
   style='cursor:pointer;'
   data-toggle='tooltip'
   title='lihat detail topik'
></i>


<script type="text/javascript">
$('#view_detail{{ $list->id}}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend.quiz_siswa.detail_topik", $list->id) }}')

})
</script>


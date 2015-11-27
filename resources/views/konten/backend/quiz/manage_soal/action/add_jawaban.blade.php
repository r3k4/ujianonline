<i 
	class='fa fa-plus-square' 
	id='add_jawaban{{ $list->id }}' 
	style='cursor:pointer;'
	data-toggle='tooltip'
	title='tambah jawaban soal'
></i>


<script type="text/javascript">
$('#add_jawaban{{ $list->id}}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend.quiz.manage_soal.add_jawaban", [Request::segment(4), $list->id]) }}')
	$('.modal-dialog').addClass('modal-lg');
})
</script>


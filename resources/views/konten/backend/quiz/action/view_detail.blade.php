<i 
	class='fa fa-th-list' 
	id='view_detail{{ $list->id }}' 
	style='cursor:pointer;'
	data-toggle='tooltip'
	title='view detail topik quiz'
></i>
<script type="text/javascript">
$('#view_detail{{ $list->id}}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend.quiz.view_detail", $list->id) }}')
});
</script>


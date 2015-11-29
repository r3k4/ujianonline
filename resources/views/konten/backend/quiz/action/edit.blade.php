<i 
	class='fa fa-pencil-square' 
	id='edit{{ $list->id }}' 
	style='cursor:pointer;'
	data-toggle='tooltip'
	title='edit'	
></i>

<script type="text/javascript">
$('#edit{{ $list->id}}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend.quiz.edit", $list->id) }}')
	$('.modal-dialog').addClass('modal-lg');
})
</script>


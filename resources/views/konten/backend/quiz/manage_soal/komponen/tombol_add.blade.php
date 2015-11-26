
<button class='btn btn-primary pull-right' id='add'> <i class='fa fa-plus-square'></i> create soal</button>
<script type="text/javascript">
$('#add').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend.quiz.manage_soal.add", Request::segment(4)) }}');
})
</script>

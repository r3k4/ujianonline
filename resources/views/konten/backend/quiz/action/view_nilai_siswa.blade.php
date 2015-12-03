<i class='fa fa-bar-chart' 
   id='view_nilai{{ $list->id }}' 
   style='cursor:pointer;'
   data-toggle='tooltip'
   title='lihat daftar nilai siswa'
 ></i>


<script type="text/javascript">
$('#view_nilai{{ $list->id}}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend.quiz.manage_siswa.view_nilai", $list->id) }}')

})
</script>


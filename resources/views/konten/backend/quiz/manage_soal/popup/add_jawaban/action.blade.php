
<i class='fa fa-times' style='cursor:pointer;' id='del{{ $list->id }}'></i>


<script type="text/javascript">
$('#del{{ $list->id }}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ route("backend.quiz.manage_soal.del_jawaban") }}',
			data : {id : '{{ $list->id }}', _token : '{!! csrf_token() !!}' },
			type : 'post',
			error: function(err){				
				swal('error', 'terjadi kesalahan pada sisi server!', 'error');
			},
			success:function(ok){
				swal({
					title 	: 'success', 
					text 	: 'data telah terhapus', 
					type 	: 'success'
				}, function(){
				 	$('.modal-body').load('{!! route("backend.quiz.manage_soal.add_jawaban", [Request::segment(5), Request::segment(6)]) !!}')			
				});
			}
		})
	}
})
</script>

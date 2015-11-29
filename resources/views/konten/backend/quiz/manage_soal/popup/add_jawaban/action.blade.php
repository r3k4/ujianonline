@if($list->is_benar == 0)
	<i 
		data-toggle='tooltip'
		title='set jawaban benar'
		class='fa fa-check' 
		style='cursor:pointer;' 
		id='set_benar{{ $list->id }}'
	></i>


	<script type="text/javascript">
	$('#set_benar{{ $list->id }}').click(function(){
			$.ajax({
				url : '{{ route("backend.quiz.manage_soal.set_jawaban_benar") }}',
				data : {id : '{{ $list->id }}', _token : '{!! csrf_token() !!}' },
				type : 'post',
				error: function(err){
					alert('error! terjadi sesuatu pada sisi server!');
				},
				success:function(ok){
					$('.modal-body').load('{!! route("backend.quiz.manage_soal.add_jawaban", [Request::segment(5), Request::segment(6)]) !!}');
					$('#myModal').on('hidden.bs.modal', function (e) {
						window.location.reload();
					});		
				}
			});
	});
	</script>

	||
@endif



<i 	
	data-toggle='tooltip'
	title='edit jawaban'
	class='fa fa-pencil-square' 
	id='edit{{ $list->id }}' 
	style='cursor:pointer;'
></i>

<script type="text/javascript">
$('#edit{{ $list->id}}').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('.modal-body').load('{{ route("backend.quiz.manage_soal.edit_jawaban", [Request::segment(5), Request::segment(6), $list->id]) }}');
});
</script>






|| 





<i class='fa fa-times' style='cursor:pointer;' id='del{{ $list->id }}'></i>
<script type="text/javascript">
$('#del{{ $list->id }}').click(function(){
	swal({
		title : 'are you sure?',
		type : 'warning',
		allowOutsideClick : false, 
		showCancelButton : true,
		showConfirmButton : true,
		closeOnConfirm : false,
		closeOnCancel : true
	}, function(isConfirm){
		if(isConfirm){

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
			});		

		}
	});
})
</script>


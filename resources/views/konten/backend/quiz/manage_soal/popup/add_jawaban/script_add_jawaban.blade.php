<script type="text/javascript">

$('#create_jawaban').click(function(){
	$('#create_jawaban').hide();
	$('#form_tambah_jawaban').fadeIn();
});

$('#cancel').click(function(){
	$('#form_tambah_jawaban').hide();
	$('#create_jawaban').fadeIn();
});




$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');
jawaban = $('#jawaban').val();
is_benar = $('#is_benar').val();

form_data ={
	jawaban 	: jawaban,
	is_benar 	: is_benar,
	mst_soal_id : {!! Request::segment(6) !!},
 	_token 		: '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend.quiz.manage_soal.insert_jawaban") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			$('#simpan').removeAttr('disabled');
	 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
        datajson = JSON.parse(xhr.responseText);
        $.each(datajson, function( index, value ) {
       		$('#pesan').append(index + ": " + value+"<br>")
          });
		},
		success:function(ok){
			 swal({
			 	title : 'success',
			 	type : 'success'
			 }, function(){
			 	$('.modal-body').load('{!! route("backend.quiz.manage_soal.add_jawaban", [Request::segment(5), Request::segment(6)]) !!}')
				$('#myModal').on('hidden.bs.modal', function (e) {
					window.location.reload();
				});					 
			 });
		}
	});
});



$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
})

</script>

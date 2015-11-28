<div class="row">
	<div class="col-md-12">
<hr>
@if(Session::has('pesan_sukses'))
	<div class="alert alert-success alert-dismissible" role="alert">
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>	
		{!! Session::get('pesan_sukses') !!}
	</div>
@endif
			{!! $soal->soal !!}
			<hr>
			<div id="pesan"></div>
			<div class="form-group">
				{!! Form::label('jawaban', 'Isi Konten Soal : ') !!}
				{!! Form::text('jawaban', $jawaban->jawaban, ['class' => 'form-control', 'placeholder' => 'jawaban soal...']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('is_benar', 'Benar/Salah : ') !!}
				{!! Form::select('is_benar', [1 => 'benar', 0 => 'salah'], $jawaban->is_benar, ['class' => 'form-control', 'id' => 'is_benar']) !!}
			</div>
			<div class="form-group">
				<button id='simpan' class='btn btn-info'><i class='fa fa-floppy-o'></i> SIMPAN</button>
				<button id='cancel' class='btn btn-danger'><i class='fa fa-times'></i> BATAL</button>
			</div>	 

	</div>
</div>


<script type="text/javascript">


$('#cancel').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('.modal-body').load('{{ route("backend.quiz.manage_soal.add_jawaban", [Request::segment(5), Request::segment(6)]) }}');
});
 


$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');
jawaban = $('#jawaban').val();
is_benar = $('#is_benar').val();

form_data ={
	jawaban 	: jawaban,
	id 			: {!! $jawaban->id !!},
	is_benar 	: is_benar,
	mst_soal_id : {!! Request::segment(6) !!},
 	_token 		: '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend.quiz.manage_soal.update_jawaban") }}',
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
			 });
		}
	})
})



$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
})

</script>


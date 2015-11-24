<h3>Ikut Kelas </h3>
<hr>

<div id="pesan"></div>

<div id="form_ikut_kelas" class="row">
	<div class="col-md-12">
		<div class="form-group">
			{!! Form::label('kode_kelas', 'Kode Kelas : ') !!}			
			{!! Form::text('kode_kelas', '', ['id' => 'kode_kelas', 'placeholder' => 'kode kelas...', 'class' => 'form-control']) !!}
		</div>	
		<button id='simpan' class='btn btn-info'><i class='fa fa-plug'></i> IKUT KELAS</button>
	</div>
</div>



<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');
kode_kelas = $('#kode_kelas').val();

form_data ={
	kode_kelas : kode_kelas,
 	_token : '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend.siswakelas.do_ikut_kelas") }}',
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
			$('#simpan').removeAttr('disabled');
			if(ok == '0'){
				pesan_error = '<h3> kode kelas salah atau kelas sudah ditutup! </h3>';
				$('#pesan').html('<div class="alert alert-danger animated shake">'+pesan_error+'</div>');
			}else if(ok == '2'){
				pesan_error = '<h3> anda sudah ada dalam kelas ini! </h3>';
				$('#pesan').html('<div class="alert alert-danger animated shake">'+pesan_error+'</div>');
			}else{
				// ok =1 
				$('#form_ikut_kelas').hide();
				pesan_sukses = '<h3> data telah tersimpan! </h3>';
				$('#pesan').html('<div class="alert alert-success animated fadeInDown">'+pesan_sukses+'</div>');
				
				//event on hidden
				$('#myModal').on('hidden.bs.modal', function (e) {
				  window.location.reload();
				});				
			}
		}
	})
})



$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
})

</script>



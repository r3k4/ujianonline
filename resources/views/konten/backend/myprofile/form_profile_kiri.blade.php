		<div class="form-group">
			<label for="">Nama : </label>
			<input value="{!! Auth::user()->nama !!}" type="text" class="form-control" id="nama" placeholder="Nama ...">
		</div>


		<div class="form-group">
			{!! Form::label('tempat_lahir', 'Tempat, Tanggal Lahir (mm/dd/yyyy) : ') !!} <br>
			<div class="row">
				<div class="col-md-5">
					{!! Form::text('tempat_lahir', Auth::user()->data_user->tempat_lahir, ['id' => 'tempat_lahir',  'placeholder' => 'tempat lahir...', 'class' => 'form-control']) !!}					 
				</div>	
				<div class="col-md-6">
					{!! Form::date('tgl_lahir', Auth::user()->data_user->tgl_lahir, ['id' => 'tgl_lahir', 'class' => 'form-control']); !!}
				</div>			
			</div>
		</div>


		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('jenis_kelamin', 'Jenis Kelamin :') !!}  
					{!! Form::select('jenis_kelamin', $jenis_kelamin, Auth::user()->data_user->jenis_kelamin, ['id' => 'jenis_kelamin', 'class' => 'form-control']) !!}
				</div> 				
			</div>
		</div>
  

<button id="simpan"  class="btn btn-success form-control"> 
	<i class='fa fa-check'></i> Simpan
</button>




<script type="text/javascript">
$('#simpan').click(function(){

nama = $('#nama').val();
jenis_kelamin = $('#jenis_kelamin').val();
tempat_lahir = $('#tempat_lahir').val();
tgl_lahir = $('#tgl_lahir').val();


form_data ={
	nama 					: nama,
	jenis_kelamin 			: jenis_kelamin,
	tempat_lahir 			: tempat_lahir,
	tgl_lahir 				: tgl_lahir,
 	_token 					: '{!! csrf_token() !!}'
}


$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend.myprofile.update_profile") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			$('#myModal').modal('show');
			$('.modal-body').html('<div id="pesan"></div>');
			$('#simpan').removeAttr('disabled');
		 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
	        datajson = JSON.parse(xhr.responseText);
	        $.each(datajson, function( index, value ) {
	       		$('#pesan').append(index + ": " + value+"<br>")
	          });
	        $('#simpan').removeAttr('disabled');
		},
		success:function(ok){
	        $('#simpan').removeAttr('disabled');			
			pesan_sukses = '<h3> <i class="fa fa-check"></i> Profile telah berhasil diperbaharui</h3>'
			$('#myModal').modal('show');
			$('.modal-body').html('<div class="alert alert-success">'+pesan_sukses+'</div>')
		}
	})
})



$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
})

</script>


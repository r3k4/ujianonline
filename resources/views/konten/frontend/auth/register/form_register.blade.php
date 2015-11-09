 
		<div class="form-group">
			<label for="">Nama : </label>
			<input type="text" class="form-control" id="nama" placeholder="Nama ...">
		</div>


		<div class="form-group">
			{!! Form::label('tempat_lahir', 'Tempat, Tanggal Lahir : ') !!} <br>
			<div class="row">
				<div class="col-md-8">
					{!! Form::text('tempat_lahir', '', ['id' => 'tempat_lahir',  'placeholder' => 'tempat lahir...', 'class' => 'form-control']) !!}					 
				</div>	
				<div class="col-md-4">
					{!! Form::date('tgl_lahir', \Carbon\Carbon::now(), ['id' => 'tgl_lahir', 'class' => 'form-control']); !!}					
				</div>			
			</div>
		</div>


		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('jenis_kelamin', 'Jenis Kelamin :') !!}  
					{!! Form::select('jenis_kelamin', $jenis_kelamin, 'L', ['id' => 'jenis_kelamin', 'class' => 'form-control']) !!}
				</div> 				
			</div>
			<div class="col-md-6">
				<div class="form-group">
					{!! Form::label('ref_user_level_id', 'Mendaftar sebagai ?') !!} <br>
					{!! Form::select('ref_user_level_id', $level, null, ['id' => 'ref_user_level_id', 'class' => 'form-control']) !!}
				</div> 				
			</div>
		</div>


 
		<div class="form-group">
			{!! Form::label('email', 'Alamat Email : ') !!}
			{!! Form::text('email', '', ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'alamat email...']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('password', 'Password : ') !!}
			{!! Form::password('password', ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'password...']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('password_confirmation', 'Konfirmasi Password : ') !!}
			{!! Form::password('password_confirmation', ['id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'konfirmasi password...']) !!}
		</div>



 

<button id="daftar"  class="btn btn-success form-control"> <i class='fa fa-check'></i> Mendaftar</button>




<script type="text/javascript">
$('#daftar').click(function(){

nama = $('#nama').val();
jenis_kelamin = $('#jenis_kelamin').val();
email = $('#email').val();
tempat_lahir = $('#tempat_lahir').val();
tgl_lahir = $('#tgl_lahir').val();
ref_user_level_id = $('#ref_user_level_id').val();
password = $('#password').val();
password_confirmation = $('#password_confirmation').val();



form_data ={
	nama 					: nama,
	jenis_kelamin 			: jenis_kelamin,
	email 					: email,
	password 				: password,
	password_confirmation 	: password_confirmation,
	tempat_lahir 			: tempat_lahir,
	tgl_lahir 				: tgl_lahir,
	ref_user_level_id 		: ref_user_level_id,
 	_token 					: '{!! csrf_token() !!}'
}


$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("auth.postRegister") }}',
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
		},
		success:function(ok){
			pesan_sukses = '<h1>Pendaftaran telah berhasil</h1><hr>silahkan menunggu terlebih dahulu persetujuan dari admin untuk aktivasi.'
			$('#myModal').modal('show');
			$('.modal-body').html('<div class="alert alert-success">'+pesan_sukses+'</div>')

			$('#nama').val('');
			$('#jenis_kelamin').val('');
			$('#email').val('');
			$('#tempat_lahir').val('');
			$('#tgl_lahir').val('');
			$('#ref_user_level_id').val('');
			$('#password').val('');
			$('#password_confirmation').val('');


		}
	})
})



$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
})

</script>



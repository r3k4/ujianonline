<h3><i class="fa fa-pencil-square"></i> Edit User</h3>
<hr>

<div id="pesan"></div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('nama', 'Nama : ') !!}
			{!! Form::text('nama', $user->nama, ['id' => 'nama', 'class' => 'form-control', 'placeholder' => 'nama...']) !!}
		</div>		
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('email', 'Alamat Email : ') !!}
			{!! Form::text('email', $user->email, ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'email..', 'readonly' => 0]) !!}
		</div>		
	</div>
</div>

<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('tempat_lahir', 'Tempat Lahir : ') !!}
			{!! Form::text('tempat_lahir', $user->data_user->tempat_lahir, ['id' => 'tempat_lahir', 'class' => 'form-control', 'placeholder' => 'tempat_lahir...']) !!}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('tgl_lahir', 'Tgl Lahir : ') !!}
			{!! Form::date('tgl_lahir', $user->data_user->tgl_lahir, ['id' => 'tgl_lahir', 'class' => 'form-control']) !!}
		</div>
	</div>
</div>





<div class="row">
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('jenis_kelamin', 'Jenis Kelamin : ') !!}
			{!! Form::select('jenis_kelamin', $jenis_kelamin, $user->data_user->jenis_kelamin, ['id' => 'jenis_kelamin', 'class' => 'form-control'] ) !!}
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('ref_user_level_id', 'Level : ') !!}
			{!! Form::select('ref_user_level_id', $level, $user->ref_user_level_id, ['id' => 'ref_user_level_id', 'class' => 'form-control'] ) !!}			
		</div>
	</div>
</div>

<button id='simpan' class='btn btn-info'><i class='fa fa-floppy-o'></i> simpan</button>



<script type="text/javascript">
$('#simpan').click(function(){
	
	$('#pesan').removeClass('alert alert-danger animated shake').html('');

nama 				= $('#nama').val();
ref_user_level_id 	= $('#ref_user_level_id').val();
jenis_kelamin 		= $('#jenis_kelamin').val();
email 				= $('#email').val();
tempat_lahir 		= $('#tempat_lahir').val();
tgl_lahir 			= $('#tgl_lahir').val();

form_data ={
	mst_user_id 		: {!! $user->id !!},
	nama 				: nama,
	ref_user_level_id 	: ref_user_level_id,
	jenis_kelamin 		: jenis_kelamin,
	email 				: email,
	tempat_lahir 		: tempat_lahir,
	tgl_lahir 			: tgl_lahir,
 	_token 				: '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend.user.update") }}',
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
			 //window.location.reload();
			 pesan_sukses = '<h3>Data telah tersimpan!</h3>';
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



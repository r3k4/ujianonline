<h1>Tambah Mata Pelajaran Baru</h1>
<hr>

<div id="pesan"></div>


<div class="form-group">
	{!! Form::label('nama', 'Nama Mapel : ') !!}
	{!! Form::text('nama', '', ['class' => 'form-control', 'id' => 'nama', 'placeholder' => 'nama mapel...']) !!}
</div>

<div class="form-group">
	{!! Form::label('keterangan', 'Keterangan Mengenai Mapel : ') !!}
	{!! Form::textarea('keterangan', '', [ 'style' => 'height:50px;', 'class' => 'form-control', 'id' => 'keterangan', 'placeholder' => 'Keterangan mengenai mapel...']) !!}
</div>


<div class="form-group">
	<button id='simpan' class='btn btn-info'><i class='fa fa-floppy-o'></i> SIMPAN</button>
</div>




<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');
nama 		= $('#nama').val();
keterangan 	= $('#keterangan').val();

form_data ={
	nama 		: nama,
	keterangan 	: keterangan,
 	_token 		: '{!! csrf_token() !!}'
}
$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend.mapel.insert") }}',
		data : form_data,
		type : 'post',
		error:function(xhr, status, error){
			$('#simpan').removeAttr('disabled');
	 	$('#pesan').addClass('alert alert-danger animated shake').html('<b>Error : </b><br>');
        datajson = JSON.parse(xhr.responseText);
        $.each(datajson, function( index, value ) {
       		$('#pesan').append(index + ": " + value+"<br>")
          });

		      //    alert('error! terjadi kesalahan pada sisi server!')
		},
		success:function(ok){
			 //window.location.reload();
			pesan_sukses = 'data telah ditambahkan';
			$('.modal-body').html('<div class="alert alert-success">'+pesan_sukses+'</div>')
			
			//trigger event saat modal ditutup
			$('#myModal').on('hidden.bs.modal', function (e) {
			  window.location.reload();
			})		
		}
	})
})



$('#pesan').click(function(){
	$('#pesan').fadeOut(function(){
		$('#pesan').html('').show().removeClass('alert alert-danger');
	});
})

</script>



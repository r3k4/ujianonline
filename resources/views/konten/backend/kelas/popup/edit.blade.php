<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

<h1>
	<i class='fa fa-pencil-square'></i> Edit Kelas
</h1>

<hr>





<div class="row">
	<div class="col-md-12">


	<div id="pesan"></div>

	
		<div class='form-group'>
			{!! Form::label('nama', 'Nama Kelas :') !!}		
			{!! Form::text('nama',  $kelas->nama, ['placeholder' => 'nama kelas...', 'class' => 'form-control', 'id' => 'nama']) !!}
		</div>	


		<div class='form-group'>
			{!! Form::label('ref_mapel_id', 'Mata Pelajaran :') !!}		
			{!! Form::select('ref_mapel_id', $mapel, $kelas->ref_mapel_id, ['class' => 'form-control', 'id' => 'ref_mapel_id']) !!}
		</div>	


		<div class='form-group'>
			<div class="col-md-3">
				{!! Form::label('is_open', 'Status Kelas :') !!} 
			</div>		
			<div class="col-md-8">
			{!! Form::select('is_open', [1 => 'open', 0 => 'closed'], $kelas->is_open, ['class' => 'form-control', 'id' => 'is_open']) !!}
				
			</div>
			<i class='fa fa-question-circle' data-toggle='tooltip' title='digunakan untuk membatasi siswa yg masuk kelas ini'></i>
		</div>	

		<div class='form-group'>
			{!! Form::label('keterangan', 'Keterangan :') !!}		
			{!! Form::textarea('keterangan',  $kelas->keterangan, ['style' => 'height:70px;',  'placeholder' => 'keterangan...', 'class' => 'form-control', 'id' => 'keterangan']) !!}
		</div>	

	<button id='simpan' class='btn btn-info form-control'><i class='fa fa-floppy-o'></i> SIMPAN</button>

	</div>
</div>




<script type="text/javascript">
$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');
nama 			= $('#nama').val();
keterangan 		= $('#keterangan').val();
ref_mapel_id 	= $('#ref_mapel_id').val();
is_open 		= $('#is_open').val();

form_data ={
	nama 			: nama,
	id 				: '{!! $kelas->id !!}',
	keterangan 		: keterangan,
	is_open 		: is_open,
	mst_user_id 	: '{!! Auth::user()->id !!}',
	ref_mapel_id 	: ref_mapel_id,
 	_token 			: '{!! csrf_token() !!}'
}


$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend.kelas.update") }}',
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
			pesan_sukses = ' <i class="fa fa-check"></i> data telah berhasil disimpan';
			 $('.modal-body').html('<div class="alert alert-success">'+pesan_sukses+'</div>');
			$('#myModal').on('hidden.bs.modal', function (e) {
			  window.location.reload();
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



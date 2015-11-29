
<script type="text/javascript">

$('#batal').click(function(){
	$('#myModal').modal('hide');
});



     $('#waktu_pengerjaan').keypress(function(e) {
            var a = [];
            var k = e.which;

            for (i = 48; i < 58; i++)
            a.push(i);
            a.push(8);
            if (!(a.indexOf(k)>=0))
                e.preventDefault();
            });


$('#simpan').click(function(){
	$('#pesan').removeClass('alert alert-danger animated shake').html('');
	nama = $('#nama').val();
	waktu_pengerjaan = $('#waktu_pengerjaan').val();
	ref_tingkat_kesulitan_soal_id = $('#ref_tingkat_kesulitan_soal_id').val();
	ref_kelas_id = $('#ref_kelas_id').val();
	is_jawaban_acak = $('#is_jawaban_acak').val();
	keterangan = $('#keterangan').val();

 


form_data ={
	nama 							: nama,
	keterangan 						: keterangan,
	id 								: '{!! $topik->id !!}',
	mst_user_id						: '{!! Auth::user()->id !!}',
	waktu_pengerjaan 				: waktu_pengerjaan,
	ref_tingkat_kesulitan_soal_id 	: ref_tingkat_kesulitan_soal_id,
	ref_kelas_id 					: ref_kelas_id,
	is_jawaban_acak 				: is_jawaban_acak,
 	_token 							: '{!! csrf_token() !!}'
}

$('#simpan').attr('disabled', 'disabled');
	$.ajax({
		url : '{{ route("backend.quiz.update") }}',
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
			swal({
				title : 'success!',
				text : 'topik quiz telah disimpan!',
				type : 'success'
			}, function(){
				window.location.reload()
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



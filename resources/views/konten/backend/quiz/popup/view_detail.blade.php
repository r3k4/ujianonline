<button class="btn btn-info pull-right" id="edit_topik">
	<i class='fa fa-pencil-square'  ></i> edit
</button>


<script type="text/javascript">
$('#edit_topik').click(function(){
	$('.modal-body').html('loading... <i class="fa fa-spinner fa-spin"></i>');
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend.quiz.edit", $topik->id) }}')

})
</script>



<h3>
	Detail Topik Quiz
</h3>

<hr>


<table class="table">
	<tr>
		<td width="180px">
			Judul Topik
		</td>
		<td>
			{!! $topik->nama !!}
		</td>
	</tr>
	<tr>
		<td>
			Waktu Pengerjaan
		</td>
		<td>
			{!! $topik->waktu_pengerjaan !!} menit
		</td>
	</tr>
	<tr>
		<td>
			Acak jawaban ?
		</td>
		<td>
			@if($topik->is_jawaban_acak == 1)
				Ya
			@else 
				Tidak 
			@endif
		</td>
	</tr>
	<tr>
		<td>
			Acak Soal ?
		</td>
		<td>
			@if($topik->is_soal_acak == 1)
				Ya
			@else 
				Tidak 
			@endif
		</td>
	</tr>

	<tr>
		<td>
			Kelas
		</td>
		<td>
			{!! $topik->ref_kelas->nama !!}
		</td>
	</tr>

	<tr>
		<td>
			Tingkat Kesulitan
		</td>
		<td>
			{!! $topik->ref_tingkat_kesulitan_soal->nama !!}
		</td>
	</tr>


	<tr>
		<td>
			Deskripsi Topik
		</td>
		<td>
			{!! $topik->keterangan !!}
		</td>
	</tr>


</table>
	Jawaban yang dipilih : 
	<br>
	@if(count($list->mst_jawaban_siswa)>0) 
		@if($list->mst_jawaban_siswa->mst_jawaban_soal->is_benar == 1 )
			<div class="alert alert-success">
				{!! $list->mst_jawaban_siswa->mst_jawaban_soal->jawaban !!} - BENAR
			</div>
		@else 
			<div class="alert alert-danger">
				{!! $list->mst_jawaban_siswa->mst_jawaban_soal->jawaban !!}	- SALAH	
			</div>
		@endif
	@else 
		<div class="alert alert-danger">
			belum menjawab			
		</div>
	@endif
 
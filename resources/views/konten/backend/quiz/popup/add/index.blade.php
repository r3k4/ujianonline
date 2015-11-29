


<div class="row">
	<div class="col-md-12">

	<div id="pesan"></div>


	<div class="col-md-6">
		<div class="form-group">
			{!! Form::label('nama', 'Judul Topik :') !!}
			{!! Form::text('nama', '', ['id' => 'nama', 'class' => 'form-control', 'placeholder' => 'topik soal...']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('waktu_pengerjaan', 'Waktu Pengerjaan : ') !!} 
			<i class='fa fa-question-circle' data-toggle='tooltip' title='dalam menit'></i>
			{!! Form::text('waktu_pengerjaan', '', ['id' => 'waktu_pengerjaan', 'class' => 'form-control', 'placeholder' => 'waktu pengerjaan...']) !!}
		</div>

		<div class="form-group">
			{!! Form::label('ref_kelas_id', 'Kelas : ') !!} 
			{!! Form::select('ref_kelas_id',  $kelas, '', ['id' => 'ref_kelas_id', 'class' => 'form-control']) !!}
		</div>
		<div class="form-group">
			{!! Form::label('ref_tingkat_kesulitan_soal_id', 'Tingkat Kesulitan Soal : ') !!} 
			{!! Form::select('ref_tingkat_kesulitan_soal_id',  $tingkat_kesulitan, '', ['id' => 'ref_tingkat_kesulitan_soal_id', 'class' => 'form-control']) !!}
		</div>		
	</div>

	<div class="col-md-6">
		<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('is_jawaban_acak', 'Acak Jawaban ? ') !!} 
				{!! Form::select('is_jawaban_acak', [1 => 'acak', 0 => 'tidak acak'], 1, ['id' => 'is_jawaban_acak', 'class' => 'form-control']) !!}
			</div>			
			</div>
			<div class="col-md-6">
			<div class="form-group">
				{!! Form::label('is_soal_acak', 'Acak Soal ? ') !!} 
				{!! Form::select('is_soal_acak', [1 => 'acak', 0 => 'tidak acak'], 1, ['id' => 'is_soal_acak', 'class' => 'form-control']) !!}
			</div>			
		</div>
		<div class="form-group">
			{!! Form::label('keterangan', 'Deskripsi topik soal : ') !!}
			{!! Form::textarea('keterangan',  '', ['id' => 'keterangan', 'class' => 'form-control', 'style' => 'height:200px;', 'placeholder' => 'deskripsi topik soal...']) !!}
		</div>			
	</div>









		<div class="form-group">
		<button id='simpan' class='btn btn-info'><i class='fa fa-floppy-o'></i> SIMPAN</button>
		</div>



	</div>
</div>

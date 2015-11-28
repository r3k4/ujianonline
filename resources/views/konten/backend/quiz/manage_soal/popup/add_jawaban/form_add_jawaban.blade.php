<div class="row">
	<div class="col-md-12">
<hr>
@if(Session::has('pesan_sukses'))
	<div class="alert alert-success alert-dismissible" role="alert">
		 <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>	
		{!! Session::get('pesan_sukses') !!}
	</div>
@endif

			{!! $soal->soal !!}
			<hr>

		<div style="display: none;" id="form_tambah_jawaban">
			<div id="pesan"></div>

			<div class="form-group">
				{!! Form::label('jawaban', 'Isi Konten Soal : ') !!}
				{!! Form::text('jawaban', '', ['class' => 'form-control', 'placeholder' => 'jawaban soal...']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('is_benar', 'Benar/Salah : ') !!}
				{!! Form::select('is_benar', [1 => 'benar', 0 => 'salah'], 0, ['class' => 'form-control', 'id' => 'is_benar']) !!}
			</div>
			<div class="form-group">
				<button id='simpan' class='btn btn-info'><i class='fa fa-floppy-o'></i> SIMPAN</button>
				<button id='cancel' class='btn btn-danger'><i class='fa fa-times'></i> BATAL</button>
			</div>			
		</div>

		<button class="btn btn-info" id="create_jawaban">
			create jawaban
		</button>
	</div>
</div>

 @include($base_view.'manage_soal.popup.add_jawaban.list_data_jawaban')


@include($base_view.'manage_soal.popup.add_jawaban.script_add_jawaban')


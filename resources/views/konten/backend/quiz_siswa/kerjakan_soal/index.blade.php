@extends('layouts.backend')
@section('main')

	
	@include($base_view.'kerjakan_soal.komponen.tombol_back')
	@include($base_view.'kerjakan_soal.komponen.header')

	@if(count($pengerjaan_soal)>0)
		@if($pengerjaan_soal->waktu_selesai != null)
		 <div class="alert alert-danger">
			anda sudah pernah mengerjakan tugas ini. 	
		 </div>
		@else
			@include($base_view.'kerjakan_soal.script')
		@endif
	@else
			@include($base_view.'kerjakan_soal.script')		
	@endif


@endsection
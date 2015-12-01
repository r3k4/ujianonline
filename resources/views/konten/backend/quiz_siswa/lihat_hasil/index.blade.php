@extends('layouts.backend')
@section('main')

	@include($base_view.'kerjakan_soal.komponen.tombol_back')

	<h3 style="margin-top:0px;" class="text_header animated fadeInDown"> 
		<i class='fa fa-th-list'></i> Hasil Pengerjaan Tugas / Soal 
	</h3>
	<hr style="margin-top:0px;">

@include($base_view.'lihat_hasil_nilai.komponen.nav_atas')

<hr>

@include($base_view.'lihat_hasil.list_data')


@endsection
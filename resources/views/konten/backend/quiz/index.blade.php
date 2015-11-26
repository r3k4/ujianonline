@extends('layouts.backend')

@section('main')


	@include($base_view.'komponen.tombol_add')

	<h3> 
		<i class='fa fa-check-square-o'></i> Daftar Topik Quiz Ujian
	</h3>
	<hr>

	@include($base_view.'list_data')


	
</div>


@endsection
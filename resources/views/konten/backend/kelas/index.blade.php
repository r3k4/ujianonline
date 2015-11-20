@extends('layouts.backend')
@section('main')




	@include($base_view.'komponen.tombol_add')
	<h3 style="margin-top:0px;" class="text_header" > 
		<i class='fa fa-th'></i> Kelas
	</h3>
	<hr>




	<div >
		@include($base_view.'list_data')	
	</div>

@endsection
@extends('layouts.backend')
@section('main')



@include($base_view.'komponen.tombol_ikut_kelas')

	<h3 style="margin-top:0px;" class="text_header" > 
		<i class='fa fa-th'></i> Kelas saya 
			<i style='font-size: 12px;' data-toggle='tooltip' title='kelas yang saya ikuti' class="fa fa-question-circle"></i>
	</h3>
	<hr>

 
	<div >
		@include($base_view.'list_data')	
	</div>

@endsection
@extends('layouts.backend')
@section('main')

	<h4 style="margin-top:0px;" class="text_header animated fadeInDown"> 
		<i class='fa fa-th-list'></i> Kerjakan Soal
	</h4>
	<hr style="margin-top:0px;">

 


	@if(count($pengerjaan_soal)>0)
	 <div class="alert alert-danger">
		anda sudah pernah mengerjakan tugas ini. 	
	 </div>
	@else
		@include($base_view.'kerjakan_soal.script')
	@endif

@endsection
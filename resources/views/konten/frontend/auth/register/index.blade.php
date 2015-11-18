@extends('layouts.frontend')
@section('main')

<div class="row">
	<h1 class="animated fadeInDown header_text">
			<i class='fa fa-user'></i> Pendaftaran User	
	</h1>	
</div>

<hr>

<div class="row">
	<div class="col-md-6">
		@include($base_view.'register.form_register')		
	</div>
	<div class="col-md-6">
		@include($base_view.'register.info')			
	</div>
	
</div>


@endsection
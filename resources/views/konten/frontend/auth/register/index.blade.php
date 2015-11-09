@extends('layouts.frontend')
@section('main')

<div class="row">
	<h1 class="animated fadeInDown">
		<span class='pull-right'>
			<i class='fa fa-user'></i> Pendaftaran User	
		</span>
	</h1>	
</div>

<hr>

<div class="row">
	<div class="col-md-6">
		@include($base_view.'register.info')
	</div>
	<div class="col-md-6">
		@include($base_view.'register.form_register')		
	</div>
	
</div>


@endsection
@extends('layouts.frontend')
@section('main')


<h1 class="animated fadeInDown">
	<i class='fa fa-user'></i> Pendaftaran User
</h1>
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
@extends('layouts.backend')

@section('main')
<h3 class="animated fadeInDown"> <i class='fa fa-cogs'></i> My Profile</h3>
<hr>


<div class="row">
	<div class="col-md-6">
		@include($base_view.'form_profile_kiri')		
	</div>
	<div class="col-md-6">
		@include($base_view.'form_profile_kanan')
	</div>
</div>



@endsection
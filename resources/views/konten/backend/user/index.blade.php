@extends('layouts.backend')

@section('main')

	@include($base_view.'komponen.form_search')

<h3 class="animated fadeInDown"> 
	<i class='fa fa-users'></i> Daftar Pengguna
</h3>
<hr>

	@include($base_view.'list_data')




@endsection
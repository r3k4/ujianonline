@extends('layouts.backend')
@section('main')

<h3 style="margin-top:0px;" class="text_header animated fadeInDown"> 
	<i class='fa fa-home'></i> Dashboard
</h3>
<hr style="margin-top:0px;">


<div class="col-md-8">
	@include($base_view.'biodata')	
</div>



@endsection
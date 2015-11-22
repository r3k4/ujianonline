@extends('layouts.backend')
@section('main')




<ol class="breadcrumb">
  <li>
		<a href="{!! route('backend.kelas.index') !!}">
			<i class='fa fa-th'></i> Kelas 	
		</a>
  </li>
  <li>
	 {!! $kelas->nama !!}
  </li>
</ol>
	<hr>


 @include($base_view.'siswa_kelas.list_data')

 

@endsection
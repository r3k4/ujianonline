@extends('layouts.backend')
@section('main')

 

	<ol class="breadcrumb">
	  <li><a href="{!! route('backend.quiz_siswa.index') !!}"><i class='fa fa-th-list'></i> Tugas / Quiz</a></li>
	  <li class="active">{!! $kelas->nama !!}</li>
	</ol>

	@include($base_view.'quiz.list_data')

@endsection
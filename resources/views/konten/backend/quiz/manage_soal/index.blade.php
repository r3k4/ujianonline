@extends('layouts.backend')

@section('main')


	<ol class="breadcrumb">
	  <li><a href="{!! route('backend.quiz.index') !!}">Daftar Topik Quiz Ujian</a></li>
	  <li class="active">{!! $topik->nama !!}</li>
	</ol>
	<hr>

	@include($base_view.'manage_soal.list_data')




@endsection
@extends('layouts.backend')
@section('main')

 

	<ol class="breadcrumb">
	  <li><a href="{!! route('backend.quiz_siswa.index') !!}"><i class='fa fa-th-list'></i> Tugas / Quiz</a></li>
	  <li class="active">{!! $kelas->nama !!}</li>
	</ol>
 

<script type="text/javascript">
function update_waktu_pengerjaan(value, mst_topik_soal_id){
	form_data = { 
				value : value,
				mst_topik_soal_id : mst_topik_soal_id,
				_token : '{!! csrf_token() !!}'
				}
	$.ajax({
		url : '{!! route("backend.quiz_siswa.update_timer_soal") !!}',
		type : 'post',
		data : form_data,
		error:function(err){
			swal('error', 'terjadi kesalahan pada sisi server!', 'error');
		},
		success: function(ok){

		}
	})
}	
	
</script>


	@include($base_view.'quiz.list_data')

@endsection
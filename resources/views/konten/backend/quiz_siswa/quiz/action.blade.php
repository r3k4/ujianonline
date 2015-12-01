@if(count($list->mst_pengerjaan_soal)<=0)
	@include($base_view.'quiz.action.kerjakan_soal')
@else
	@include($base_view.'quiz.action.lihat_hasil_pengerjaan')	
@endif
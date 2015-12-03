@include($base_view.'quiz.action.view_detail_topik')	

|| 

@if(count($list->mst_pengerjaan_soal()->where('mst_user_id', '=', \Auth::user()->id)->first() )<=0)
	@include($base_view.'quiz.action.kerjakan_soal')
@else
	@include($base_view.'quiz.action.lihat_hasil_pengerjaan')	
@endif
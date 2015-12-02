<div role="tabpanel" class="tab-pane fade @if($no == 1) in active @endif " id="soal{!! $no !!}"> 
	<h4>{!! $no.'. '.$list->soal !!}</h4> 

<ul style="margin-left:2em;" class="list-unstyled">
	<?php 
	$i=1; 
	if($topik_soal->is_jawaban_acak){
		$all_jawaban = $list->mst_jawaban_soal()->orderByRaw("RAND()")->get();
	}else{
		$all_jawaban = $list->mst_jawaban_soal()->orderBy("id", 'DESC')->get();
	}
	?>



	@foreach($all_jawaban as $list_jawaban)
		<li>  
			@include($base_view.'kerjakan_soal.list_soal.checkbox_jawaban')
			{!! $fungsi->toAlpha($i).'. '.$list_jawaban->jawaban !!} 
		</li>
		<?php $i++; ?>
	@endforeach
</ul>

	<hr>
</div>

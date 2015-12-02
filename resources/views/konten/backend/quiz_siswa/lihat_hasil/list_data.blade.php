
<?php $i = $soal->firstItem(); ?>

<ol start="{!! $i !!}">
	
	 @foreach($soal as $list)

	<li style="font-size:15px">
		{!! $list->soal !!} 
	</li>
	 <br> 
	 	<ul class="list-unstyled" style="margin-left : 2em;">
	 	<?php $no=1; ?>
			@foreach($list->mst_jawaban_soal as $list_jawaban)
				<li @if($list_jawaban->is_benar == 1) class="text-success"  @endif >
					{!! $fungsi->toAlpha($no).'. '.$list_jawaban->jawaban !!}
				</li> 
				<?php $no++; ?>
			@endforeach 		
	 	</ul>

	<div class="row">
		<div class="  col-md-6">
			@include($base_view.'lihat_hasil.komponen.jawaban_terpilih')		
		</div>
	</div>


	 <hr>
	<?php $i++; ?>
	 @endforeach
</ol>


 {!! $soal->render() !!}
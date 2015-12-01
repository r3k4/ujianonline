
<?php $i = $soal->firstItem(); ?>
 @foreach($soal as $list)

 {!! $i.'. '.$list->soal !!} 
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

@include($base_view.'lihat_hasil.komponen.jawaban_terpilih')



 <hr>
<?php $i++; ?>
 @endforeach


 {!! $soal->render() !!}
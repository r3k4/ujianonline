<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="15px" class="text-center">No.</th>
			<th>Nama Topik Quiz</th>
			<th> <i class='fa fa-clock-o'></i> Durasi</th>
			<th class="text-center" width="180px"> Tingkat Kesulitan </th>
			<th width="90px" class="text-center">Jml Soal</th>
			<th width="80px" class="text-center">
				Action
			</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = $topik_soal->firstItem(); ?>
@foreach($topik_soal as $list)
		<tr>
			<td class="text-center">{!! $no !!}</td>
			<td>{!! $list->nama !!}</td>
			<td>{!! $list->waktu_pengerjaan !!} menit</td>
			<td class="text-center">
				{!! $list->ref_tingkat_kesulitan_soal->nama !!}
			</td>
			<td class="text-center">
				{!! count($list->mst_soal) !!}
			</td>
			<td class="text-center">
				@include($base_view.'quiz.action')
			</td>
		</tr>
		<?php $no++; ?>
@endforeach
	</tbody>
</table>
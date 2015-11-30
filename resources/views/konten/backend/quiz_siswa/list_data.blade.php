<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="15px" class="text-center">No.</th>
			<th>Kelas</th>
			<th>Pengajar</th>
			<th width="120px" class="text-center">Jumlah Quiz</th>
			<th class="text-center" width="80px">action</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = $kelas_user->firstItem(); ?>
	@foreach($kelas_user as $list)
		<tr>
			<td class="text-center">{!! $no !!}</td>
			<td>{!! $list->ref_kelas->nama !!}</td>
			<td>{!! $list->ref_kelas->mst_user->nama !!}</td>
			<td class="text-center">
				<span class='label label-success'>
					{!! count($list->ref_kelas->mst_topik_soal) !!}
				</span>
			</td>
			<td class="text-center">
				@include($base_view.'action')
			</td>
		</tr>
		<?php $no++; ?>
	@endforeach
	</tbody>
</table>


{!! $kelas_user->render() !!}
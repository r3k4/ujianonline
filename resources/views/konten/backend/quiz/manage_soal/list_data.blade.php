<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="15px">No.</th>
			<th>Isi Soal</th>
			<th width="50px" class="text-center">
				<span data-toggle='tooltip' title='jumlah jawaban soal'>
					Jawaban					
				</span>
			</th>
			<th width="100px" class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = $soal->firstItem(); ?>
		@foreach($soal as $list)
			<tr>
				<td class="text-center">
					{!! $no !!}
				</td>
				<td>
					{!! $list->soal !!}
				</td>
				<td class="text-center">
					<span class='label label-success'>
						{!! count($list->mst_jawaban_soal) !!}
					</span>					
				</td>
				<td class="text-center">
					@include($base_view.'manage_soal.action.add_jawaban')
				</td>
			</tr>
			<?php $no++; ?>
		@endforeach
	</tbody>
</table> 


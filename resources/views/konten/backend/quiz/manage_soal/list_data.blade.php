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
	<?php $no = $q_soal->firstItem(); ?>
		@foreach($q_soal as $list)
			<tr
			@if($soal->is_soal_bermasalah($list->id) == 1)
				class="text-danger" data-toggle='tooltip' title='belum ada kunci jawaban yg diberikan pada soal ini'
			@endif

			>
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
					@include($base_view.'manage_soal.action.delete')
					@include($base_view.'manage_soal.action.add_jawaban')
					@include($base_view.'manage_soal.action.edit')
				</td>
			</tr>
			<?php $no++; ?>
		@endforeach
	</tbody>
</table> 

{!! $q_soal->render() !!}
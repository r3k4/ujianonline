<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="15px">No.</th>
			<th>Isi Soal</th>
			<th width="150px">Action</th>
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
					-
				</td>
			</tr>
			<?php $no++; ?>
		@endforeach
	</tbody>
</table> 


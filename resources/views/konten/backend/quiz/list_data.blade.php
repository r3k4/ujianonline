<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="15px"> No.</th>
			<th>Topik Quiz Soal</th>
			<th>Kelas</th>
			<th width="100px" class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = $topik_quiz->firstItem(); ?>
	@foreach($topik_quiz as $list)
		<tr>
			<td class="text-center">
				{!! $no !!}
			</td>
			<td>
				{!! $list->nama !!}
			</td>
			<td>
				{!! $list->ref_kelas->nama !!}
			</td>
			<td class="text-center">
				@include($base_view.'action.edit')
				|| 
				@include($base_view.'action.view_detail')
				||
				@include($base_view.'action.manage_soal')
			</td>
		</tr>
		<?php $no++; ?>
	@endforeach
	</tbody>
</table>
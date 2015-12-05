<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="15px"> No.</th>
			<th>Topik Quiz Soal</th>
			<th>Kelas</th>
			<th class="text-center" width="100px">Jml Soal</th>
			<th width="160px" class="text-center">Action</th>
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
				@if(count($list->ref_kelas)>0) 
					{!! $list->ref_kelas->nama !!}
				@else 
					<span data-toggle='tooltip' title='tdk ada relasi kelas' class='text-danger'>error!</span>
				@endif
			</td> 
			<td class="text-center">
				<span class='label label-success'>{!! count($list->mst_soal) !!}</span>
			</td>
			<td class="text-center">
				@include($base_view.'action.view_nilai_siswa')
				||

				@include($base_view.'action.edit')
				|| 
				@include($base_view.'action.view_detail')
				||
				@include($base_view.'action.manage_soal') 

				||
				@include($base_view.'action.delete')
			</td>
		</tr>
		<?php $no++; ?>
	@endforeach
	</tbody>
</table>


{!! $topik_quiz->render() !!}
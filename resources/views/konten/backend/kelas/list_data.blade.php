<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="10px">No.</th>
			<th>Nama Kelas</th>
			<th width="150px">Kode Kelas</th>
			<th width="150px">Mata Pelajaran</th>
			<th width="100px" class="text-center">Jml Siswa</th>
			<th width="100px" class="text-center">Status</th>
			<th width="150px" class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = $kelas->firstItem(); ?>
@foreach($kelas as $list)
		<tr>
			<td class="text-center">{!! $no !!}</td>
			<td>{!! $list->nama !!}</td>
			<td>{!! $list->kode_kelas !!}</td>
			<td>
				@if(count($list->ref_mapel)>0)
					{!! $list->ref_mapel->nama !!}
				@else 
					<span data-toggle='tooltip' title='tidak ada relasi' class='text-danger'>error!</span>
				@endif
			</td>
			<td class="text-center">
				<span class="label label-success"> 
					{!! count($list->mst_kelas_user) !!}
				</span>
			</td>
			<td class="text-center">
				@if($list->is_open == 1)
					<span class='text-success'>open</span>
				@else 
					<span class='text-danger'>closed</span>
				@endif
			</td>
			<td class="text-center">
				@include($base_view.'action')
			</td>
		</tr>
		<?php $no++; ?>
@endforeach

	</tbody>
</table>
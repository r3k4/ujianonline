<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="10px">No.</th>
			<th>Nama Kelas</th>
			<th>Nama Pengajar</th>
			<th>Mata Pelajaran</th>
			<th width="100px">Status</th>
			<th width="100px" class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php

	$no = $kelas_user->firstItem();

	 ?>
@foreach($kelas_user as $list)
		<tr>
			<td class="text-center">
				{!! $no !!}
			</td>
			<td>
				@if(count($list->ref_kelas)>0)
					{!! $list->ref_kelas->nama !!}
				@else 
					-
				@endif
			</td>
			<td>
				@if(count($list->ref_kelas)>0)

					@if(count($list->ref_kelas->mst_user)>0)
						{!! $list->ref_kelas->mst_user->nama !!}
					@else 
						- 
					@endif
				@else 
					-
				@endif				
			</td>
			<td>
				@if(count($list->ref_kelas)>0)

					@if(count($list->ref_kelas->ref_mapel)>0)
						{!! $list->ref_kelas->ref_mapel->nama !!}
					@else 
						- 
					@endif
				@else 
					-
				@endif					

			</td>
			<td>
				@if($list->is_aktif == 1)
					<span class='label label-success'>aktif</span>
				@else 
					<span class='label label-warning'>
						belum aktif <i class='fa fa-question-circle' data-toggle='tooltip' title='masih menunggu konfirmasi dari pengajar..'></i> 
					</span>
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

{!! $kelas_user->render() !!}
<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="15px" class="text-center">No.</th>
			<th>Nama Pengajar</th>
			<th>Mapel 
			<i class='fa fa-question-circle' data-toggle='tooltip' title='mata pelajaran yg diajarkan'></i>
			 </th>
			<th>Kelas</th>
			<th width="80px" class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $no=$kelas_user->firstItem(); ?>
@foreach($kelas_user as $list)
		<tr>
			<td class="text-center">{!! $no !!}</td>
			<td>
				@if(count($list->ref_kelas)>0)
					{!! $list->ref_kelas->mst_user->nama !!}
				@else 
					-
				@endif
			</td>
			<td>
				@if(count($list->ref_kelas)>0)
					{!! $list->ref_kelas->ref_mapel->nama !!}
				@else 
					-
				@endif				
			</td>
			<td>
				@if(count($list->ref_kelas)>0)
					{!! $list->ref_kelas->nama !!}
				@else 
					-
				@endif				
			</td>
			<td class="text-center">
				@include($base_view.'action.view_siswa')
			</td>
		</tr>
		<?php $no++; ?>
@endforeach
	</tbody>
</table>


{!! $kelas_user->render() !!}

 
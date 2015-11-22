<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="10px">No.</th>
			<th>Nama Siswa</th>
			<th width="150px">Jenis Kelamin</th>
			<th width="100px">Status</th>
			<th width="100px" class="text-center"> Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; ?>
		@foreach($kelas->mst_kelas_user as $list)
			<tr>
				<td class="text-center">{!! $no !!}</td>
				<td>
					@if(count($list->mst_user)>0)
						{!! $list->mst_user->nama !!}
					@else 
						-
					@endif
				</td>
				<td>
					@if(count($list->mst_user)>0)
						@if(count($list->mst_user->data_user)>0)
							@if($list->mst_user->data_user->jenis_kelamin == 'L')
								Laki-laki
							@else 
								Perempuan
							@endif
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
						<span class='label label-warning'>pending...</span>
					@endif
				</td>
				<td>
					@include($base_view.'siswa_kelas.action')
				</td>
			</tr>
			<?php $no++; ?>
		@endforeach
	</tbody>
</table>
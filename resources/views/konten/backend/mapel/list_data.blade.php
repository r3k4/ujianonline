<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="5px" class="text-center">No.</th>
			<th>Nama</th>
			<th>Keterangan</th>
			<th width="100px" class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $no=1; ?>
@foreach($mapel as $list)
		<tr>
			<td class="text-center">{!! $no !!}</td>
			<td>{!! $list->nama !!}</td>
			<td>{!! $list->keterangan !!}</td>
			<td  class="text-center">
				@include($base_view.'action')
			</td>
		</tr>
		<?php $no++; ?>
@endforeach
	</tbody>
</table>


{!! $mapel->appends(['search' => Request::get('search')])->render() !!}
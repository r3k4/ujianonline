<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="5px" class="text-center">No.</th>
			<th>Nama</th>
			<th>Email</th>
			<th width="100px" class="text-center">Level</th>
			<th width="100px" class="text-center">Status</th>
			<th width="100px" class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $no=1; ?>
@foreach($users as $list)
		<tr>
			<td class="text-center">{!! $no !!}</td>
			<td>{!! $list->nama !!}</td>
			<td>{!! $list->email !!}</td>
			<td class="text-center"> {!! $list->ref_user_level->nama !!} </td>
			<td class="text-center">
				@if($list->aktif == 1)
					<span class="label label-success">aktif</span>
				@else 
					<span class="label label-danger">tidak aktif</span>
				@endif
			</td>
			<td  class="text-center">
				@include($base_view.'action')
			</td>
		</tr>
		<?php $no++; ?>
@endforeach
	</tbody>
</table>


{!! $users->appends(['search' => Request::get('search')])->render() !!}
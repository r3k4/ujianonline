<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

<i class='fa fa-question-circle pull-right' data-toggle='tooltip' title='daftar siswa yg mengikuti kelas ini'></i>
<h3>
	Daftar Siswa  
</h3>


<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="15px">No.</th>
			<th>Nama</th>
			<th width="80px">
			<span data-toggle='tooltip' title='jenis kelamin'>
				<i class="fa fa-female"></i> / <i class="fa fa-male"></i>
			</span>

			</th>
			<th width="80px">Action</th>
		</tr>
	</thead>
	<tbody>
<?php $no=1; ?>
@foreach($kelas_user as $list)
		<tr>
			<td>
				{!! $no !!}
			</td>
			<td>
				{!! $list->mst_user->nama !!}
			</td>
			<td>
				@if($list->mst_user->data_user->jenis_kelamin == 'L')
					Laki-laki
				@else 
					Perempuan
				@endif
			</td>
			<td class="text-center">
				@include($base_view.'popup.action')
			</td>
		</tr>	
<?php $no++; ?> 
@endforeach


	</tbody>
</table>
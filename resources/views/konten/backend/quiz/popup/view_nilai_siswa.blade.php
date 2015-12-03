<h3>Daftar Nilai Siswa</h3>
<hr>


<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th width="15px" class="text-center">No.</th>
			<th>Nama Siswa</th>
			<th width="100px">Jwb Benar</th>
			<th width="50px">Nilai</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = 1; ?>
		@foreach($kelas_user as $list)
		<?php 
			$total_jawaban_benar = $jawaban_siswa->total_jawaban_benar($list->mst_user->id, Request::segment(5));
		?>
			<tr>
				<td class="text-center">{!! $no++ !!}</td>
				<td>{!! $list->mst_user->nama !!}</td>
				<td class="text-center">
					<span class='label label-success'>
						{!! $total_jawaban_benar !!}
					</span> 
				</td>
				<td>
					<span class='label label-success'>
						@if($total_jawaban_benar > 0 )
							{!! $fungsi->edit_angka($total_jawaban_benar * 100 / count($topik->mst_soal)) !!}
						@else 
							0 
						@endif							
					</span>
				</td>
			</tr>
 		@endforeach	
	</tbody>
</table>


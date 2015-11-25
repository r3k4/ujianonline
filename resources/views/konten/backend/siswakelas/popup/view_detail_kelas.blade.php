<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>
<h3>Detail Kelas</h3>
<hr>





<div class="row">
 
<div class="col-md-10">
	<table class="table table-bordered table-hover">
 			<tr>
				<td width="150px">Mata Pelajaran</td>
				<td>{!! $kelas_user->ref_kelas->ref_mapel->nama !!}</td>
			</tr>
			<tr>
				<td>Pengajar</td>
				<td>
					{!! $kelas_user->ref_kelas->mst_user->nama !!}
				</td>
			</tr>
 			<tr>
				<td>Nama Kelas</td>
				<td>{!! $kelas_user->ref_kelas->nama !!}</td>
			</tr>
 			<tr>
				<td>Status</td>
				<td>
					@if($kelas_user->ref_kelas->is_open == 1)
						<span class='text-success'>open</span>
					@else 
						<span class='text-danger'>closed</span>
					@endif
				</td>
			</tr>
 			<tr>
				<td>Kode Kelas</td>
				<td>{!! $kelas_user->ref_kelas->kode_kelas !!}</td>
			</tr>
 			<tr>
				<td>Jumlah Siswa</td>
				<td>{!! count($kelas_user) !!}</td>
			</tr>

 			<tr>
				<td>Keterangan</td>
				<td>{!! $kelas_user->ref_kelas->keterangan !!}</td>
			</tr>


 	</table>
</div>



</div>
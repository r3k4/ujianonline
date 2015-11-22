<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

<button id="edit" class="btn btn-info pull-right">
	<i class="fa fa-pencil-square"></i> edit
</button>


<h3>Detail Kelas</h3>
<hr>
 

<table class="table table-bordered table-hover">
		<tr>
			<td width="150px">Nama Kelas</td>
			<td>{!! $kelas->nama !!}</td>
		</tr>
 
		<tr>
			<td>Kode Kelas</td>
			<td>{!! $kelas->kode_kelas !!}</td>
		</tr>

		<tr>
			<td>Mata Pelajaran</td>
			<td> 
				@if(count($kelas->ref_mapel)>0)
					{!! $kelas->ref_mapel->nama !!}
				@else 
					-
				@endif
			</td>
		</tr>

		<tr>
			<td>Status</td>
			<td>
				@if($kelas->is_open == 1) 
					<span class='label label-success'>open</span>
				@else 
					<span class='label label-danger'>closed</span>
				@endif
			</td>
		</tr>



		<tr>
			<td>
			Jumlah Siswa 
				<i 
					class='fa fa-question-circle' 
					data-toggle='tooltip' 
					title='jumlah siswa yg mengikuti kelas ini'
				></i> 
			</td>
			<td>
				<span class="label label-success"> 
					{!! count($kelas->mst_kelas_user) !!}
				</span>
			</td>
		</tr>

		<tr>
			<td>Keterangan</td>
			<td>{!! $kelas->keterangan !!}</td>
		</tr>


 </table>


<script type="text/javascript">
	$('#edit').click(function(){
		$('.modal-body').load('{!! route("backend.kelas.edit", $kelas->id) !!}')
	});
</script>
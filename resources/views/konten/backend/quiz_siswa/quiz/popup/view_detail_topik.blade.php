<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>
<h3>
	Topik Quiz Soal 
</h3>
<hr>


 <table class="table table-hover">
 		<tr>
 			<td width="200px">Judul Topik Soal</td>
 			<td>{!! $topik->nama !!}</td>
 		</tr>

 		<tr>
 			<td>Waktu Pengerjaan Soal</td>
 			<td> 
 				@if($topik->waktu_pengerjaan >= 60)
 					{!! date('H:i', mktime(0,$topik->waktu_pengerjaan)) !!} ( {!! $topik->waktu_pengerjaan !!} menit )
	 			@else 
	 				{!! $topik->waktu_pengerjaan !!} menit 
	 			@endif
 			</td>
 		</tr>

 		<tr>
 			<td>Pengajar </td>
 			<td>{!! $topik->mst_user->nama !!}</td>
 		</tr>

 		<tr>
 			<td>Kelas </td>
 			<td>{!! $topik->ref_kelas->nama !!}</td>
 		</tr>

 		<tr>
 			<td>Tingkat Kesulitan</td>
 			<td>{!! $topik->ref_tingkat_kesulitan_soal->nama !!}</td>
 		</tr>


 		<tr>
 			<td>Jawaban Acak ? </td>
 			<td> 
 				@if($topik->is_jawaban_acak == 1)  
 					<span class='label label-success'>Ya</span>
 				@else 
 					<span class='label label-danger'>Tidak</span>
 				@endif
 			 </td>
 		</tr>

 		<tr>
 			<td>Soal Acak ? </td>
 			<td> 
 				@if($topik->is_soal_acak == 1)  
 					<span class='label label-success'>Ya</span>
 				@else 
 					<span class='label label-danger'>Tidak</span>
 				@endif
 			 </td>
 		</tr>
 </table>
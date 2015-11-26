<button id="back" class="btn btn-info pull-right">
	<i class='fa fa-arrow-left'></i> back
</button>


<h3>
	<i class='fa fa-user'></i> Biodata Siswa
</h3>
<hr>


 <table class="table">
 	
 	<tr>
 		<td width="200px">
 			Nama
 		</td>
 		<td>
 			{!! $user->nama !!}
 		</td>
 	</tr>
 	<tr>
 		<td>
 			Email
 		</td>
 		<td>
 			{!! $user->email !!}
 		</td>
 	</tr>
 	<tr>
 		<td>
 			Tempat, Tgl Lahir
 		</td>
 		<td>
 			@if(count($user->data_user)>0)
 				{!! $user->data_user->tempat_lahir !!}, {!! $fungsi->date_to_tgl($user->data_user->tgl_lahir) !!}
 			@else 
 				-
 			@endif
 		</td>
 	</tr>
 	<tr>
 		<td>
 			Status
 		</td>
 		<td>
 			@if($user->aktif == 1)
 				<span class='text-success'>aktif</span>
 			@else 
 				<span>tidak aktif</span>
 			@endif
 		</td>
 	</tr>
 </table>







<script type="text/javascript">
	



	$('#back').click(function(){
		$('.modal-body').load('{!! route("backend.guru_siswa.daftar_siswa", Request::segment(4)) !!}')
	})
</script>

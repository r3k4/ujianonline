<div class="panel panel-info">
  <div class="panel-heading">Biodata User </div>
  <div class="panel-body">

<div class="col-md-12">
	<table class="table">
	<tr>
		<td colspan="2">
		  <img src="{{ Gravatar::src(Auth::user()->email, 100) }}" class='img-circle avatar center-block' alt='...' >  
		</td>
	</tr>
		<tr>
			<td width="130px">
				Nama
			</td>
			<td>
				{!! Auth::user()->nama !!}
			</td>
		</tr>


		<tr>
			<td>
				Email
			</td>
			<td>
				{!! Auth::user()->email !!}
			</td>
		</tr>

		<tr>
			<td>
				TTL 
			</td>
			<td>
				{!! Auth::user()->data_user->tempat_lahir !!}, 
				{!! $fungsi->date_to_tgl(Auth::user()->data_user->tgl_lahir) !!}
			</td>
		</tr>

		<tr>
			<td>
				Jenis Kelamin
			</td>
			<td>
				@if(Auth::user()->data_user->jenis_kelamin == 'L')
					Laki-laki
				@else 
					Perempuan
				@endif
			</td>
		</tr>
		<tr>
			<td>
				Status
			</td>
			<td>
				{!! Auth::user()->ref_user_level->nama !!}
			</td>
		</tr>
	</table>
	
</div>







  </div>
</div>





@extends('layouts.backend')
@section('main')

	@include($base_view.'kerjakan_soal.komponen.tombol_back')

	<h3 style="margin-top:0px;" class="text_header animated fadeInDown"> 
		<i class='fa fa-th-list'></i> Hasil Pengerjaan Tugas / Soal 
	</h3>
	<hr style="margin-top:0px;">

@include($base_view.'lihat_hasil_nilai.komponen.nav_atas')


<hr>



<div class="col-md-6">
	<table class="table table-bordered">
		<tr>
			<td>
				Jumlah Soal			
			</td>
			<td class="text-center">
				<span class='label label-success'>
					{!! count($soal) !!}					
				</span>
			</td>
		</tr>

		<tr>
			<td>
				Jumlah Jawaban Benar			
			</td>
			<td class="text-center">
				<span class='label label-success'>
					{!! $total_jawaban_benar !!}
				</span>
			</td>
		</tr>

		<tr>
			<td>
				Nilai yg diperoleh			
			</td>
			<td class="text-center">
				<span class='label label-success'> 
					@if($total_jawaban_benar > 0 )
						{!! $fungsi->edit_angka($total_jawaban_benar * 100 / count($soal)) !!}
					@else 
						0 
					@endif
				</span>
			</td>
		</tr>

	</table>	
</div>






@endsection
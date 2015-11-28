<script type="text/javascript">
	$(function () { $("[data-toggle='tooltip']").tooltip(); });
</script>

<hr>

<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th class="text-center" width="15px">-</th>
			<th>isi Jawaban</th>
			<th width="100px" class="text-center">
				<span data-toggle='tooltip' title='jawaban yg benar'>Benar ?</span> 
			</th>
			<th width="100px" class="text-center">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php $no = 1; ?>
@foreach($soal->mst_jawaban_soal as $list)
		<tr>
			<td class="text-center">{!! $fungsi->toAlpha($no) !!}</td>
			<td>{!! $list->jawaban !!}</td>
			<td class="text-center">
				@if($list->is_benar == 1)
					<span class='label label-success'>dipilih</span>
				@endif
			</td>
			<td class="text-center">
				@include($base_view.'manage_soal.popup.add_jawaban.action')
			</td>
		</tr>
		<?php $no++; ?>
@endforeach
	</tbody>
</table>


 
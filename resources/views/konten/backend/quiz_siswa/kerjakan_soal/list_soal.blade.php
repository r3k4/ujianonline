<script type="text/javascript">
	function submit_jawaban(mst_soal_id, mst_jawaban_soal_id){
		form_data = {
			mst_soal_id : mst_soal_id,
			mst_jawaban_soal_id : mst_jawaban_soal_id,
			_token : '{!! csrf_token() !!}'
		}
		$.ajax({
			url : '{!! route("backend.quiz_siswa.submit_jawaban") !!}',
			data : form_data,
			type : 'post',
			error:function(err){
				swal('error', 'terjadi kesalahan pada sisi server!', 'error');
			},
			success:function(ok){

			}
		})
	}

 

$(function(){
    $('#nomor_soal').slimScroll({
        height: '400px',
        width : '80px',

    });
});
</script>



<div>
<div class="row">

	<div class="col-md-2" >
		<div id="nomor_soal">
		  <ul class="nav nav-pills nav-stacked" role="tablist">
		  <?php $no=1; ?>
			@foreach($soal as $list)
				    <li role="presentation" @if($no == 1) class="active" @endif >
				    	<a href="#soal{!! $no !!}" aria-controls="soal{!! $no !!}" role="tab" data-toggle="tab">
				    		{!! $no !!}
				    	</a>
				    </li>
					<?php $no++; ?>
			@endforeach
		  </ul>		
		</div>
	</div>
 
	<div class="col-md-10">
		 <!-- Tab panes -->
		  <div class="tab-content">
		  <?php $no=1; ?>
		@foreach($soal as $list)		  	
			@include($base_view.'kerjakan_soal.list_soal.detail_soal')
		<?php $no++; ?>
		@endforeach
		  </div>
		
	</div>
</div>

</div>
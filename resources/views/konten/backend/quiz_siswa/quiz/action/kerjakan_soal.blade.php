
	<a data-toggle='tooltip' 
	   title='mulai mengerjakan' 
	   href="{!! route('backend.quiz_siswa.kerjakan_soal', $list->id) !!}"
	   id="kerjakan{!! $list->id !!}" 
	   >
		<i class="fa fa-plug" id='mulai{!! $list->id !!}'></i>
	</a>
	 

	<script type="text/javascript">

		$('#kerjakan{!! $list->id !!}').click(function(){
			// if()
			swal({
				title : 'are you sure? ',
				text : 'waktu pengerjaan {!! $list->waktu_pengerjaan !!} menit dan tidak bisa dibatalkan',
				type : 'warning',
				showCancelButton: true,
				closeOnCancel: true,
				closeOnConfirm: false
			}, function(setuju){ 
				if(setuju){
					var waktu_pengerjaan = {!! $list->waktu_pengerjaan !!} * 60;
					update_waktu_pengerjaan(waktu_pengerjaan, {!! $list->id !!});
					swal({
						title : 'selamat mengerjakan !',
						type : 'success'
					}, function(){
						window.location.href = '{!! route("backend.quiz_siswa.kerjakan_soal", $list->id) !!}';
					});
				}
			});
			return false;
		});
	</script>
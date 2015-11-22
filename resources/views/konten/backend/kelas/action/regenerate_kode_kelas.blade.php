<a 
 	id='regenerate{{ $list->id }}'
	href="#"
	data-toggle='tooltip' 
	title='re-generate kode kelas' 
	>
<i class='fa fa-refresh'></i> regenerate
</a>

<script type="text/javascript">
	$('#regenerate{!! $list->id !!}').click(function(){
		setuju = confirm('are you sure?');
		if(setuju == true){
			$.ajax({
				url : '{{ route("backend.kelas.regenerate_kode_kelas") }}',
				data : {id : '{{ $list->id }}', _token : '{!! csrf_token() !!}' },
				type : 'post',
				error: function(err){
					alert('error! terjadi sesuatu pada sisi server!');
				},
				success:function(ok){
					window.location.reload();
				}
			})
			return false;
		}
	});
</script>



 
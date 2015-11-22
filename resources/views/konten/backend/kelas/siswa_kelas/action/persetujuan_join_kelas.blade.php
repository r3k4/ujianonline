<a 
	data-toggle='tooltip'
	title='persetujuan bergabung di dalam kelas'
	href="#"
	id="persetujuan{!! $list->id !!}" 
>
setujui
</a>

<script type="text/javascript">
	$('#persetujuan{!! $list->id !!}').click(function(){

	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ route("backend.kelas.do_join_kelas") }}',
			data : {id : '{{ $list->id }}', _token : '{!! csrf_token() !!}' },
			type : 'post',
			error: function(err){
				alert('error! terjadi sesuatu pada sisi server!');
			},
			success:function(ok){
				window.location.reload();
			}
		})
	}

		return false;
	});
</script>


 
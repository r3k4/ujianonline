<a 
	data-toggle='tooltip'
	title='hapus siswa dari kelas ini'
	href="#"
 	id='hapus_siswa{{ $list->id }}'
> 
	<i class='fa fa-times'></i> hapus siswa
</a>


<script type="text/javascript">
$('#hapus_siswa{{ $list->id }}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ route("backend.kelas.hapus_siswa_kelas") }}',
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
})
</script>

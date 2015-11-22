   
   	<a data-toggle='tooltip' title='hapus kelas' href="#" id='del{{ $list->id }}'>
		<i  class='fa fa-trash' style='cursor:pointer;'></i> hapus
   	</a> 
  





<script type="text/javascript">
$('#del{{ $list->id }}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ route("backend.kelas.delete") }}',
			data : {id : '{{ $list->id }}', _token : '{!! csrf_token() !!}' },
			type : 'post',
			error: function(err){
				alert('error! terjadi sesuatu pada sisi server!');
			},
			success:function(ok){
				window.location.reload();
			}
		});
		return false;
	}
})
</script>

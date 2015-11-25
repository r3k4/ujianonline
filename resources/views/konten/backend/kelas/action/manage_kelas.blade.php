<button 
	class="btn btn-link" 
	href="#"
	data-toggle='tooltip' 
	id='aktivasi{{ $list->id }}'
 >
	@if($list->is_open == 1)
		<i class='fa fa-times'></i> tutup kelas
	@else 
		<i class='fa fa-check'></i> buka kelas
	@endif
</button>



<script type="text/javascript">
$('#aktivasi{{ $list->id }}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ route("backend.kelas.aktivasi") }}',
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
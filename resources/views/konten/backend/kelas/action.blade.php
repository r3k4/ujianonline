
@if($list->is_open == 1)
	<i data-toggle='tooltip' title='tutup kelas' class='fa fa-times' style='cursor:pointer;' id='aktivasi{{ $list->id }}'></i>
@else 
	<i data-toggle='tooltip' title='buka kelas' class='fa fa-check' style='cursor:pointer;' id='aktivasi{{ $list->id }}'></i>
@endif


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
		})
	}
})
</script>

<i 
	class='fa fa-times'
	data-toggle='tooltip'
	title='berhenti/batalkan mengikuti kelas ini'
	id='stop{!! $list->id !!}'
	style='cursor:pointer;'
></i>


<script type="text/javascript">
$('#stop{{ $list->id }}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		$.ajax({
			url : '{{ route("backend.siswakelas.stop_kelas") }}',
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

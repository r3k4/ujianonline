@if($list->aktif == 0)
	<i
	 class="fa fa-check"
	 data-toggle='tooltip'
	 title='aktifkan'
	 id="aktif{!! $list->id !!}"
	 style='cursor: pointer;'
	 ></i>
||
<script type="text/javascript">
	
$('#aktif{!! $list->id !!}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		form_data = { 
			id 		: {!! $list->id !!}, 
			_token 	: '{!! csrf_token() !!}'
		}
		$.ajax({
			url : '{!! route("backend.user.aktivasi") !!}',
			data : form_data,
			type : 'post',
			error:function(err){
				alert('error! terjadi kesalahan pada sisi server!');
			},
			success:function(ok){
				window.location.reload();
			}
		})
	}
});

</script>


@endif
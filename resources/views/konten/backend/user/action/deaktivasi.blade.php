@if($list->aktif == 1 && $list->id != Auth::user()->id)
	<i
	 class="fa fa-times"
	 data-toggle='tooltip'
	 title='non-aktifkan'
	 id="nonaktif{!! $list->id !!}"
	 style='cursor: pointer;'
	 ></i>
||
<script type="text/javascript">
	
$('#nonaktif{!! $list->id !!}').click(function(){
	setuju = confirm('are you sure?');
	if(setuju == true){
		form_data = { 
			id 		: {!! $list->id !!}, 
			_token 	: '{!! csrf_token() !!}'
		}
		$.ajax({
			url : '{!! route("backend.user.deaktivasi") !!}',
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
@if(Auth::user()->id != $list->id)
	<i title='edit user'
	 	data-toggle='tooltip'
	 	class='fa fa-pencil-square'
	 	id='edit{!! $list->id !!}'
	 	style='cursor: pointer;'
	 ></i>  

	<script type="text/javascript">
	$('#edit{!! $list->id !!}').click(function(){
		$('#myModal').modal('show');
		$('.modal-body').load('{{ route("backend.user.edit", $list->id) }}');
	})
	</script>
@else
<a href="{!! route('backend.myprofile.index') !!}">
	<i title='edit my profile'
	 	data-toggle='tooltip'
	 	class='fa fa-pencil-square'
	 ></i> 	
</a>	

@endif
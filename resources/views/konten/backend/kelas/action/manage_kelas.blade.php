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


swal({   
	title: "Are you sure?",   
	type: "warning",   
	showCancelButton: true,   
	confirmButtonColor: "#DD6B55",   
	confirmButtonText: "yes!",   
	cancelButtonText: "cancel!",   
	closeOnConfirm: false,   
	closeOnCancel: true,
	showLoaderOnConfirm : true
}, function(isConfirm){   
	if (isConfirm) {     
   		$.ajax({
			url : '{{ route("backend.kelas.aktivasi") }}',
			data : {id : '{{ $list->id }}', _token : '{!! csrf_token() !!}' },
			type : 'post',
			error: function(err){
				alert('error! terjadi sesuatu pada sisi server!');
			},
			success:function(ok){
				swal({
					title : "updated!", 
					text : "status kelas telah ter-update.", 
					type : "success"					
				}, function(){
					window.location.reload();
				});				
				
			}
		});


	}

});



})
</script>
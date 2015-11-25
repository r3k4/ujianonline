<i 
	class='fa fa-times'
	data-toggle='tooltip'
	title='berhenti/batalkan mengikuti kelas ini'
	id='stop{!! $list->id !!}'
	style='cursor:pointer;'
></i>


<script type="text/javascript">
$('#stop{{ $list->id }}').click(function(){

swal({   
	title: "Are you sure?",   
	type: "warning",   
	showCancelButton: true,   
	confirmButtonColor: "#DD6B55",   
	confirmButtonText: "Yes, delete it!",   
	cancelButtonText: "No, cancel!",   
	showLoaderOnConfirm : true,
	closeOnConfirm: false,   
	closeOnCancel: true 
}, 
	function(isConfirm){   
		if (isConfirm) { 
		$.ajax({
			url : '{{ route("backend.siswakelas.stop_kelas") }}',
			data : {id : '{{ $list->id }}', _token : '{!! csrf_token() !!}' },
			type : 'post',
			error: function(err){
				alert('error! terjadi sesuatu pada sisi server!');
			},
			success:function(ok){
				swal({
					title : "Deleted!", 
					text : "Your data been deleted.", 
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



   
   	<button class="btn btn-link" data-toggle='tooltip' title='hapus kelas' href="#" id='del{{ $list->id }}'>
		<i  class='fa fa-trash' style='cursor:pointer;'></i> hapus
   	</button> 
  





<script type="text/javascript">
$('#del{{ $list->id }}').click(function(){

swal({   
	title: "Are you sure?",   
	type: "warning",   
	showCancelButton: true,   
	confirmButtonColor: "#D43E3E",   
	confirmButtonText: "Yes",   
	cancelButtonText: "cancel!",   
	showLoaderOnConfirm : true,
	closeOnConfirm: false,   
	closeOnCancel: true 
}, 
	function(isConfirm){   
		if (isConfirm) { 

			$.ajax({
				url : '{{ route("backend.kelas.delete") }}',
				data : {id : '{{ $list->id }}', _token : '{!! csrf_token() !!}' },
				type : 'post',
				error: function(err){
					swal("error, terjadi kesalahan pada sisi server!", null, "error");					
				},
				success:function(ok){
					swal({
						title : "success!",
						text : "data telah terhapus",
						type : 'warning'
					}, function(){
						window.location.reload();
					});
				}
			});

		} 

	}); //swal


})
</script>

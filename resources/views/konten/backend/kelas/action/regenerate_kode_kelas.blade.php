<button 
	class="btn btn-link" 
 	id='regenerate{{ $list->id }}'
	href="#"
	data-toggle='tooltip' 
	title='re-generate kode kelas' 
	>
<i class='fa fa-refresh'></i> regenerate
</button>

<script type="text/javascript">
	$('#regenerate{!! $list->id !!}').click(function(){


swal({   
	title: "Are you sure?",   
	type: "warning",   
	showCancelButton: true,   
	confirmButtonColor: "#048D57",   
	confirmButtonText: "Yes",   
	cancelButtonText: "cancel!",   
	showLoaderOnConfirm : true,
	closeOnConfirm: false,   
	closeOnCancel: true 
}, 
	function(isConfirm){   
		if (isConfirm) { 
			$.ajax({
				url : '{{ route("backend.kelas.regenerate_kode_kelas") }}',
				data : {id : '{{ $list->id }}', _token : '{!! csrf_token() !!}' },
				type : 'post',
				error: function(err){
					alert('error! terjadi sesuatu pada sisi server!');
				},
				success:function(ok){
					swal({
						title : 'cuccess!',
						text : 'data telah ter-generate',
						type : 'success'
					}, function(){
						window.location.reload();
					}); //swal
				}
			}); // end of ajax
		} 

	}); //swal


 
	});
</script>



 
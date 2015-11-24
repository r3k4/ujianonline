
<button class='btn btn-primary pull-right' id='ikut_kelas'> <i class='fa fa-plug'></i> ikut kelas</button>

<script type="text/javascript">
$('#ikut_kelas').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend.siswakelas.ikut_kelas") }}');
})
</script>

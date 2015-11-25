<i 
	data-toggle='tooltip'
	title='view daftar siswa'
	class='fa fa-users'
	id='view_siswa{!! $list->id !!}'
	style='cursor:pointer;'
></i> 

<script type="text/javascript">
$('#view_siswa{!! $list->id !!}').click(function(){
	$('#myModal').modal('show');
	$('.modal-body').load('{{ route("backend.guru_siswa.daftar_siswa", $list->ref_kelas->id) }}');
});
</script>

 <i 
 	data-toggle='tooltip'
 	title='biodata siswa'
 	class='fa fa-th'
 	id="biodata{!! $list->mst_user->id !!}"
 	style='cursor: pointer;'
 ></i>  

<script type="text/javascript">
$('#biodata{!! $list->mst_user->id !!}').click(function(){

	$('.modal-body').load('{{ route("backend.guru_siswa.biodata_siswa", [$list->ref_kelas->id, $list->mst_user->id]) }}');
})
</script>

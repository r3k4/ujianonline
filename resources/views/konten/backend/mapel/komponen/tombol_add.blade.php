<button 
	id="add" 
	class="btn btn-success pull-right"
	style="margin-left: 1em;" 
	>
	<i class='fa fa-plus-circle'></i> create new mapel
</button>

<script type="text/javascript">
	$('#add').click(function(){
		$('#myModal').modal('show');
		$('.modal-body').load('{!! route("backend.mapel.add") !!}')
	})
</script>
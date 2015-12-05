<input type="radio" 
	   name="jawaban_no{!! $list->id !!}" 
	   id="jawaban_no{!! $list_jawaban->id !!}" 
	   value="{!! $list_jawaban->id !!}" 
	   aria-label="..."
	   @if(count($list_jawaban->mst_jawaban_siswa()->where('mst_user_id', '=', \Auth::user()->id)->first())>0)
		   checked="true" 
	   @endif
>
 
 

<script type="text/javascript">

		$('#jawaban_no{!! $list_jawaban->id !!}').click(function(){
			submit_jawaban({!! $list->id !!}, {!! $list_jawaban->id !!});
		});
</script>
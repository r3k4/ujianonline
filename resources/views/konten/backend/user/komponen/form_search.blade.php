<form action="{!! route('backend.user.index') !!}" method="GET" class="form-inline pull-right" role="form">
	<div class="form-group">
		<label class="sr-only" for="">search</label>
		<input name="search" value="{!! Request::get('search') !!}" type="text" class="form-control"  placeholder="search by nama user...">
	</div>
	<button type="submit" class="btn btn-primary">
		<i class='fa fa-search'></i> search
	</button>
	@if(Request::get('search'))
		<a href="{!! route('backend.user.index') !!}" class="btn btn-danger">reset</a>
	@endif
</form>
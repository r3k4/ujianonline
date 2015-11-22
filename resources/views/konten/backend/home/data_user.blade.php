@if(Auth::user()->ref_user_level_id == 2)
	@include($base_view.'level.guru.index')
@endif
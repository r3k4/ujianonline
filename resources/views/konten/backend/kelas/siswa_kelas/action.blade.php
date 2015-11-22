 
<div class="dropdown">
  <a 
  	id="dLabel" 
  	data-target="#" 
  	href="http://example.com" 
  	data-toggle="dropdown" 
  	role="button" 
  	aria-haspopup="true" 
  	aria-expanded="false"
  	class="btn btn-primary" 
  	>
    Action 
    <span class="caret"></span>
  </a>

  <ul class="dropdown-menu" aria-labelledby="dLabel">
    @if($list->is_aktif == 0)
      <li>@include($base_view.'siswa_kelas.action.persetujuan_join_kelas')</li>
    @endif
      <li>@include($base_view.'siswa_kelas.action.hapus_siswa_kelas')</li>
  </ul>
</div>
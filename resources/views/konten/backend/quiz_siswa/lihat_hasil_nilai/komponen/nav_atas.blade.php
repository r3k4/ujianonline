

<ul class="nav nav-tabs">
  <li role="presentation" @if(isset($lihat_hasil)) class="active" @endif>
  	<a href="{!! route('backend.quiz_siswa.lihat_hasil', Request::segment(4)) !!}">
  		Hasil Pengerjaan Soal
  	</a>
  </li>


  <li role="presentation" @if(isset($lihat_hasil_nilai)) class="active" @endif>
  	<a href="{!! route('backend.quiz_siswa.lihat_hasil_nilai', Request::segment(4)) !!}">
  		Hasil Nilai
  	</a>
  </li>

</ul>
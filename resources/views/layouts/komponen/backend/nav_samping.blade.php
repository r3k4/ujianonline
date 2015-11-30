  <nav class="nav-sidebar">
    <ul class="nav">


        @include('layouts.komponen.backend.nav_samping_avatar')



        <li @if(isset($backend_home_index)) class="active" @endif >
            <a href="{{ route('backend.home.index') }}">
                <i class='fa fa-home'></i> Dashboard
            </a>
        </li>


    @can('canShow', \Auth::user())
         <li @if(isset($backend_user_index)) class="active" @endif >
            <a href="{{ route('backend.user.index') }}">
                <i class='fa fa-users'></i> User
            </a>
        </li>
    @endcan 





    @can('canShow', \Auth::user())
         <li @if(isset($backend_mapel_index)) class="active" @endif >
            <a href="{{ route('backend.mapel.index') }}">
                <i class='fa fa-th-list'></i> Mata Pelajaran
            </a>
        </li>
    @endcan 

@if(Auth::user()->ref_user_level_id == 3)
         <li @if(isset($backend_quiz_siswa_home)) class="active" @endif >
            <a href="{{ route('backend.quiz_siswa.index') }}">
                <i class='fa fa-th-list'></i> Tugas / Quiz
            </a>
        </li>
@endif


@if(Auth::user()->ref_user_level_id == 2)
         <li @if(isset($backend_kelas_index)) class="active" @endif >
            <a href="{{ route('backend.kelas.index') }}">
                <i class='fa fa-th-list'></i> Kelas
            </a>
        </li>
@endif

@if(Auth::user()->ref_user_level_id == 2)
         <li @if(isset($backend_quiz_index)) class="active" @endif >
            <a href="{{ route('backend.quiz.index') }}">
                <i class='fa fa-check-square-o'></i> Quiz Ujian
            </a>
        </li>
@endif




@if(Auth::user()->ref_user_level_id == 3)
         <li @if(isset($backend_guru_siswa_home)) class="active" @endif >
            <a href="{{ route('backend.guru_siswa.index') }}">
                <i class='fa fa-th-list'></i> Guru Pengajar
            </a>
        </li>
@endif



@if(Auth::user()->ref_user_level_id == 3)
         <li @if(isset($backend_siswakelas_index)) class="active" @endif >
            <a href="{{ route('backend.siswakelas.index') }}">
                <i class='fa fa-th-list'></i> Kelas
            </a>
        </li>
@endif


        
        
        <li @if(isset($backend_myprofile_home)) class="active" @endif>
          <a href="{!! route('backend.myprofile.index') !!}">
            <i class='fa fa-cogs'></i> My Profile
          </a>
        </li>


        <li><a href="{{ route('auth.getLogout') }}"><i class="fa fa-power-off"></i> Logout</a> </li>


    </ul>
</nav>

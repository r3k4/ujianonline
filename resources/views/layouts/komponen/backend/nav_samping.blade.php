  <nav class="nav-sidebar">
    <ul class="nav">


        @include('layouts.komponen.backend.nav_samping_avatar')



        <li @if(isset($backend_home_index)) class="active" @endif >
            <a href="{{ route('backend.home.index') }}">
                <i class='fa fa-home'></i> Dashboard
            </a>
        </li>


    @can('showUser', \Auth::user())
         <li @if(isset($backend_user_index)) class="active" @endif >
            <a href="{{ route('backend.user.index') }}">
                <i class='fa fa-users'></i> User
            </a>
        </li>
    @endcan 



        
        
        <li @if(isset($backend_myprofile_home)) class="active" @endif>
          <a href="{!! route('backend.myprofile.index') !!}">
            <i class='fa fa-cogs'></i> My Profile
          </a>
        </li>


        <li><a href="{{ route('auth.getLogout') }}"><i class="fa fa-power-off"></i> Logout</a> </li>


    </ul>
</nav>

    <li @if(isset($login_home)) class="active" @endif>
      <a href="{!! route('auth.getLogin') !!}">
        <i class="fa fa-lock"></i> Login
      </a>
    </li>


    <li @if(isset($register_home)) class="active" @endif >
        <a href="{!! route('auth.getRegister') !!}">
          <i class="fa fa-user"></i> Register
        </a>
    </li>


<li class="dropdown
    @if(isset($password_home)) active 
  @endif

">
  <a 
    href="#" 
    class="dropdown-toggle" 
    data-toggle="dropdown" 
    role="button" 
    aria-haspopup="true" 
    aria-expanded="false"
    >
    User Menu <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">






    <li role="separator" class="divider"></li>

    <li @if(isset($password_home)) class="active" @endif>
      <a href="{!! route('auth.password_reminder.getEmail') !!}">
        <i class="fa fa-envelope"></i> Lupa password
      </a>
    </li>
  </ul>
</li>
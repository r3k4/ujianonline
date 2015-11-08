<li class="dropdown
  @if(isset($register_home)) active @endif

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



    <li>
      <a href="#">
        <i class="fa fa-lock"></i> Login
      </a>
    </li>

    <li @if(isset($register_home)) class="active" @endif >
        <a href="{!! route('auth.getRegister') !!}">
          <i class="fa fa-plus-circle"></i> Register
        </a>
    </li>

    <li role="separator" class="divider"></li>

    <li>
      <a href="#">
        <i class="fa fa-envelope"></i> Lupa password
      </a>
    </li>
  </ul>
</li>
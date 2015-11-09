<div class="panel panel-info  ">
 <div class="panel-heading">
 	<h1 class="header_text animated fadeInDown">
 		<i class='fa fa-lock'></i> Login Sistem
 	</h1>
 </div>
  <div class="panel-body">


@include($base_view.'login.errors')
 
   
   {!! Form::open(['route' => 'auth.postLogin']) !!}

  <div class="form-group">
  	{!! Form::label('email', 'Alamat Email : ') !!}
  	{!! Form::text('email', '', ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'alamat email...', 'autofocus']) !!}
  </div>


  <div class="form-group">
  	{!! Form::label('password', 'Password : ') !!}
  	{!! Form::password('password',  ['id' => 'password', 'class' => 'form-control', 'placeholder' => 'password...']) !!}
  </div>

  <div class="checkbox">
    <label>
      <input type="checkbox" name="remember"> Remember Me
    </label>
  </div>


    <div class="form-group">
    <div class=" col-md-6">
      <button type="submit" class="btn btn-primary form-control"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Sign In</button>
    </div>
    <div class="col-sm-3">
      <div class="forgot-password text-right"><a href="{!! route('auth.password_reminder.getEmail') !!}">Lupa password?</a></div>
    </div>
  </div>

  {!! Form::close() !!}

  </div>
</div>
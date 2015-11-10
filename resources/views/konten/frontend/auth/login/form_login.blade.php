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

<div class="row">
  <div class='col-md-6'>
    <div class="checkbox">
      <label>
        <input type="checkbox" name="remember"> Ingat Saya
      </label>
    </div>    
  </div>
  <div class="col-md-6">
      <div class="forgot-password text-right">
        <a href="{!! route('auth.password_reminder.getEmail') !!}">
          Lupa password ?
        </a>
      </div>      
  </div>  
</div>



<hr>


    <div class="form-group">
      <button type="submit" class="btn btn-info form-control">
          <i class="fa fa-sign-in"></i>&nbsp;&nbsp;Login
        </button>

        <div style="margin-top:1em;margin-bottom:1em;" class="text-center">
          --------------- atau ----------------          
        </div>

        <a class="btn btn-primary form-control" href="{!! route('auth.getLoginFacebook') !!}"> 
          <i class="fa fa-facebook"></i> Login dengan facebook
        </a>

 
  </div>

  {!! Form::close() !!}

  </div>
</div>


<hr>



      <div class="text-center">
      <h2 style="text-decoration: underline;">
        <a href="{!! route('auth.getRegister') !!}">
          Buat Akun Baru
        </a>        
      </h2>

      </div>     
 

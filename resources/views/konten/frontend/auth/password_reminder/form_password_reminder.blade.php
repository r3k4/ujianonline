<div class="panel panel-info">
 <div class="panel-heading">
 	<h1 class="animated fadeInDown header_text">
 		<i class='fa fa-lock'></i> Reset Password 
 	</h1>
 </div>
  <div class="panel-body">


@include($base_view.'errors')

      <div class="row">
        <div class="col-md-6"> 
            {!! Form::open(['route' => 'auth.password_reminder.postEmail']) !!}
            <div class="form-group">
              {!! Form::label('email', 'Alamat Email : ') !!}
              {!! Form::text('email', old('email'), ['id' => 'email', 'class' => 'form-control', 'placeholder' => 'alamat email...', 'autofocus']) !!}
            </div>
             <div class="form-group">
                <button type="submit" class="btn btn-primary form-control ">
                  <i class="fa fa-sign-in"></i>&nbsp;&nbsp;Kirim Email
                </button>
            </div>
            {!! Form::close() !!}
        </div> 

        <div class="col-md-6">
          <div class="alert alert-info">
              <h3> <i class='fa fa-warning'></i> Info : </h3>
              <hr>
              pastikan bahwa email anda sudah terdaftar dan valid.      
          </div>
        </div> 
      </div> {{-- row --}}
  </div> 


</div>
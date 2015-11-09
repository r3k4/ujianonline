@extends('layouts.frontend')

@section('main')


<div class="panel panel-info">
  <div class="panel-heading"> <h1>Reset Password</h1>  </div>
  <div class="panel-body">
        <form method="POST" action="{!! route('auth.password_reminder.postReset') !!}">
            {!! csrf_field() !!}
            <input type="hidden" name="token" value="{{ $token }}">

            @include($base_view.'errors')

            <div>
                Email
                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
            </div>

            <div>
                Password
                <input class="form-control" type="password" name="password">
            </div>

            <div>
                Confirm Password
                <input class="form-control" type="password" name="password_confirmation">
            </div>

            <div>
                <button class="btn btn-info" type="submit">
                    Reset Password
                </button>
            </div>
        </form>    
  </div>
</div>





@endsection




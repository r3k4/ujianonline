<li class="text-center"> 
<div class="row">
  <img src="{{ Gravatar::src(Auth::user()->email, 100) }}" class='img-circle avatar' alt='...' >  
</div>

   {{ Auth::user()->data_user->nama }}
    <br>
     <hr>
</li>
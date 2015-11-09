<li class="text-center"> 
<div class="row">
  <img src="{{ Gravatar::src(Auth::user()->email, 100) }}" class='img-circle avatar' alt='...' >  
</div>

   {{ Auth::user()->nama }}
    <br>
     <hr style="margin-top:0px;">
</li>
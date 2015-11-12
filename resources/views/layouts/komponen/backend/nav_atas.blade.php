    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/">
            <i class="fa fa-book"></i> BANK SOAL
          </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


<p class="navbar-text navbar-right">
  Signed in as 
    <b>{!! Auth::user()->nama !!}</b>
 |      
   <a style="font-weight: bold;" href="{!! route('auth.getLogout') !!}">
        <i class="fa fa-power-off"></i> Log Out
      </a>
</p>

 


        </div>
      </div>
    </nav>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title', 'Ujian Online dan Bank Soal') </title>

    <link rel="stylesheet" href="{{ elixir('css/main.css') }}">
	<script src="{{ elixir('js/main.js') }}"></script>

  </head>
  <body>

<div class="landing-atas">
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">
            <i class="fa fa-cloud-upload"></i>
          </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
            <li><a href="#">Link</a></li>

          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li>
               <button class='btn btn-success '> <i class="fa fa-lock"></i> LOGIN</button>

            </li>
          </ul>
        </div>
      </div>
    </nav>


</div>

  <div class="container animated fadeIn">
    <h1>  Welcome to Edmodo</h1>

    The safest and easiest way for educators to connect and collaborate with students, parents, and each other.

  </div>



  </body>
</html>

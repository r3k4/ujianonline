<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> @yield('title', 'Ujian Online dan Bank Soal') </title>

    <link rel="stylesheet" href="{{ elixir('css/main.css') }}">
    <link rel="stylesheet" href="/plugins/sweetalert/sweetalert.css">



  <script src="{{ elixir('js/main.js') }}"></script>
  <script src="/plugins/sweetalert/sweetalert.min.js"></script>


  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.js"></script>
  <script src="/plugins/jquery.slimscroll.min.js"></script>

<link href='https://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
  



  </head>
  <body>

@include('layouts.komponen.backend.nav_atas') 
@include('layouts.komponen.global.modal') 
  <div class="container">


  <div class="col-md-2">
    @include('layouts.komponen.backend.nav_samping')    
  </div>
  <div class="col-md-10 animated fadeIn">

    @yield('main')    
  </div>


  </div>

@include('layouts.komponen.backend.footer')

  </body>
</html>

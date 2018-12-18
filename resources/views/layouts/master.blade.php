<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="public/css/bootstrap1.css" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="public/css/admin_dashboard.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
 
    @yield('custom_head')



    @yield('title')
      
  </head>
  <body>
    @include ('layouts.header')
    <hr>
    <hr>
    <hr>
  <div class="container">
    @yield('content')
  </div>

  
  <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2018 E-FOOD</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
  </body>
</html>
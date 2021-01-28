
@section('header')
<!DOCTYPE html>
<html>
<!-- Kashish Fatima -->
<head>
  <meta charset="utf-8">
  <title>@yield('titleName')</title> 
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Ubuntu&display=swap" rel="stylesheet">
  <meta name="csrf-token" content="{!! csrf_token() !!}">
  <!-- CSS Stylesheets -->
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/userstyles.css"> 
  <!-- Font Awesome -->
  
  <script src="https://kit.fontawesome.com/87ef124fe0.js" crossorigin="anonymous"></script>
  
  <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
@show

@section('navbar')
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="">Tution</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{route('homepage')}}">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('teacher')}}">Teachers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('course')}}">Courses</a>
        </li>
        @if(auth()->check())
        <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Sign Out</a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        @endif
    </ul>
 </div>
</nav>
@show

@yield('content')

<footer id="footer">
    <i class="fa fa-twitter footer-icon" aria-hidden="true"></i>
    <i class="fa fa-facebook footer-icon" aria-hidden="true"></i>
    <i class="fa fa-instagram footer-icon" aria-hidden="true"></i>
    <i class="fa fa-envelope footer-icon" aria-hidden="true"></i>
    <p>© Copyright 2020 Tution</p>
</footer>

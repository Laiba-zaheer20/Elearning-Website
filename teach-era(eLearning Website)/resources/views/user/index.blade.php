
@extends('layouts.userNavbar')
@section('titleName','Tution')

<body>

@section('navbar')
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="">Tution</a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('teacher')}}">Teachers</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('course')}}">Courses</a>
        </li>
        @if(auth()->check())
    
        <li class="nav-item">
            <a class="nav-link" href="{{route('logout')}}">LogOut</a>
        </li>
        @else
        <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}">Login</a>
        </li>
        @endif
    </ul>
 </div>
</nav>
@endsection

@section('content')
<section id="title">
    <div class="container">
    <!-- Title -->

    <div class="row title-section">
      <div class="col-lg-12 tagline-div">
        <h1 class="tution-tagline">Connect. Learn. <span class="teach">Teach.</span> </h1>
      </div>
    

    </div>

  </div>
  </section>


  <!-- About-->

  <section id="about">
    <div class="row">
    <div class="about-box col-lg-6">
    
      <h2 class="about-headings">About Us</h2>
    

    </div>
    
    <div class="about-box col-lg-6">

      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
        nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu 
        fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
        sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
  
    </div>

  
    </div>
  </div>
  </section>



  <section id="testimonials">
    <div id="testimonial-carousel" class="carousel slide" >
      <div class="carousel-inner">
        <div class="carousel-item active">
           <h2 class="testimonial-text">Register for any course.</h2>

        </div>
        <div class="carousel-item">
          <h2 class="testimonial-text">
            Pick any of the available teachers.</h2>
        
        </div>
        <div class="carousel-item">
          <h2 class="testimonial-text">
            Confirm your schedule and payment.</h2>
        
        </div>
        <div class="carousel-item">
          <h2 class="testimonial-text">
            Start on your journey of education.</h2>
        
        </div>

        <div class="carousel-item">
        
          <a href="{{route('register')}}"><button type="button" class="btn btn-dark btn-lg download-button">Register Now!</button></a> 
        
        </div>
       
      </div>
      <a class="carousel-control-prev" href="#testimonial-carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
        
      </a>
      <a class="carousel-control-next" href="#testimonial-carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
        
      </a>
    </div>
  </section>
@endsection

</body>

</html>

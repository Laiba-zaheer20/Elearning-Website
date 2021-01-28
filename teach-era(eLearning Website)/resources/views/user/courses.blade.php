@extends('layouts.userNavbar')
@section('titleName','Courses')


@section('header')
@parent
<style>
    a{
        text-decoration:none;
    }
    #course .course-card{
    width: 100%;
    height: 200px;
    background-color:#f3edd2da;
    box-shadow: 5px 5px 15px  #34626c;
    transition: all 0.3s ease-in;
    -webkit-transition: all 0.3s ease-in;
    -moz-transition: all 0.3s ease-in;
    margin-bottom: 60px;
}

#course .course-card .course-title{
    color: #343a40;
    

}

#course .course-card:hover{
    background: #343a40;
    border-radius: 5px;
    border: none;
    box-shadow: 5px 5px 10px #9e9e9e;
    cursor: pointer;
    text-decoration:none;
    
    
}
#course .course-card:hover .course-title{
    color: rgb(223, 217, 217);

}
#course .course-card:hover a{
    color: rgb(223, 217, 217);
    text-decoration:none;
}
</style>
@endsection

<body id="courses">

@section('navbar')
@parent
@endsection

@section('content')
    <!-- <section id="other-title">

        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Tution</a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="teachers.html">Teachers</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="courses.html">Courses</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="login.html">Login</a>
              </li>
  
            </ul>
         </div>
        </nav>
      
      </section> -->
      <section id="course">
        <div class="container my-3 py-5 text-center">
            <div class="row mb-5">
                <div class="col">
                    <h1 class="teachers-heading">Courses</h1>
                    <p class="mt-3 teachers-tagline">
                        You will find all available courses here!
                    </p>
                    <form class="search-bar" >
                       <input type="text" name="search" placeholder="Search..">
                    </form>
                </div>
            </div>

            <div class="row">
            @foreach($course as $c)
            
                <div class="col-md-6">
                    <div class="course-card card">
                    <a href="{{route('courseteacher',$c->CourseId)}}">
                        <div class="card-body">
                            <h1 class="course-title">{{$c->CourseName}}</h1>
                        </div>
                        </a>
                    </div>
                </div>
            
            @endforeach
            </div>
        </div>
    </section>
<!--     
    <section id="course">
        <div class="layout">
            <h3 class="course-tagline">You will find all available courses here!</h3>
            <h1 class="courses-heading">Courses</h1>
                        <p class="course-tagline">
                            You will find all available courses here!
                        </p>
                        
            <form class="search-bar" >
                <input type="text" name="search" placeholder="Search..">
            </form>
            <div class="row">
    
                <div class="col-md-6 courseView">
                    <div class="courseCard h-100">
                        <div class="image">
                            <img src="https://images.unsplash.com/photo-1585862705417-671ae64f0eb7?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid course-image">
                        
                        </div>
                        <div class="content h-100">
                            <h4 class="title"></h4>
                            <p class="overview">A combination of all the mathematics information you can find in the world delivered by our expert teachers.</p>

                        </div>
                        <div class="end-card">
                            <a href="#" class="navbtn">More Info</a>
                        </div>
                    </div>
                </div>-->

                <!-- <div class="col-md-12 courseView">
                    <div class="courseCard h-100">
                        <div class="image">
                            <img src="assets/images/maths.jpg" alt="" class="img-fluid course-image">
                        
                        </div>
                        <div class="content h-100">
                            <div class="title">Mathematics</div>
                            <p class="overview">A combination of all the mathematics information you can find in the 
                                world delivered by our expert teachers.</p>
                            </div>
                        <div class="end-card">
                            <a href="#" class="navbtn">More Info</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 courseView">
                    <div class="courseCard h-100">
                        <div class="image">
                            <img src="assets/images/maths.jpg" alt="" class="img-fluid course-image">
                        
                        </div>
                        <div class="content h-100">
                            <div class="title">Mathematics</div>
                            <p class="overview">A combination of all the mathematics information you can find in the world delivered by our expert teachers.</p>

                        </div>
                        <div class="end-card">
                            <a href="#" class="navbtn">More Info</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 courseView">
                    <div class="courseCard h-100">
                        <div class="image">
                            <img src="assets/images/maths.jpg" alt="" class="img-fluid course-image">
                        
                        </div>
                        <div class="content h-100">
                            <div class="title">Mathematics</div>
                            <p class="overview">A combination of all the mathematics information you can find in the world delivered by our expert teachers.</p>

                        </div>
                        <div class="end-card">
                            <a href="#" class="navbtn">More Info</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>

@endsection

    </body>
</html>
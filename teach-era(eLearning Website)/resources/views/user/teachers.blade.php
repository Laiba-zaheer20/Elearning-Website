
@extends('layouts.userNavbar')

@section('titleName','Teachers')

<body id="teachers">
@section('navbar')
@parent
@endsection

 @section('content')   
      <section id="teacher-cards">
            <div class="container my-3 py-5 text-center">
                <div class="row mb-5">
                    <div class="col">
                        <h1 class="teachers-heading">Teachers</h1>
                        <p class="mt-3 teachers-tagline">
                            Here is a list of the teachers for all the different courses
                        </p>
                        <form class="search-bar" >
                           <input type="text" name="search" placeholder="Search..">
                           <!-- <button><i class="fas fa-search"></i></button>  -->
                        </form>
                    </div>
                </div>

                <div class="row">
                    @foreach($teacher as $teacher)
                        <div class="col-lg-4 col-md-6">
                            <a href="{{route('teacherprofile',$teacher->TeacherId)}}">
                            <div class="card">
                                <div class="card-body">
                                @if($teacher->Gender=='Male')
                                    <img src="{{asset($teacher->Image)}}" onerror=this.src="{{asset('assets/img/Male1.PNG')}}" alt="" class="img-fluid rounded-circle w-50 mb-3">
                                @else
                                    <img src="{{asset($teacher->Image)}}" onerror=this.src="{{asset('assets/img/female.PNG')}}" alt="" class="img-fluid rounded-circle w-50 mb-3">
                                @endif    
                                    <h3>{{$teacher->FirstName.' '.$teacher->LastName}}</h3>
                                    @foreach($qualification as $q)
                                        @if($q->TeacherId==$teacher->TeacherId)
                                            <h5>{{$q->Qualification}}</h5>
                                        @endif
                                    @endforeach
                                    <hr>
                                    <p>
                                        Subject
                                        <ul class="text-left subject-list">
                                        @foreach($course as $c)
                                            @if($c->TeacherId==$teacher->TeacherId)
                                            <li>{{$c->CourseName}}</li>
                                            @endif
                                        @endforeach
                                        </ul>        
                                    </p>
                                </div>
                            </div>
                            </a>
                        </div>
                    @endforeach
                    <!-- <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <img src="assets/images/profile.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
                                <h3>Teacher 2</h3>
                                <h5>Qualification</h5>
                                <hr>
                                <p>
                                    Subjects
                                    <ul class="text-left subject-list">
                                        <li>Subject 1</li>
                                        <li>Subject 2</li>
                                        <li>Subject 3</li>
                                        <li>Subject 4</li>
                                        <li>Subject 5</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <img src="assets/images/profile.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
                                <h3>Teacher 3</h3>
                                <h5>Qualification</h5>
                                <hr>
                                <p>
                                    Subjects
                                    <ul class="text-left subject-list">
                                        <li>Subject 1</li>
                                        <li>Subject 2</li>
                                        <li>Subject 3</li>
                                        <li>Subject 4</li>
                                        <li>Subject 5</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <img src="assets/images/profile.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
                                <h3>Teacher 4</h3>
                                <h5>Qualification</h5>
                                <hr>
                                <p>
                                    Subjects
                                    <ul class="text-left subject-list">
                                        <li>Subject 1</li>
                                        <li>Subject 2</li>
                                        <li>Subject 3</li>
                                        <li>Subject 4</li>
                                        <li>Subject 5</li>
                                    </ul>
                                </p>                          
                              </div>
                        </div>
                    </div>
                   
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <img src="assets/images/profile.jpg" alt="" class="img-fluid rounded-circle w-50 mb-3">
                                <h3>Teacher Name</h3>
                                 <h5>Qualification</h5>
                                <hr>
                                <p>
                                    Subjects
                                    <ul class="text-left subject-list">
                                        <li>Subject 1</li>
                                        <li>Subject 2</li>
                                        <li>Subject 3</li>
                                        <li>Subject 4</li>
                                        <li>Subject 5</li>
                                    </ul>
                                </p>
                            </div>
                        </div>
                    </div> -->
                    
                    
                </div>
            </div>
      </section>

  @endsection    
 
</body>

</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/profilestyle.css')}}?version=1">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> -->
    <script src="https://kit.fontawesome.com/87ef124fe0.js" crossorigin="anonymous"></script>
<!-- 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> -->
  <meta name="csrf-token" content="{!! csrf_token() !!}">
  <script src="{{asset('assets/js/core/jquery.min.js')}}" ></script>
  <script src="{{asset('assets/js/core/popper.min.js')}}" ></script>
  <script src="{{asset('assets/js/core/bootstrap.min.js')}}"></script>

</head>

<body>
   
    <div class="main-container">
        <div class="side-content">
            <a href="{{route('homepage')}}" class="tution-title">Tution</a>
                <div class="logo">
                    <a href="#">Teacher Name</a>
                </div>
                <div class="nav-toggler">
                    <span></span>
                </div>

                <ul class="navv">
                    <li><a href="#home"> <i class="fas fa-user"></i>Profile</a></li>
                    <li><a href="#about"> <i class="fas fa-book"></i>About</a></li>
                    <li><a href="#subject"> <i class="fas fa-briefcase"></i>Subjects</a></li>
                </ul>


        </div>

        <div class="main-content">
            <section class="home section active" id="home"> 
                <div class="container">
                <div class="intro">
                    @if($teacher->Gender=='Male')
                        <img src="{{asset($teacher->Image)}}" onerror=this.src="{{asset('assets/img/Male1.PNG')}}" alt="" class="img-fluid rounded-circle mb-3">
                    @else
                        <img src="{{asset($teacher->Image)}}" onerror=this.src="{{asset('assets/img/female.PNG')}}" alt="" class="img-fluid rounded-circle mb-3">
                    @endif    
                        <h1>{{$teacher->FirstName." ".$teacher->LastName}}</h1>
                        <!-- <p>(Name of Subject) Teacher</p> -->
                </div>
                </div>
            </section>
           
        <section class="about section" id="about">
            <div class="container">
                <div class="row">
                    <div class="section-title padd-15">
                        <h2>About Me</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="about-content padd-15">
                        <div class="row">
                            <div class="about-text padd-15">
                                
                                <p>
                                    {{$teacher->About}}
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="personal-info padd-15">
                                    <div class="row">
                                      @foreach($qualification as $q)
                                        <div class="info-item padd-10">
                                            <p>Degree: <span>{{$q->Qualification}}</span></p>
                                        </div>
                                        <div class="info-item padd-10">
                                            <p>Field: <span>{{$q->Field}}</span></p>
                                        </div>
                                        <div class="info-item padd-10">
                                            <p>Insititute: <span>{{$q->Institute}}</span></p>
                                        </div>
                                        @endforeach
                                      
                                        <div class="info-item padd-15">
                                            <p>Email: <span>{{$teacher->Email}}</span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>City: <span>{{$teacher->CityName}}</span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>Phone Number: <span>{{$teacher->PhoneNo}}</span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>Timing: <span>{{$teacher->StartTime."-".$teacher->EndTime}}</span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>Teaching Days: <span>{{$teacher->Days}}</span></p>
                                        </div>
                                        <div class="info-item padd-15">
                                            <p>Teaching Method: <span>{{$teacher->Days}}</span></p>
                                        </div>

                                    </div>
                                    
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="subject section" id="subject">
            <div class="container">
                <div class="row">
                    <div class="section-title padd-15">
                        <h2>Subjects</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($teachers as $t)
                    <div class="subject-item padd-15">
                        <div class="subject-item-inner">
                            <video src="{{$t->Demo}}" height="200px" width="300px" controls></video>
                            <h4>{{$t->CourseName}}</h4>
                            <h5>Fees: {{$t->Fees}}</h5>
                            <p>{{$t->Description}} </p>
                            <div id="start">{{$teacher->StartTime}}</div>
                           <div id="end">{{$teacher->EndTime}}</div>
 
                            <button style="height:30px;border:0px;width:100px;backgound:#dfd9d9" id="{{$t->Covid}}" class="myBtn">Register</button>
                        </div>
                        
                    </div>
                    @endforeach
            </div>

            
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Registration</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form id="form11">
            <div class="modal-body">
                <input type="time" min="{{$teacher->StartTime}}" max="{{$teacher->EndTime}}" id="starttime" required/>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button  type="submit" class="btn btn-primary reg">Register</button>
            </div>
        </form>
    </div>
  </div>
</div>


    </div>

    <script src="{{asset('assets/js/script.js')}}"></script>
  
 
    <script>
    $(document).ready(function(){
        $('.myBtn').click(function(){

        if("<?php echo auth()->check() ?>")
        {
            id=$(this).attr('id');                     
            $('#staticBackdrop').appendTo("body").modal('show');
            $('#form11').submit(function(e){ 
                // e.preventDefault();
                console.log(id);
                $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                    'time':$('#starttime').val(),
                    'id':id,
                },
                url: "{{route('addReg')}}",
                success: function(msg){
                    $('#staticBackdrop').appendTo("body").modal('hide');
                }
                });
                });
        }
        else
        {
            var targetUrl = "{{route('login')}}";
            window.location = targetUrl;
        }
    });
 
        });
 
    </script> 
</body>
</html>
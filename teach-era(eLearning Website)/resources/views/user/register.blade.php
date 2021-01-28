<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="assets/css/regstyle.css" />
    <title>Sign Up</title>
    <script src="assets/js/core/jquery.min.js" ></script>
  <script src="assets/js/core/popper.min.js" ></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <meta name="csrf-token" content="{!! csrf_token() !!}">
  </head>
  <body>
  <style>

.input-field #userstatus{
    border-right-width: 0px;
    border-left-width: 0px;
    border-top-width: 0px;
    border-bottom-width: 0px;
    border-radius: 55px;
  }
  
.input-field #method1{
    border-right-width: 0px;
    border-left-width: 0px;
    border-top-width: 0px;
    border-bottom-width: 0px;
    border-radius: 55px;
  }

.input-field #days1{
    border-right-width: 0px;
    border-left-width: 0px;
    border-top-width: 0px;
    border-bottom-width: 0px;
    border-radius: 55px;
  }


</style>
<div class="container">
      <div class="forms-container">
        <div class="signup">
          <form action="#" id="form" class="sign-up-form">
            <a class="title-logo" href="{{route('homepage')}}">Tution</a>
            <h2 class="title">Sign up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <select id="userstatus" name="userstatus">
                <option value="">User</option>
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
              </select>
            </div>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input id="fname" type="text" placeholder="First Name" />
            </div>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input id="lname" type="text" placeholder="Last Name" />
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input id="email" type="email" placeholder="Email" />
            </div>
            <div class="input-field">
              <i class="fas fa-phone"></i>
              <input id="phoneNo" type="text" placeholder="Phone Number" />
            </div>
            <div class="input-field" id="alter">
              <i class="fas fa-phone"></i>
              <input id="alterNo" type="text"  placeholder="Alternative Number" />
            </div>
            
            <div class="input-field">
              <i class="fas fa-home"></i>
              <input id="address" type="text" placeholder="Address" />
            </div>
        
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="password" type="password" placeholder="Password" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input id="password_confirmation" type="password" placeholder="Confirm Password" />
            </div>
            
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input id="city" type="text" placeholder="City" />
            </div>
            
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input id="country" type="text" placeholder="Country" />
            </div>
            <div class="input-field" id="gender" style=" visibility: hidden;">
              <i class="fas fa-user"></i>
              <input id="gender1" type="text" placeholder="Gender" />
            </div>
           
            <div class="input-field" id ="method" style=" visibility: hidden;">
            <i class="fas fa-user"></i>
              <select id="method1" name="userstatus">
                <option value=>Teaching Method</option>
                <option value="online">Online</option>
                <option value="physical">Physical</option>
              </select></div>
           
            <div class="input-field" id="days" style=" visibility: hidden;">
            <i class="fas fa-user"></i>
              <select id="days1" name="userstatus">
                <option value="">Days of Teaching</option>
                  @foreach($days as $c)
                  <option value="{{$c->DayId}}">{{$c->Days}}</option>
                  @endforeach
              </select>
            </div>
           
            <div id="errors"></div>                  
              <div class=" print-error-msg" style="display:none">
            <ul></ul>
            </div>
           
           <input id="send" type="submit" class="btn" value="Sign up" />
          </form>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>One of us? ?</h3>
            <p>
                Sign In to discover newly available courses and teachers.
            </p>
            <a href="{{route('login')}}" class="signin-link"><button class="btn transparent" id="sign-in-btn">
              Sign in
            </button></a> 
          </div>
          <img src="assets/images/undraw_studying_s3l7.svg" class="image" alt="" />
        </div>
        
      </div>
    </div>
<script>

$(document).ready(function(){
  $('#userstatus').on('change', function() {
    $status = $('#userstatus').val();
    if($status == "teacher"){
      document.getElementById("gender").style.visibility = "visible";
      document.getElementById("method").style.visibility = "visible";
      document.getElementById("days").style.visibility = "visible";
    }else{
      document.getElementById("gender").style.visibility = "hidden";
      document.getElementById("method").style.visibility = "hidden";
      document.getElementById("days").style.visibility = "hidden";
    }
  });

  $('#send').click(function(){
   $status = $('#userstatus').val();
  $('#form').attr('onsubmit','return false;');
   $.ajax({
     type: "POST",
     data: {"_token": $('meta[name="csrf-token"]').attr('content'),
     "fname":$('#fname').val(),
     "lname":$('#lname').val(),
     "phoneNo":$('#phoneNo').val(),
     "alterNo":$('#alterNo').val(),
     "email":$("#email").val(),
     "address":$('#address').val(),
     "city":$('#city').val(),
     "country":$('#country').val(),
     "password":$('#password').val(),
     'password_confirmation':$('#password_confirmation').val(),
     'Method':$('#method1').val(),
     'status':$('#userstatus').val(),
     'gender':$('#gender1').val(),
     'days':$('#days1').val()
    },
     url: "{{route('checkSignIn')}}",

     success: function(msg){
      if($.isEmptyObject(msg.error)){
       if(msg.key=='done!'){
        var targetUrl = "{{route('login')}}";
        window.location = targetUrl;
      }
      }
      else{
        $(".key").css('display','none');
        printErrorMsg(msg.error);
     }
     }
  });
});

 function printErrorMsg (msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display','block');
            $.each( msg, function( key, value ) {
                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
            });
        }
});
</script>
  </body>
</html>

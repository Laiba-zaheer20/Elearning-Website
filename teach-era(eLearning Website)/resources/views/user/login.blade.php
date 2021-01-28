<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="assets/css/loginstyle.css" />
    <script src="assets/js/core/jquery.min.js" ></script>
  <script src="assets/js/core/popper.min.js" ></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <meta name="csrf-token" content="{!! csrf_token() !!}">
  
    <title>Sign In</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin">
          <form action="#" id="form" class="sign-in-form">
            <a class="title-logo" href="{{route('homepage')}}">Tution</a>
            <h2 class="title">Sign in</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" id="username" placeholder="Username" />
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" id="password" placeholder="Password" />
            </div>
            <div id='key' style="margin-bottom:10px"class="key"></div>
                    
            <div id="errors"></div>                  
              <div class=" print-error-msg" style="display:none">
            <ul></ul>
            </div>
            <input type="submit" id="send" value="Login" class="btn solid" />
          </form>
         
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Register for Tution to avail education services provided by skilled teachers.
            </p>
             <a href="{{route('register')}}" class="signup-link"><button class="btn transparent" id="sign-up-btn">
             Sign up
            </button></a> 
          </div>
          <img src="assets/images/undraw_education_f8ru.svg" class="image" alt="" />
        </div>
        
      </div>
    </div>
<script>

$(document).ready(function(){
 $('#send').click(function(){
    username1=$('#username').val();
    password1=$('#password').val();
    $('#form').attr('onsubmit','return false;');
   
   $.ajax({
     type: "POST",
     data: {"_token": $('meta[name="csrf-token"]').attr('content'),
     "username":username1,
     "password":password1,
     },
     url: "{{route('checkLogin')}}",
     
     success: function(msg){
      if($.isEmptyObject(msg.error)){
       if(msg.key!='YOU HAVE TO SIGN UP FIRST !!'){
        if(msg.key == "done1"){
            
        var targetUrl = "{{route('homepage')}}";
        window.location = targetUrl;
        }
        else{
          if(msg.key == "done2"){
          var targetUrl = "{{route('dashboardForTeacher')}}";
          window.location = targetUrl;
          }
          else{
          var targetUrl = "{{route('dashboard')}}";
          window.location = targetUrl;
          }
        }
      }
       else{
        $(".key").css('display','block');
       document.getElementById("key").innerHTML=msg.key;
        document.getElementById("errors").style.display = "none";
        $(".print-error-msg").css('display','none');
      }}
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

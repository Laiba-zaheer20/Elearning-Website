
@extends('layouts.mainforteacher')
@section('class4','active')


@section('header')
@parent
<link rel="stylesheet" href="assets/css/course.css?version=1" />
@endsection
<body class="">

  <div class="wrapper ">
    <div class="main-panel">
    @section('title-name','Course Offered')  
    @section('content')  
    <div class="content"> 
      <div class="content">
        <div class="container-fluid">
          <div class="container-fluid">
            <div class="card card-plain">
              <div class="card-header card-header-primary" style="display:flex">
                <div style="width:50%;display:flex;align-items:center">
                  <h2 class="card-title">Course Offered</h2>
                </div>
                <div style="width:50%;display:flex;justify-content:flex-end;align-items:center">
                  <h2>
                    <button type="button" style="border:0px;background:transparent;color:white;font-weight:bold" data-toggle="modal" data-target="#exampleModal">+</button>
                  </h2  >
                </div>
              </div>
          </div>
          <section id="teacher-cards">
            <div class="container my-3 py-5 text-center">
                <div class="row">
                @foreach($offered as $offer)
                    <div class="col-lg-4 col-md-6">
                        <div class="card" id="{{$offer->Covid}}">
                            <div class="card-body">
                            @if($offer->Demo!="")
                            <video class="img-fluid  mb-3" id="v_{{$offer->Covid}}" src="{{$offer->Demo}}" type='video/mp4' controls>
                            </video>
                            @endif
                                <h3 class="h3_{{$offer->Covid}}" id="{{$offer->CourseId}}">{{$offer->CourseName}}</h3>
                                <h5 id="h5_{{$offer->Covid}}">{{$offer->Fees}}</h5>
                                <h5>{{$offer->Status}}</h5>
                                <hr>
                                <p>
                                    Description
                                    <p id="p_{{$offer->Covid}}" class="text-left subject-list">
                                       {{$offer->Description}}
                                    </p>
                                </p>
                                <p>
                                  <!-- <a id="{{$offer->Covid}}"  class="update" style="margin:5px;color:green;text-decoration:underline;cursor:pointer">Update</a> -->
                                  <a id="{{$offer->Covid}}" data-toggle="modal" data-target="#staticBackdrop" class="remove" style="margin:5px;color:red;text-decoration:underline;cursor:pointer">Remove</a>
                                </p>
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
          </section>

<!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form1">
              <div class="modal-body">
                <label for="sel1">Courses:</label>
                <select class="form-control" name="sel1" id="sel1"  required>
                  <option></option>
                  @foreach($course as $c)
                  <option value="{{$c->CourseId}}">{{$c->CourseName}}</option>
                  @endforeach
                  <option value="other">other</option>
                </select>
                <br>
                <div id="div" style="display:none">
                  <input id="course" type="text" placeholder="Course Name"  required />
                  <label id="error" style="color:red"></label>
                </div>
                <br>
                <textarea type="text area" id="description" placeholder="Course Description" rows="4" style="margin-bottom:10px;width:400px" required></textarea>
                <br> $<input type="number" id="fees" placeholder="Fees" style="margin-bottom:10px"  required /> <br> 
                <label style="margin-bottom:10px;font-weight:bold;color:black">Upload Demo Video:</label>
                <br>
                <input type="file" id="file" name="file" value="" accept="video" required />
              </div>
              
              <div class="modal-footer">
              <label id="error1" style="color:red"></label>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="add" class="btn btn-primary">Add Course</button>
              </div>
            </form>     
          </div>
        </div>
      </div>
 <!-- Modal end -->


 

 <!-- Modal Starts -->
 <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Remove Course</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Do you really want to remove this Course?
      </div>
      <div class="modal-footer" style="position:relative;right:0px;bottom:0px">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="remove" data-dismiss="modal">Remove</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal End -->


<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Course</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form1">
              <div class="modal-body">
                <label for="sel1">Courses:</label>
                <select class="form-control" name="sel1" id="sel11"  required>
                  <option></option>
                  @foreach($course as $c)
                  <option value="{{$c->CourseId}}">{{$c->CourseName}}</option>
                  @endforeach
                  <option value="other">other</option>
                </select>
                <br>
                <div id="div" style="display:none">
                  <input id="course1" type="text" placeholder="Course Name"  required />
                  <label id="error" style="color:red"></label>
                </div>
                <br>
                <textarea type="text area" id="description1" placeholder="Course Description" rows="4" style="margin-bottom:10px;width:400px" required></textarea>
                <br> $<input type="number" id="fees1" placeholder="Fees" style="margin-bottom:10px"  required /> <br> 
                <label style="margin-bottom:10px;font-weight:bold;color:black">Upload Demo Video:</label>
                <br>
                <input type="file" id="file1" name="file" value="" accept="video" required />
              </div>
              
              <div class="modal-footer">
              <label id="error1" style="color:red"></label>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="add" class="btn btn-primary">Update Course</button>
              </div>
            </form>     
          </div>
        </div>
      </div>
 <!-- Modal end -->




      <footer class="footer">
        <div class="container-fluid">
          <nav class="float-left">
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="https://creative-tim.com/presentation">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
              <li>
                <a href="https://www.creative-tim.com/license">
                  Licenses
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright float-right">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a> for a better web.
          </div>
        </div>
      </footer>
    </div>
  </div>
  <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
              <span class="badge filter badge-rose active" data-color="rose"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-1.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-2.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-3.jpg" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="../assets/img/sidebar-4.jpg" alt="">
          </a>
        </li>
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/material-dashboard" target="_blank" class="btn btn-primary btn-block">Free Download</a>
        </li>
        <!-- <li class="header-title">Want more components?</li>
            <li class="button-container">
                <a href="https://www.creative-tim.com/product/material-dashboard-pro" target="_blank" class="btn btn-warning btn-block">
                  Get the pro version
                </a>
            </li> -->
        <li class="button-container">
          <a href="https://demos.creative-tim.com/material-dashboard/docs/2.1/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block">
            View Documentation
          </a>
        </li>
        <li class="button-container github-star">
          <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-twitter"><i class="fa fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-facebook"><i class="fa fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
        </li>
      </ul>
    </div>
  </div>
  
  @endsection
  
@section('script')


<script>
$(document).ready(function(){
  $('#sel1').click(function(){
    option=$('#sel1').val();
    if(option=="other")
    {
      $('#div').show();
      $('#course').focusout(function(){
      course=$('#course').val();
      $.ajax({
      type: "POST",
      data: {"_token": $('meta[name="csrf-token"]').attr('content'),
      'course':course,
      },
      url: "{{route('addcourse')}}",
      success: function(msg){
        var len=msg.length;
        console.log(len);
        if(len!=0)
        {
          $('#error').html("Course Already Exists");
        }
        else{
          $('#error').hide();
        }

      }
      });
      });
    }
    else{
      $('#course').val("");
      $('#div').hide();
    }
  });
  $('#add').click(function(e){
         var file=document.getElementById("file").files[0];
        $('#form1').attr('onsubmit','return false');
        // console.log('hello world');
        formData=new FormData();
        formData.append('sel',$('#sel1').val());
        formData.append('courses',$('#course').val());
        formData.append('description',$('#description').val());
        formData.append('fees',$('#fees').val());
        formData.append('file',file);
    $.ajax({
     type: "POST",
     headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
     },
     data:formData,
     processData: false,
     cache: false,
     contentType: false,
      url: "{{route('addcourse')}}",
      success: function(msg){
        if(msg.message==true)
        {
          $('.modal').modal('hide');
          $('#sel1').val('');
          $('#course').val('');
          $('#description').val('');
          $('#fees').val('');
          $('#file').val('');
          $('#error1').html('');
        }
        else
        {
          console.log(msg.message);
          $("#error1").html(msg.message);
        }
        }
      });
      });


      $('.update').click(function(){
        id=$(this).attr('id');
        value=$('#v_'+id).attr('src');
        file=value.split('/').pop();
    
        $("#sel11 option[value="+$('.h3_'+id).attr('id')+"]").attr("selected",true);
        $('#description1').val($('#p_'+id).html());
        $('#fees1').val($('#h5_'+id).html());
        $('#exampleModal2').modal('show');

       
      });
 
});


</script>

<script>
$(document).ready(function(){
  $('.remove').click(function(){
    id=$(this).attr('id');
  })
  $('#remove').click(function(){
    $('#'+id).remove();
      $.ajax({
     type: "POST",
     data: {"_token": $('meta[name="csrf-token"]').attr('content'),
     'id':id,
     },
     url: "{{route('delcourse')}}",
     success: function(msg){
      
     }
    });
    })
  
})
</script>

  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

        if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
          if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
            $('.fixed-plugin .dropdown').addClass('open');
          }

        }

        $('.fixed-plugin a').click(function(event) {
          // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
  @endsection
</body>

</html>
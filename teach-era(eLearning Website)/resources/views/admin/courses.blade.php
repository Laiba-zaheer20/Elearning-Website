
@extends('layouts.main')
<body class="">
@section('title-name','Courses')
@section('class3','active')
@section('header')
@parent
<link href="assets/css/course.scss" rel="stylesheet" />
<meta name="csrf-token" content="{!! csrf_token() !!}">
@endsection

@section('class3','active')
@section('content')

    <div class="main-panel">
      <div class="content">
         
      <div class="container card" style="background-color:#27293d;margin-top:1%">
  <table class="table table-striped">
    
  <thead>
      <tr>
        <th>Courses</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    @foreach($courses as $stud)
      <tr id="{{$stud->CourseId}}">
        <td>{{$stud->CourseName}}</td>
        <td id="s_{{$stud->CourseId}}">{{$stud->Status}}</td>
        <td>
 
 
 <div>
  <label>
    <input type="radio" name="options1_{{$stud->CourseId}}" value="{{$stud->StatusId}}" <?php echo ($stud->StatusId==1)?'checked':'' ?> />
    <span class="radio"></span>
    <span class="label">Pending</span>
  </label>
  <label>
    <input type="radio"  name="options1_{{$stud->CourseId}}" value="{{$stud->StatusId}}" <?php echo ($stud->StatusId==2)?'checked':'' ?> />
    <span class="radio"></span>
    <span class="label">Approved</span>
  </label>
  </div>
  </td>
    <td><button id="{{$stud->CourseId}}" type="button" style="width:135px;color:#e14eca" class="btn updateit">Update</button></td>  
    <td><div style="color:#e14eca;cursor: pointer;" id="{{$stud->CourseId}}" class="fas fa-times clickit" ></div></td>
  </tr>
    @endforeach

      </tbody>
    </table>
  </div>


  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>Do You really want to delete This Course?</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button id="delit" type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>

      </div>
    </div>

  @endsection
  @section('script')
  <script>

$(document).ready(function() {
  $('.updateit').on("click",function(){
    id=$(this).attr('id');
    t=$("input[name='options1_"+id+"']:checked").val();
    if(t==2){
    t=1
    $("input[name='options1_"+id+"']").val('1');
    }
    else{
    t=2;
    $("input[name='options1_"+id+"']").val('2');
    }
    $.ajax({
     type: "POST",
     data: {"_token": $('meta[name="csrf-token"]').attr('content'),
     'id':id,
     'status':t,
     },
     url:"{{route('updateCourseStatus')}}",
     success: function(msg){
      document.getElementById("s_"+id).innerHTML = msg.status;
    }
    });
  });

  $('.clickit').on("click",function(){
      id=$(this).attr('id');
      $("#exampleModal").modal('show');   
    });
    
    $('#delit').click(function(){
  
    $.ajax({
     type: "POST",
     data: {"_token": $('meta[name="csrf-token"]').attr('content'),
     'id':id,
     },
     url:"{{route('removeCourse')}}",
     success: function(msg){
      $('#'+ id).remove();
    }
    });
  });


});
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
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

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
  @endsection
</body>

</html>
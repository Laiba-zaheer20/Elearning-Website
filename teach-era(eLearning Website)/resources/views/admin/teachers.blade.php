
@extends('layouts.main')

@section('header')
@parent
<link rel="stylesheet" href="assets/css/styles.css?version=1" />
<meta name="csrf-token" content="{!! csrf_token() !!}">
 
@endsection
<body class="">
@section('title-name','Teachers')
@section('class1','active')
@section('content')

@section('navbar')
@parent

@endsection

    <div class="main-panel">
      <div class="content">
        <div style="height:50px;width:100%;display:flex;justify-content:center">
          <div class="input-group mb-3" style="width:50%">
            <input type="text" style="border: solid #e14eca 2px" placeholder="Search Teacher" id="search" class="form-control  search" aria-describedby="button-addon2">
          </div>
        </div>

      <div>
      <div class="loader" style="display:none"></div>
        <!-- Teachers Card -->
        <section class="teacher-cards" id="teacher-cards">
          <div class="container my-3 py-5 text-center">
              <div class="row">
              @foreach($teacher as $t)
                  <div class="col-lg-4 col-md-6">
                      <div class="card" id="{{$t->TeacherId}}">
                          <div class="card-body" >
                          <div class="cross" id="{{$t->TeacherId}}" style="height:20px;display:flex;justify-content:flex-end">
                          <i style="color:#e14eca" class="fas fa-times" data-toggle="modal" data-target="#staticBackdrop"></i>
                          </div>
                          @if($t->Gender=="male")
                              <img src="{{$t->Image}}" onerror=this.src="assets/img/Male1.PNG" class="img-fluid rounded-circle w-50 mb-3">
                            @else
                            <img src="{{$t->Image}}" onerror=this.src="assets/img/female.PNG" class="img-fluid rounded-circle w-50 mb-3">
                            @endif  
                              <h3>{{$t->FirstName.' '. $t->LastName}}</h3>
                              <hr>
                              <p>
                                  Details
                                  <ul class="text-left subject-list">
                                      <li>{{$t->Email}}</li>
                                      <li>Phone no: {{$t->PhoneNo}}</li>
                                      <li>Gender: {{$t->Gender}}</li>
                                      <li>Address: {{$t->Address.", ".$t->CityName}}</li>
                                      <li>Teaching Days: {{$t->Days}}</li>
                                      <li>Teching Method: {{$t->Method}}</li>
                                  </ul>
                                  
                              </p>
                          </div>
                      </div>
                      
                  </div>
                  @endforeach
              </div>
          </div>
    </section>
  
      <footer class="footer">
        <div class="container-fluid">
          <ul class="nav">
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                Creative Tim
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                About Us
              </a>
            </li>
            <li class="nav-item">
              <a href="javascript:void(0)" class="nav-link">
                Blog
              </a>
            </li>
          </ul>
          <div class="copyright">
            ©
            <script>
              document.write(new Date().getFullYear())
            </script>2018 made with <i class="tim-icons icon-heart-2"></i> by
            <a href="javascript:void(0)" target="_blank">Creative Tim</a> for a better web.
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
        <li class="header-title"> Sidebar Background</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger background-color">
            <div class="badge-colors text-center">
              <span class="badge filter badge-primary active" data-color="primary"></span>
              <span class="badge filter badge-info" data-color="blue"></span>
              <span class="badge filter badge-success" data-color="green"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="adjustments-line text-center color-change">
          <span class="color-label">LIGHT MODE</span>
          <span class="badge light-badge mr-2"></span>
          <span class="badge dark-badge ml-2"></span>
          <span class="color-label">DARK MODE</span>
        </li>
        
        <li class="button-container">
          <a href="https://www.creative-tim.com/product/black-dashboard" target="_blank" class="btn btn-primary btn-block btn-round">Download Now</a>
          <a href="https://demos.creative-tim.com/black-dashboard/docs/1.0/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block btn-round">
            Documentation
          </a>
        </li>
        <li class="header-title">Thank you for 95 shares!</li>
        <li class="button-container text-center">
          <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> &middot; 45</button>
          <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> &middot; 50</button>
          <br>
          <br>
          <a class="github-button" href="https://github.com/creativetimofficial/black-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
        </li>
      </ul>
    </div>
  </div>
  

  <!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Remove Teacher</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Do you really want to remove this Teacher?
      </div>
      <div class="modal-footer" style="position:relative;right:0px;bottom:0px">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="remove" data-dismiss="modal">Remove</button>
      </div>
    </div>
  </div>
</div>
  @endsection

@section('script');
<!-- Ajax -->
<script>
$(document).ready(function(){
  $('.cross').click(function(){
    id=$(this).attr('id');
  })
  $('#remove').click(function(){
    $('#'+id).remove();
      $.ajax({
     type: "POST",
     data: {"_token": $('meta[name="csrf-token"]').attr('content'),
     'id':id,
     },
     url: "{{route('delteacher')}}",
     success: function(msg){
    console.log(msg);
     }
    });
    })
  
})
</script>


<script>
$(document).ready(function(){
  $('.search').keyup(function(){
    value=$('#search').val();

    // $(".teacher-cards").fadeOut();
  
    // setTimeout(function(){
    //   $(".loader" ).show();
    // }, 500);
    
    // setTimeout(function(){
    //   $(".loader" ).hide();
    // }, 1500);
 
    // var loadName="{{route('searchteacher')}}?value="+value;


    // setTimeout(function(){
    //  $('.teacher-cards').load(loadName).fadeIn();
    // }, 1500);


      $.ajax({
     type: "POST",
     data: {"_token": $('meta[name="csrf-token"]').attr('content'),
     'value':value,
     },
     url: "{{route('searchteacher')}}",
     success: function(msg){
      $('.row').html(msg);
     }
    });
    })
  
})
</script>


  <script>
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
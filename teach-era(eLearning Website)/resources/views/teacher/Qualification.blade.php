@extends('layouts.mainforteacher')
@section('class3','active')

<body class="">
  <div class="wrapper ">
    @section('sidebar')
    @parent
    @endsection
    
    <div class="main-panel">
    @section('title-name','Qualifications')  
    @section('content')
    <div class="content">
     <div class="container-fluid">
      <div class="card ">
          <div class="card-header card-header-primary" style="display:flex">
                <div style="width:50%;display:flex;align-items:center">
                  <h2 class="card-title">Qualifications</h2>
                </div>
                <div style="width:50%;display:flex;justify-content:flex-end;align-items:center">
                  <h2>
                    <button type="button" style="border:0px;background:transparent;color:white;font-weight:bold" data-toggle="modal" data-target="#exampleModal2">+</button>
                  </h2>
                </div>
          </div>
  

   <div class="card-body" id="changeitplease">
          <div class="table-responsive">
               <table class="table"  id="myTable">
                  <thead class=" text-primary">
                       <th></th>
                       <th>Field</th>
                       <th>Qualification</th>
                       <th>Institute</th>
                      </thead>
              <tbody>

     @foreach($qualification as $stud)
      <tr id="{{$stud->QId}}_{{$stud->FieldId}}_{{$stud->InstituteId}}_{{$stud->TeacherId}}">
        <td><i class="fa fa-certificate" style="color:#9932CC" aria-hidden="true"></i></td>
        <td>{{$stud->Field}}</td>
        <td>{{$stud->Qualification}}</td>
        <td>{{$stud->Institute}}</td>
        <td><div style="color:#9932CC;cursor: pointer;" id="{{$stud->QId}}_{{$stud->FieldId}}_{{$stud->InstituteId}}_{{$stud->TeacherId}}" class="fa fa-close clickit" ></div></td>
     </tr>
     @endforeach
       </tbody>
     </table>
      </div>
        </div>
   </div>
 </div>
 </div>
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Remove Qualification</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div>Do You really want to delete Your Qualification?</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button id="delit" type="button" class="btn btn-primary" data-dismiss="modal">Yes</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Add Qualification</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="form1">
              <div class="modal-body">
                <label for="sel1">Qualification:</label>
                <select class="form-control" name="sel1" id="sel1"  required>
                  <option></option>
                  @foreach($qual as $c)
                  <option value="{{$c->Qualification}}">{{$c->Qualification}}</option>
                  @endforeach
                  <option value="other">other</option>
                </select>
                <br>
                <div id="div12" style="display:none">
                  <input id="qualification1" type="text" value="" placeholder="Qualification Name"  required />
                  <label id="error" style="color:red"></label>
                </div>
                

                <label for="sel12">Field:</label>
                <select class="form-control" name="sel12" id="sel12"  required>
                  <option></option>
                  @foreach($field as $c)
                  <option value="{{$c->Field}}">{{$c->Field}}</option>
                  @endforeach
                  <option value="other">other</option>
                </select>
                <br>
                <div id="div123" style="display:none">
                  <input id="field1" type="text" value="" placeholder="Field "  required />
                  <label id="error2" style="color:red"></label>
                </div>
              
              <label for="sel13">Institute:</label>
                <select class="form-control" name="sel13" id="sel13"  required>
                  <option></option>
                  @foreach($institute as $c)
                  <option value="{{$c->Institute}}">{{$c->Institute}}</option>
                  @endforeach
                  <option value="other">other</option>
                </select>
                <br>
                <div id="div13" style="display:none">
                  <input id="institute1" type="text" value="" placeholder="Course Name"  required />
                  <label id="error3" style="color:red"></label>
                </div>
              
              </div>
              
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="add" class="btn btn-primary">Add Course</button>
              </div>
            </form>     
          </div>
        </div>
      </div>
 <!-- Modal end -->


</div>
  @endsection
  
  @section('script')
  
  <script>
    $(document).ready(function() {

      $('#add').click(function(e){
        option1=$('#sel1').val();
        option2=$('#sel12').val();
        option3=$('#sel13').val();
        other1=$('#qualification1').val();
        other2=$('#field1').val();
        other3=$('#institute1').val();
        
        if(option1 == "other")
        option1=other1;
        if(option2 == "other")
        option2=other2;
        if(option3 == "other")
        option3=other3;
        
    $.ajax({
      type: "POST",
      data: {"_token": $('meta[name="csrf-token"]').attr('content'),
      'option1':option1,
      'option2':option2,
      'option3':option3,
      },
      url: "{{route('addQualification')}}",
      success: function(msg){
      
        $('#exampleModal2').modal('hide');
      var loadname="{{route('changeQualification')}}";
      $("#changeitplease").fadeOut(); 
      $('#changeitplease').load(loadname).fadeIn();
      
    }
      });
      });

    $('#sel1').click(function(){
    option=$('#sel1').val();
    if(option=="other")
    {
      $('#div12').show();
      $('#qualification1').focusout(function(){
      qual=$('#qualification1').val();
      
      $.ajax({
      type: "POST",
      data: {"_token": $('meta[name="csrf-token"]').attr('content'),
      'qual':qual,
      },
      url: "{{route('checkQualification')}}",
      success: function(msg){
        var len=msg.length;
        console.log(len);
        if(len!=1)
        {
          $('#error').html("Course Already Exists");
        }
        else{
          $('#error').html("");
        }
      }
      });
      });
    }
    });


    $('#sel12').click(function(){
    option=$('#sel12').val();
    if(option=="other")
    {
      $('#div123').show();
      $('#field1').focusout(function(){
      qual=$('#field1').val();
      
      $.ajax({
      type: "POST",
      data: {"_token": $('meta[name="csrf-token"]').attr('content'),
      'qual':qual,
      },
      url: "{{route('checkField')}}",
      success: function(msg){
        var len=msg.length;
        console.log(len);
        if(len!=1)
        {
          $('#error2').html("Field Already Exists");
        }
        else{
          $('#error2').html("");
        }
      }
      });
      });
    }
    });



    $('#sel13').click(function(){
    option=$('#sel13').val();
    if(option=="other")
    {
      $('#div13').show();
      $('#institute1').focusout(function(){
      qual=$('#institute1').val();
      
      $.ajax({
      type: "POST",
      data: {"_token": $('meta[name="csrf-token"]').attr('content'),
      'qual':qual,
      },
      url: "{{route('checkInstitute')}}",
      success: function(msg){
        var len=msg.length;
        console.log(len);
        if(len!=1)
        {
          $('#error3').html("Course Already Exists");
        }
        else{
          $('#error3').html("");
        }
      }
      });
      });
    }
    });



    $('.updateit').on("click",function(){
          updateid=$(this).attr('id');
          $("#exampleModal2").modal('show');   
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
            url:"{{route('removeQualification')}}",
            success: function(msg){
              $('#'+ id).remove();
            }
            });
       });
    });
    
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
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initGoogleMaps();
    });
  </script>
  @endsection
</body>

</html>
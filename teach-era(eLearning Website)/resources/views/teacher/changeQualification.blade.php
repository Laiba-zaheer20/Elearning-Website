<html>
<head>
</head>

<div class="card-body">
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

<script>
    $(document).ready(function() {
    
        
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
</script>    
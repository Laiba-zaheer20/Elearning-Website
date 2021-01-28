<section class="teacher-cards" id="teacher-cards">
        <div class="container my-3 py-5 text-center">
            <div class="row">
            @foreach($teacher as $t)
                <div class="col-lg-4 col-md-6 cds">
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
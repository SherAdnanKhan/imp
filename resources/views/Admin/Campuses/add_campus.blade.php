@extends('Admin.layout.master')
@section("page-css")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section("content")
<div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        
                                        <div class="card-body">
                                        <div class="card m-b-20">
                                          <div class="row">
                                                <div class="col-2">
                                                     <a href='/showcampus' class="btn btn-primary">Show Existing Campus</a>
                                                   
                                                </div>
                                            </div>
                                        <div class="card-body"> <h4 class="mt-0 header-title">Add Campus</h4>
                                            <p class="text-muted m-b-30 ">Parsley is a javascript form validation
                                                library. It helps you provide your users with feedback on their form
                                                submission before sending it to your server.</p>

                                            <h4 class="register-heading">Enter Campus Details</h4>
                                          
                                            <form method="post" action="{{ route('addcampus')}}" id="insertcampus" enctype="multipart/form-data">
                                                <div class="row register-form">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label for="Sname">School Name:</label> 
                                                        <small id="schoolname_error" class="form-text text-danger"></small>
                                                            <input type="text" class="form-control" name="schoolname" placeholder="Enter School name *" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label for="Saddress">School Address:</label> 
                                                        <small id="schooladdress_error" class="form-text text-danger"></small>
                                                            <input type="text" class="form-control" name="schooladdress" placeholder="Enter School Address *" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label for="pno">Phone No:</label> 
                                                        <small id="phoneno_error" class="form-text text-danger"></small>
                                                            <input type="text" class="form-control"  name="phoneno" placeholder="Enter Phone No *" value="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row register-form">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label for="Sname">Mobile No:</label> 
                                                        <small id="mobileno_error" class="form-text text-danger"></small>
                                                            <input type="text" class="form-control"  name="mobileno" placeholder="Enter Mobile No *" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label for="Sreg">School Reg:</label>
                                                        <small id="schoolregistration_error" class="form-text text-danger"></small> 
                                                            <input type="text" class="form-control"  name="schoolregistration" placeholder="Enter School Registration *" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label for="Sweb">School Website:</label> 
                                                        <small id="schoolwebsite_error" class="form-text text-danger"></small>
                                                            <input type="text" class="form-control"  name="schoolwebsite" placeholder="Enter School Website *" value="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row register-form">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                        <label for="myfile">Upload School Logo:</label><br>
                                                        <small id="schoollogo_error" class="form-text text-danger"></small>
                                                                                    
                                                        <input type="file" id="myfile" name="schoollogo"  accept="image/*"/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Cid">City id:</label> 
                                                            <small id="city_error" class="form-text text-danger"></small>
                                                            <select name="city" id="city">
                                                            @foreach($cities as $city)
                                                            <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                                            @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Sins">Please Select Instuition type:</label><br> 
                                                            <small id="instuition_error" class="form-text text-danger"></small>
                                                            <label class="radio-inline">
                                                            <input type="radio" name="instuition" value="school" style=" margin: 10px;" > School
                                                            <input type="radio" name="instuition" value="L_instuition" style=" margin: 10px;"> Learning Instution
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row register-form">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="Agt">Agreement:</label><br> 
                                                            <small id="Aggreement_error" class="form-text text-danger"></small>
                                                            <label class="radio-inline">
                                                            <input type="radio" name="Aggreement" value="1"style=" margin: 10px;"> Yes
                                                            <input type="radio" name="Aggreement" value="0"style=" margin: 10px;"> No
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for=agreement>  Agreement date</label>
                                                            <small id="agreementdate_error" class="form-text text-danger"></small>
                                                            <input type="date" class="form-control" name="agreementdate" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for=agreement>  Enter Status:</label><br>
                                                            <small id="status_error" class="form-text text-danger"></small>
                                                            <label class="radio-inline">
                                                            <input type="radio" name="status" value="1" style=" margin: 10px;"> Active 
                                                            <input type="radio" name="status" value="0" style=" margin: 10px;"> Not Active
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row ">
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label for=agreement>SMS</label><br>
                                                            <small id="smsstatus_error" class="form-text text-danger"></small>
                                                            <label class="radio-inline">
                                                            <input type="radio" name="smsstatus" value="1"style=" margin: 10px;"> Allowed
                                                            <input type="radio" name="smsstatus" value="0"style=" margin: 10px;"> Not Allowed
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                            @csrf
                                                        <div class="form-group">
                                                            <label> Enter Billing Details</label>
                                                            <small id="billingcharges_error" class="form-text text-danger"></small>
                                                            <input type="number" class="form-control" name="billingcharges" placeholder="Enter charges *" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                        <label for="">Enter Discount</label>
                                                            <small id="discount_error" class="form-text text-danger"></small>
                                                            <input type="number" class="form-control" name="discount" placeholder="Enter Discount *" value="" />
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group">
                                                            <label> Please Select Billing Date </label>
                                                            <small id="billingdate_error" class="form-text text-danger"></small>
                                                            <input type="date" class="form-control" name="billingdate" placeholder="Enter Agreement date *" value="" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                       <div class="form-group">
                                                       
                                                       </div>
                                                    </div>
                                                </div>
                                                <div class="row register-form">
                                                    <div class="col-md-6">
                                                        <input type="submit" value="Save Campus" id="btn_s" class="btn btn-primary btn-fluid waves-effect waves-light"> 
                                                    </div>
                                                
                                                </div>
                                              


                                            
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>
                             
           
       
     
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div> <!-- content -->
   
@endSection

@section("customscript")
<script>
    $(document).ready(function(){
        $("#city").select2();
    });
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$('body').on('submit','#insertcampus',function(e){
      e.preventDefault();
      $('#schoolname_error').text('');
      $('#schooladdress_error').text('');
      $('#phoneno_error').text('');
      $('#mobileno_error').text('');
      $('#schoolregistration_error').text('');
      $('#schoolwebsite_error').text('');
      $('#schoollogo_error').text('');
      $('#city_error').text('');
      $('#instuition_error').text('');
      $('#Aggreement_error').text('');
      $('#agreementdate_error').text('');
      $('#status_error').text('');
      $('#smsstatus_error').text('');
      $('#billingcharges_error').text('');
      $('#discount_error').text('');
      $('#billingdate_error').text('');
      var fdata = new FormData(this);
      try{
      $.ajax({
        url: '{{url("addcampus")}}',
            type:'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data){
         
                console.log(data);
              },
              error: function(error){
                console.log(error);
                var response = $.parseJSON(error.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
              }
      });
    }
    catch(err){
        alert(failed);
    }
    });

  </script>

@endsection
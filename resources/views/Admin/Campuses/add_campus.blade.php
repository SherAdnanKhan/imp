@extends('Admin.layout.master')
@section("page-css")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section("content")
<div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Blank page</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Agroxa</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                                        <li class="breadcrumb-item active">Blank page</li>
                                    </ol>
            
                                    <div class="state-information d-none d-sm-block">
                                        <div class="state-graph">
                                            <div id="header-chart-1"></div>
                                            <div class="info">Balance $ 2,317</div>
                                        </div>
                                        <div class="state-graph">
                                            <div id="header-chart-2"></div>
                                            <div class="info">Item Sold 1230</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                      

    <div class="container register" style="border-style: solid;border-color: coral;">
                <div style= "width: 120%; margin: 0 auto; padding:50px;" class="row">
               
                    
                    <div class="col-md-9 register-right">
                       
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active " style="padding:20px;margin:20px;" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h4 class="register-heading">Enter Campus Details</h4>
                              <form method="post" action="{{ route('addcampus')}}" id="insertcampus" enctype="multipart/form-data">
                                 <div class="row register-form">

                                    <div class="col-md-6">
                                       
                                        <div class="form-group">
                                        <label for="Sname">School Name:</label> 
                                            <input type="text" class="form-control" name="schoolname" placeholder="Enter School name *" value="" />
                                        </div>
                                        <div class="form-group">
                                        <label for="Saddress">School Address:</label> 
                                            <input type="text" class="form-control" name="schooladdress" placeholder="Enter School Address *" value="" />
                                        </div>
                                        <div class="form-group">
                                        <label for="pno">Phone No:</label> 
                                            <input type="text" class="form-control"  name="phoneno" placeholder="Enter Phone No *" value="" />
                                        </div>
                                        <div class="form-group">
                                        <label for="Sname">Mobile No:</label> 
                                            <input type="text" class="form-control"  name="mobileno" placeholder="Enter Mobile No *" value="" />
                                        </div>
                                        <div class="form-group">
                                        <label for="Sreg">School Reg:</label> 
                                            <input type="text" class="form-control"  name="schoolregistration" placeholder="Enter School Registration *" value="" />
                                        </div>
                                        <div class="form-group">
                                        <label for="Sweb">School Website:</label> 
                                            <input type="text" class="form-control"  name="schoolwebsite" placeholder="Enter School Website *" value="" />
                                        </div>
                                        <div class="form-group">
                                        <label for="myfile">Upload School Logo:</label><br>
                                        <input type="file" id="myfile" name="schoollogo">
                                        </div>
                                        <div class="form-group">
                                        <label for="Cid">City id:</label> 
                                      
                                        <select name="city" id="city">
                                        @foreach($cities as $city)
                                        <option value="{{$city->city_id}}">{{$city->city_name}}</option>
                                        @endforeach
                                        </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="Sins">Please Select Instuition type:</label><br> 
                                         <label class="radio-inline">
                                          <input type="radio" name="instuition" value="school" style=" margin: 10px;" > School
                                          <input type="radio" name="instuition" value="L_instuition" style=" margin: 10px;"> Learning Instution
                                         </label>
                                    </div>
                                    </div>
                                  <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="Agt">Please Select If you accept Agreement:</label><br> 
                                            <label class="radio-inline">
                                              <input type="radio" name="Aggreement" value="1"style=" margin: 10px;"> Yes
                                              <input type="radio" name="Aggreement" value="0"style=" margin: 10px;"> No
                                            </label>
                                        </div>
                                        <div class="form-group">
                                        <label for=agreement> Enter Agreement date</label>
                                       <input type="date" class="form-control" name="agreementdate" value="" />
                                        </div>
                                        <div class="form-group">
                                        <label for=agreement> Please Enter Status:</label><br>
                                         <label class="radio-inline">
                                          <input type="radio" name="status" value="1" style=" margin: 10px;"> Active 
                                          <input type="radio" name="status" value="0" style=" margin: 10px;"> Not Active
                                         </label>
                                        </div>
                                         <div class="form-group">
                                         <label for=agreement> Please Select Sms Allowed or not Allowed:</label><br>
                                        
                                         <label class="radio-inline">
                                          <input type="radio" name="smsstatus" value="1"style=" margin: 10px;"> Allowed
                                          <input type="radio" name="smsstatus" value="0"style=" margin: 10px;"> Not Allowed
                                         </label>
                                         </div>
                                         @csrf
                                         <div class="form-group" style="border-style: solid;border-color: coral; padding:40px">
                                        <label> Enter Billing Details</label>
                                        <br>
                                        <input type="number" class="form-control" name="billingcharges" placeholder="Enter charges *" value="" />
                                        <input type="number" class="form-control" name="discount" placeholder="Enter Discount *" value="" />
                                        <div class="form-group">
                                        <p> Please Select Billing Date</p>
                                            <input type="date" class="form-control" name="billingdate" placeholder="Enter Agreement date *" value="" />
                                        </div>
                                        </div>
                                   
                                    </div>
                                </div>
                                <div class="buttonHolder">
                                    <div class="row">
                                     <div class="col-md-2">
                                <input type="submit"  class="btn btn-primary" value="Submit" id="btn_s"> 
                                     </div>
                                     <div class="col-md-2">
                                <a href='/showcampus' class="btn btn-primary">Show Existing Campus</a>
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
      var fdata = new FormData(this);
      try{
      $.ajax({
        url: '{{url("addcampus")}}',
            type:'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data){
                 alert("submit sucessfully");
                console.log(data);
              },
              error: function(error){
                console.log(error);
              }
      });
    }
    catch(err){
        alert(failed);
    }
    });

  </script>

@endsection
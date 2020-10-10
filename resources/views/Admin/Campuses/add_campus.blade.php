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
                                                        <label for="SEmail">Email</label> 
                                                        <small id="schoolemail_error" class="form-text text-danger"></small>
                                                            <input type="text" class="form-control"  name="schoolemail" placeholder="Enter School Website *" value="" />
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
                                                            <input type="radio" name="status" value="1" style=" margin: 10px;"  checked> Active 
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
                                                            <input type="radio" name="smsstatus" value="0"style=" margin: 10px;" checked> Not Allowed
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
                                                    <div class="col-sm-2"><h5>Permssions</h5></div>
                                                </div>
                                                <div class="row">
                                                    <div class="card-body">
                                                        <div class="card m-b-20">
                                                            <div class="col-sm-12">
                                                            <div class="card">
                                                        </div>
                                                        
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                   <div class="input-group mb-6">
                                                                        <div class="input-group-prepend">
                                                                        <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="USER MANAGMENT">
                                                                            <div class="input-group-text">
                                                                            <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[usermanagment][status]" value="1">
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <span class="button-checkbox">
                                                                            <button type="button" class="btn" data-color="primary">View</button>
                                                                            <input type="checkbox" name="usermanagment[view]" class="hidden" checked value="1" />
                                                                        </span>
                                                                        <span class="button-checkbox">
                                                                            <button type="button" class="btn" data-color="success">Create</button>
                                                                            <input type="checkbox" class="hidden"  name="usermanagment[create]" checked value="1" />
                                                                        </span>
                                                                        <span class="button-checkbox">
                                                                            <button type="button" class="btn" data-color="info">Update</button>
                                                                            <input type="checkbox" class="hidden"  name="usermanagment[updated]" checked value="1" />
                                                                        </span>
                                                                        <span class="button-checkbox">
                                                                            <button type="button" class="btn" data-color="warning"  name="usermanagment[delete]">Delete</button>
                                                                            <input type="checkbox" class="hidden" checked value="1" />
                                                                    </span>  
                                                                </div>
                                                            </div>
                                                            </div> 
                                                                <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Acadamics">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[acadamics][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <!-- <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="acadamics[view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="acadamics[create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="acadamics[updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  name="acadamics[delete]">Delete</button>
                                                                                <input type="checkbox" class="hidden" checked value="1" />
                                                                        </span>  
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="STUDENT MANAGAMENT">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[acadamics][student_manage]status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[acadamics][student_manage][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[acadamics][student_manage][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_pe[acadamics]r[student_manage][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked name="role_per[acadamics][student_manage][delete]" />
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="SESSION / BATCH">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[session]status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[session][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[session][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[session][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked name="role_per[session][delete]" />
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="CLASSES / PROGRAM">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[acadamics][classess][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[acadamics][classess][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[acadamics][classess][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[acadamics][classess][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked name="role_per[acadamics][classess][delete]" value="1" />
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="SECTION /SEMESTER">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[acadamics][sections][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[acadamics][sections][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[acadamics][sections[create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[acadamics][sections][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked name="role_per[acadamics][sections][delete]" value="1" />
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Subjects">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[acadamics][subjects][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[acadamics][subjects][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[acadamics][subjects][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[acadamics][subjects][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[acadamics][subjects][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                            </div> 
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Admission Withdraw">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[admissionwithdraw][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <!-- <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="admissionwithdraw[view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="admissionwithdraw[create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="admissionwithdraw[updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="admissionwithdraw[delete]"/>
                                                                        </span>  
                                                                    </div> -->
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="With-Draw Register">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[admissionwithdraw][withdraw_register][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[admissionwithdraw][withdraw_register][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[admissionwithdraw][withdraw_register][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[admissionwithdraw][withdraw_register][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[admissionwithdraw][withdraw_register][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Register Managment">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[registermanagment][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[registermanagment][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[registermanagment][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[registermanagment][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[registermanagment][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="correspondence">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[correspondence][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <!-- <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="correspondence[view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="correspondence[create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="correspondence[updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="correspondence[delete]"/>
                                                                        </span>  
                                                                    </div> -->
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Complaint Letter Managment">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[complaintletter][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[complaintletter][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[complaintletter][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[complaintletter][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[complaintletter][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Showcause Managment">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[showcause][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[showcause][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[showcause][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[showcause][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[showcause][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Notification">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[notification][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[notification][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[notification][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[notification][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[notification][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Fee Managnent">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[fee_managament][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <!-- <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="fee_managament[view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="fee_managament[create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="fee_managament[updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="fee_managament[delete]"/>
                                                                        </span>  
                                                                    </div> -->
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Define Fee Category">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[fee_category][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[fee_category][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[fee_category][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[fee_category][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[fee_category][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Define Fee">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[define_fee][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[define_fee][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[define_fee][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[define_fee][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[define_fee][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Fee Collection">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[fee_collection][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[fee_collection][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[fee_collection][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[fee_collection][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[fee_collection][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Print Fee Voucher">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[fee_voucher][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[fee_voucher][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[fee_voucher][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[fee_voucher][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="frole_per[ee_voucher][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Fee register">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[fee_register][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[fee_register][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[fee_register][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[fee_registe][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[fee_register][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Family Accounts">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[family_accounts][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[family_accounts][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[family_accounts][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[family_accounts][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[family_accounts][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Student Attendance">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[std_attendance][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <!-- <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="std_attendance[view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="std_attendance[create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="std_attendance[updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="std_attendance[delete]"/>
                                                                        </span>  
                                                                    </div> -->
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Applications">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[application][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[application][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[application][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[application][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[application][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Applications">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[application][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[application][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[application][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[application][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[application][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Attendance Managment">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[std_attendance_manage][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[std_attendance_manage][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[std_attendance_manage][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[std_attendance_manage][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[std_attendance_manage][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Non-Present Report">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[non_present][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[non_present][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[non_present][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[non_present][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[non_present][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="HR Managment">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[hr_managment][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <!-- <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="hr_managment[view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="hr_managment[create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="hr_managment[updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="hr_managment[delete]"/>
                                                                        </span>  
                                                                    </div> -->
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Employee Categories">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[emp_categories][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[emp_categories][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[emp_categories][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[emp_categories][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[emp_categories][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Employee Managment">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[emp_manage][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[emp_manage][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[emp_manage][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[emp_manage][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[emp_manage][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Employee Attendance">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[emp_attendance][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[emp_attendance][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[emp_attendance][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[emp_attendance][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[emp_attendance][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Accounts">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[accounts][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <!-- <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="accounts[view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="accounts[create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="accounts[updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="accounts[delete]"/>
                                                                        </span>  
                                                                    </div> -->
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Assets Category">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[asset_category][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[asset_category][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[role_per[role_per[asset_category][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[role_per[asset_category][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[asset_category][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Assets Managamnet">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[asset_managment][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[asset_managment][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[asset_managment][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[asset_managment][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[asset_managment][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Certificate Managment">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[certificate][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <!-- <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="certificate[view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="certificate[create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="certificate[updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="certificate[delete]"/>
                                                                        </span>  
                                                                    </div> -->
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="SLC">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[slc][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[slc][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[slc][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[slc][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[slc][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Experience">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[experience][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[experience][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[experience][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[experience][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[experience][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <div class="form-group">
                                                                    <div class="input-group mb-6">
                                                                            <div class="input-group-prepend">
                                                                            <input type="text" class="form-control" aria-label="Text input with checkbox" readonly value ="Curricular ">
                                                                                <div class="input-group-text">
                                                                                <input type="checkbox" aria-label="Checkbox for following text input" checked name="role_per[curricular][status]" value="1">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <div class="form-group">
                                                                        <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="primary">View</button>
                                                                                <input type="checkbox" name="role_per[curricular][view]" class="hidden" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="success">Create</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[curricular][create]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="info">Update</button>
                                                                                <input type="checkbox" class="hidden"  name="role_per[curricular][updated]" checked value="1" />
                                                                            </span>
                                                                            <span class="button-checkbox">
                                                                                <button type="button" class="btn" data-color="warning"  >Delete</button>
                                                                                <input type="checkbox" class="hidden" checked  name="role_per[curricular][delete]" value="1"/>
                                                                        </span>  
                                                                    </div>
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


$(function () {
    $('.button-checkbox').each(function () {

        // Settings
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        // Event Handlers
        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });
        $checkbox.on('change', function () {
            updateDisplay();
        });

        // Actions
        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');

            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }

        // Initialization
        function init() {

            updateDisplay();

            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});
</script>
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
      $('#schoolemail_error').text('');
      var fdata = new FormData(this);
      $.ajax({
        url: '{{url("addcampus")}}',
            type:'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data){
                var data = $.parseJSON(data);
                // console.log(data);
              },
            error: function(error){
                console.log(error);
                var response = $.parseJSON(error.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
              }
      });
  
    });

  </script>

@endsection
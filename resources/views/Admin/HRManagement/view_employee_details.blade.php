@extends('Admin.layout.master')
@section("page-css")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section("content")
<section class="content">
   <div class="row">
      
      <h2></h2>
      <div class="col-md-3">
         <div class="box box-primary">
            <div class="box-body box-profile">
               <img class="profile-user-img img-responsive img-circle" src="{{asset('upload')}}/{{$empdata['EMP_IMAGE']}}" alt="User profile picture" style="margin-left:20px; height: 250px; width:250px">
               <h3 class="profile-username text-center">{{ucfirst($empdata->EMP_NAME)}}</h3>
               <ul class="list-group list-group-unbordered">
                  <li class="list-group-item listnoback">
                     <b>Employee #</b> <a class="pull-right text-aqua"> {{ucfirst($empdata->EMP_NO)}}</a>
                  </li>
                  <li class="list-group-item listnoback">
                     <b>CNIC</b> <a class="pull-right text-aqua">{{ucfirst($empdata->CNIC)}}</a>
                  </li>
                  <li class="list-group-item listnoback">
                     <b>Gender</b> <a class="pull-right text-aqua">{{ucfirst($empdata->GENDER)}}</a>
                  </li>
                  <li class="list-group-item listnoback">
                     <b>Designation ID</b> <a class="pull-right text-aqua">{{ucfirst($empdata->DESIGNATION_ID)}}</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <div class="col-md-9">
      <ul class="nav nav-pills nav-justified" role="tablist">
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link active" data-toggle="tab" href="#activity" role="tab">Profile</a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link" data-toggle="tab" href="#documents" role="tab">Salary Information</a>
                                                </li>
                                                
      </ul>
            <div class="tab-content" style="padding:20px;">
               <div class="tab-pane active" id="activity">
                  <div class="tshadow mb25 bozero">
                     <div class="table-responsive around10 pt0">
                        <table class="table table-hover table-striped tmb0">
                           <tbody>
                              <tr>
                                 <td>Date of Birth</td>
                                 <td><p class="text-right">{{date('d-m-Y', strtotime($empdata->EMP_DOB))}}</p></td>
                              </tr>
                              <tr>
                                 <td>Qualifications</td>
                                 <td><p class="text-right">{{$empdata->QUALIFICATION}}</p></td>
                              </tr>
                              <tr>
                                 <td>Allowances</td>
                                 <td><p class="text-right">{{$empdata->ALLOWANCESS}}</p></td>
                              </tr>
                              <tr>
                                 <td>Employee Type</td>
                                 <td><p class="text-right">{{$empdata->EMP_TYPE}}</p></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="tshadow mb25 bozero">
                     <h3 class="pagetitleh2">Details </h3>
                     <div class="table-responsive around10 pt0">
                        <table class="table table-hover table-striped tmb0">
                           <tbody>
                              <tr>
                                 <td class="col-md-4">Current Address</td>
                                 <td class="col-md-5">{{$empdata->ADDRESS}}</td>
                              </tr>
                              <tr>
                                 <td>Joining Date</td>
                                 <td><p class="text-right">{{date('d-m-Y', strtotime($empdata->JOINING_DATE))}}</p></td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
             
               </div>
              
               <div class="tab-pane" id="documents">
                  <div class="timeline-header no-border">
                     <button type="button" data-student-session-id="11" class="btn btn-xs btn-primary pull-right myTransportFeeBtn"> <i class="fa fa-upload"></i>  Upload Documents</button>
                     <!-- <h2 class="page-header"> </h2> -->
                     <div class="table-responsive" style="clear: both;">
                        <div class="row">                                     
                        </div>
                        <table class="table table-striped table-bordered table-hover">
                           <thead>
                              <tr>
                                 <th>
                                    Title                                                
                                 </th>
                                 <th>
                                    Name                                                
                                 </th>
                                 <th class="mailbox-date text-right">
                                    Action                                                
                                 </th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td colspan="5" class="text-danger text-center">No Record Found</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   
</section>
@endsection

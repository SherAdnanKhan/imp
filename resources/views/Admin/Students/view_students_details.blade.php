@extends('Admin.layout.master')
@section("page-css")
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

@endsection
@section("content")
<section class="content">
   <div class="row">
      <div class="col-md-3">
         <div class="box box-primary">
            <div class="box-body box-profile">
               <img class="profile-user-img img-responsive img-circle" src="{{asset('upload')}}/{{$student['IMAGE']}}" onerror="this.src='https://via.placeholder.com/200'" alt="User profile picture" style="height: 250px; width:250px">
               <h3 class="profile-username text-center">Kriti Singh</h3>
               <ul class="list-group list-group-unbordered">
                  <li class="list-group-item listnoback">
                     <b>Admission No</b> <a class="pull-right text-aqua"> {{$student['IMAGE']}}</a>
                  </li>
                  <li class="list-group-item listnoback">
                     <b>Roll Number</b> <a class="pull-right text-aqua">111</a>
                  </li>
                  <li class="list-group-item listnoback">
                     <b>Class</b> <a class="pull-right text-aqua">Class 1 (2020-21)</a>
                  </li>
                  <li class="list-group-item listnoback">
                     <b>Section</b> <a class="pull-right text-aqua">B</a>
                  </li>
                  <li class="list-group-item listnoback">
                     <b>RTE</b> <a class="pull-right text-aqua">No</a>
                  </li>
                  <li class="list-group-item listnoback">
                     <b>Gender</b> <a class="pull-right text-aqua">Female</a>
                  </li>
               </ul>
            </div>
         </div>
      </div>
      <div class="col-md-9">
         <div class="nav-tabs-custom theme-shadow">
            <ul class="nav nav-tabs">
               <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true" data-original-title="" title="">Profile</a></li>
               <li class=""><a href="#fee" data-toggle="tab" aria-expanded="false" data-original-title="" title="">Fees</a></li>
               <li class=""><a href="#documents" data-toggle="tab" aria-expanded="false" data-original-title="" title="">Documents</a></li>
               <li class=""><a href="#timelineh" data-toggle="tab" aria-expanded="false" data-original-title="" title="">Timeline</a></li>
               <li class="pull-right dropdown">
                  <a href="#" class="dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></a>
                  <ul class="dropdown-menu">
                     <li><a style="cursor: pointer;" onclick="send_password()"> Send Student Password</a></li>
                     <li><a style="cursor: pointer;" onclick="send_parent_password()">  Send Parent Password</a></li>
                  </ul>
               </li>
               <li class="pull-right">
                  <a style="cursor: pointer;" onclick="disable_student('11')" class="text-red" data-toggle="tooltip" data-placement="bottom" title="Disable">
                  <i class="fa fa-thumbs-o-down"></i>                                    </a>
               </li>
               <li class="pull-right">
                  <a href="#" class="schedule_modal text-green" data-toggle="tooltip" data-placement="bottom" title="Login Details"><i class="fa fa-key"></i>
                  </a>
               </li>
               <li class="pull-right">
                  <a href="https://demo.smart-school.in/student/edit/11" class="" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-pencil"></i>
                  </a>
               </li>
            </ul>
            <div class="tab-content">
               <div class="tab-pane active" id="activity">
                  <div class="tshadow mb25 bozero">
                     <div class="table-responsive around10 pt0">
                        <table class="table table-hover table-striped tmb0">
                           <tbody>
                              <tr>
                                 <td class="col-md-4">Admission Date</td>
                                 <td class="col-md-5">                                          
                                    02/05/2020
                                 </td>
                              </tr>
                              <tr>
                                 <td>Date of Birth</td>
                                 <td>02/04/2005</td>
                              </tr>
                              <tr>
                                 <td>Category</td>
                                 <td>
                                    General                                         
                                 </td>
                              </tr>
                              <tr>
                                 <td>Mobile Number</td>
                                 <td>49456454</td>
                              </tr>
                              <tr>
                                 <td>Caste</td>
                                 <td>Hindu</td>
                              </tr>
                              <tr>
                                 <td>Religion</td>
                                 <td>Rajpoot</td>
                              </tr>
                              <tr>
                                 <td>Email</td>
                                 <td>kriti@gmail.com</td>
                              </tr>
                              <tr>
                                 <td>Medical History</td>
                                 <td>
                                 </td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="tshadow mb25 bozero">
                     <h3 class="pagetitleh2">Address </h3>
                     <div class="table-responsive around10 pt0">
                        <table class="table table-hover table-striped tmb0">
                           <tbody>
                              <tr>
                                 <td class="col-md-4">Current Address</td>
                                 <td class="col-md-5">89 Vento Apartment, CA</td>
                              </tr>
                              <tr>
                                 <td>Permanent Address</td>
                                 <td>89 Vento Apartment, CA</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="tshadow mb25 bozero">
                     <h3 class="pagetitleh2">Parent / Guardian Details </h3>
                     <div class="table-responsive around10 pt10">
                        <table class="table table-hover table-striped tmb0">
                           <tbody>
                              <tr>
                                 <td class="col-md-4">Father Name</td>
                                 <td class="col-md-5">Manish Singh</td>
                                 <td rowspan="3"><img class="profile-user-img img-responsive img-circle" src="https://demo.smart-school.in/uploads/student_images/11father.jpg"></td>
                              </tr>
                              <tr>
                                 <td>Father Phone</td>
                                 <td>165465415</td>
                              </tr>
                              <tr>
                                 <td>Father Occupation</td>
                                 <td>Business</td>
                              </tr>
                              <tr>
                                 <td>Mother Name</td>
                                 <td>Megha</td>
                                 <td rowspan="3"><img class="profile-user-img img-responsive img-circle" src="https://demo.smart-school.in/uploads/student_images/11mother.jpg"></td>
                              </tr>
                              <tr>
                                 <td>Mother Phone</td>
                                 <td>654654444</td>
                              </tr>
                              <tr>
                                 <td>Mother Occupation</td>
                                 <td>Housewife</td>
                              </tr>
                              <tr>
                                 <td>Guardian Name</td>
                                 <td>Megha</td>
                                 <td rowspan="3"><img class="profile-user-img img-responsive img-circle" src="https://demo.smart-school.in/uploads/student_images/11guardian.jpg"></td>
                              </tr>
                              <tr>
                                 <td>Guardian Email</td>
                                 <td>megha@gmail.com</td>
                              </tr>
                              <tr>
                                 <td>Guardian Relation</td>
                                 <td>Mother</td>
                              </tr>
                              <tr>
                                 <td>Guardian Phone</td>
                                 <td>654654444</td>
                              </tr>
                              <tr>
                                 <td>Guardian Occupation</td>
                                 <td>Housewife</td>
                              </tr>
                              <tr>
                                 <td>Guardian Address</td>
                                 <td>89 Vento Apartment, CA</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="tshadow mb25  bozero">
                     <h3 class="pagetitleh2">Route Details</h3>
                     <div class="table-responsive around10 pt0">
                        <table class="table table-hover table-striped tmb0">
                           <tbody>
                              <tr>
                                 <td class="col-md-4">Route</td>
                                 <td class="col-md-5">Brooklyn Central</td>
                              </tr>
                              <tr>
                                 <td class="col-md-4">Vehicle Number</td>
                                 <td class="col-md-5">VH5645</td>
                              </tr>
                              <tr>
                                 <td>Driver Name</td>
                                 <td>Maximus</td>
                              </tr>
                              <tr>
                                 <td>Driver Contact</td>
                                 <td>5456456</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
                  <div class="tshadow mb25  bozero">
                     <h3 class="pagetitleh2">Miscellaneous Details</h3>
                     <div class="table-responsive around10 pt0">
                        <table class="table table-hover table-striped tmb0">
                           <tbody>
                              <tr>
                                 <td class="col-md-4">Blood Group</td>
                                 <td class="col-md-5"></td>
                              </tr>
                              <tr>
                                 <td class="col-md-4">Student House</td>
                                 <td class="col-md-5"></td>
                              </tr>
                              <tr>
                                 <td class="col-md-4">Height</td>
                                 <td class="col-md-5">3.5 Feet</td>
                              </tr>
                              <tr>
                                 <td class="col-md-4">Weight</td>
                                 <td class="col-md-5">30 KG</td>
                              </tr>
                              <tr>
                                 <td class="col-md-4">As on Date</td>
                                 <td class="col-md-5">02/03/2020</td>
                              </tr>
                              <tr>
                                 <td class="col-md-4">Previous School Details</td>
                                 <td class="col-md-5"></td>
                              </tr>
                              <tr>
                                 <td class="col-md-4">National Identification Number</td>
                                 <td class="col-md-5">4564564564</td>
                              </tr>
                              <tr>
                                 <td>Local Identification Number</td>
                                 <td>654654654</td>
                              </tr>
                              <tr>
                                 <td>Bank Account Number</td>
                                 <td>6546144</td>
                              </tr>
                              <tr>
                                 <td>Bank Name</td>
                                 <td>CBS BANK</td>
                              </tr>
                              <tr>
                                 <td>IFSC Code</td>
                                 <td>56464564</td>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
               <div class="tab-pane" id="fee">
                  <div class="table-responsive">
                     <table class="table table-hover table-striped">
                        <thead>
                           <tr>
                              <th>Fees Group</th>
                              <th>Fees Code</th>
                              <th class="text text-left">Due Date</th>
                              <th class="text text-left">Status</th>
                              <th class="text text-right">Amount <span>($)</span></th>
                              <th class="text text-left">Payment Id</th>
                              <th class="text text-left">Mode</th>
                              <th class="text text-left">Date</th>
                              <th class="text text-right">Discount <span>($)</span></th>
                              <th class="text text-right">Fine <span>($)</span></th>
                              <th class="text text-right">Paid <span>($)</span></th>
                              <th class="text text-right">Balance</th>
                           </tr>
                        </thead>
                        <tbody>
                           <tr class="dark-gray">
                              <td>Class 1 General</td>
                              <td>apr-month-fees</td>
                              <td class="text text-left">
                                 04/10/2020                                                        
                              </td>
                              <td class="text text-left">
                                 <span class="label label-success">Paid</span>
                              </td>
                              <td class="text text-right">300.00</td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">300.00</td>
                              <td class="text text-right">
                              </td>
                           </tr>
                           <tr class="white-td">
                              <td class="text-left"></td>
                              <td class="text-left"></td>
                              <td class="text-left"></td>
                              <td class="text-left"></td>
                              <td class="text-right"><img src="https://demo.smart-school.in/backend/images/table-arrow.png" alt=""></td>
                              <td class="text text-left">
                                 <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title=""> 57/1</a>
                                 <div class="fee_detail_popover" style="display: none">
                                    <p class="text text-info"> Collected By: Joe Black(9000)</p>
                                 </div>
                              </td>
                              <td class="text text-left">Cash</td>
                              <td class="text text-center">
                                 04/06/2020                                                                
                              </td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">300.00</td>
                              <td></td>
                           </tr>
                           <tr class="danger font12">
                              <td>Class 1 General</td>
                              <td>may-month-fees</td>
                              <td class="text text-left">
                                 05/04/2020                                                        
                              </td>
                              <td class="text text-left">
                                 <span class="label label-danger">Unpaid</span>
                              </td>
                              <td class="text text-right">300.00</td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">300.00
                              </td>
                           </tr>
                           <tr class="danger font12">
                              <td>Class 1 General</td>
                              <td>jun-month-fees</td>
                              <td class="text text-left">
                                 06/03/2020                                                        
                              </td>
                              <td class="text text-left">
                                 <span class="label label-danger">Unpaid</span>
                              </td>
                              <td class="text text-right">300.00</td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">300.00
                              </td>
                           </tr>
                           <tr class="danger font12">
                              <td>Class 1 General</td>
                              <td>jul-month-fees</td>
                              <td class="text text-left">
                                 07/02/2020                                                        
                              </td>
                              <td class="text text-left">
                                 <span class="label label-danger">Unpaid</span>
                              </td>
                              <td class="text text-right">300.00</td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">300.00
                              </td>
                           </tr>
                           <tr class="danger font12">
                              <td>Class 1 General</td>
                              <td>aug-month-fees</td>
                              <td class="text text-left">
                                 08/02/2020                                                        
                              </td>
                              <td class="text text-left">
                                 <span class="label label-danger">Unpaid</span>
                              </td>
                              <td class="text text-right">300.00</td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">300.00
                              </td>
                           </tr>
                           <tr class="danger font12">
                              <td>Class 1 General</td>
                              <td>sep-month-fees</td>
                              <td class="text text-left">
                                 09/02/2020                                                        
                              </td>
                              <td class="text text-left">
                                 <span class="label label-danger">Unpaid</span>
                              </td>
                              <td class="text text-right">300.00</td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">300.00
                              </td>
                           </tr>
                           <tr class="danger font12">
                              <td>Class 1 General</td>
                              <td>oct-month-fees</td>
                              <td class="text text-left">
                                 10/02/2020                                                        
                              </td>
                              <td class="text text-left">
                                 <span class="label label-danger">Unpaid</span>
                              </td>
                              <td class="text text-right">300.00</td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">300.00
                              </td>
                           </tr>
                           <tr class="dark-gray">
                              <td>Class 1 General</td>
                              <td>nov-month-fees</td>
                              <td class="text text-left">
                                 11/04/2020                                                        
                              </td>
                              <td class="text text-left">
                                 <span class="label label-danger">Unpaid</span>
                              </td>
                              <td class="text text-right">300.00</td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">300.00
                              </td>
                           </tr>
                           <tr class="dark-gray">
                              <td>Class 1 General</td>
                              <td>dec-month-fees</td>
                              <td class="text text-left">
                                 12/02/2020                                                        
                              </td>
                              <td class="text text-left">
                                 <span class="label label-danger">Unpaid</span>
                              </td>
                              <td class="text text-right">300.00</td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">300.00
                              </td>
                           </tr>
                           <tr class="dark-gray">
                              <td>Class 1 General</td>
                              <td>caution-money-fees</td>
                              <td class="text text-left">
                                 12/02/2020                                                        
                              </td>
                              <td class="text text-left">
                                 <span class="label label-danger">Unpaid</span>
                              </td>
                              <td class="text text-right">1000.00</td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">1000.00
                              </td>
                           </tr>
                           <tr class="dark-gray">
                              <td>Class 1 General</td>
                              <td>exam-fees</td>
                              <td class="text text-left">
                                 12/04/2020                                                        
                              </td>
                              <td class="text text-left">
                                 <span class="label label-danger">Unpaid</span>
                              </td>
                              <td class="text text-right">250.00</td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">250.00
                              </td>
                           </tr>
                           <tr class="dark-gray">
                              <td>Class 1 General</td>
                              <td>jan-month-fees</td>
                              <td class="text text-left">
                                 01/02/2021                                                        
                              </td>
                              <td class="text text-left">
                                 <span class="label label-danger">Unpaid</span>
                              </td>
                              <td class="text text-right">300.00</td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">300.00
                              </td>
                           </tr>
                           <tr class="dark-gray">
                              <td>Class 1 General</td>
                              <td>feb-month-fees</td>
                              <td class="text text-left">
                                 01/02/2021                                                        
                              </td>
                              <td class="text text-left">
                                 <span class="label label-danger">Unpaid</span>
                              </td>
                              <td class="text text-right">300.00</td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-left"></td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">0.00</td>
                              <td class="text text-right">300.00
                              </td>
                           </tr>
                           <tr class="box box-solid total-bg">
                              <td></td>
                              <td></td>
                              <td></td>
                              <td class="text text-right">Grand Total</td>
                              <td class="text text-right">$4550.00</td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td class="text text-right">$0.00</td>
                              <td class="text text-right">$0.00</td>
                              <td class="text text-right">$300.00</td>
                              <td class="text text-right">$4250.00</td>
                           </tr>
                        </tbody>
                     </table>
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
               <div class="tab-pane" id="timelineh">
                  <div>                                       <input type="button" id="myTimelineButton" class="btn btn-sm btn-primary pull-right " value="Add"> 
                  </div>
                  <br>
                  <div class="timeline-header no-border">
                     <div id="timeline_list">
                        <br>
                        <div class="alert alert-info">No Record Found</div>
                     </div>
                     <!-- <h2 class="page-header"> </h2> -->
                  </div>
               </div>
               <div class="tab-pane" id="exam">
                  <div class="examgroup_result1"> </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection

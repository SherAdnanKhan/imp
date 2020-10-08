@extends('Admin.layout.master')
@section("page-css")
    <link rel="stylesheet" type="text/css" href="{{ url('assets/dist/css/dropify.min.css') }}">
@endsection
@section("content")


<div class="col-md-12">
   <div class="box box-primary">
      <div class="pull-right box-tools impbtntitle">
         <a href="https://demo.smart-school.in/student/import">
         <button class="btn btn-primary btn-sm"><i class="fa fa-upload"></i> Import Student</button>
         </a>
      </div>
      <form id="form1" action="https://demo.smart-school.in/student/create" name="employeeform" method="post" accept-charset="utf-8" enctype="multipart/form-data">
         <div class="">
            <div class="bozero">
               <h4 class="pagetitleh-whitebg">Student Admission </h4>
               <div class="around10">
                  <input type="hidden" name="ci_csrf_token" value="">
                  <input type="hidden" name="sibling_name" value="" id="sibling_name_next">
                  <input type="hidden" name="sibling_id" value="0" id="sibling_id">
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Admission No</label> <small class="req"> *</small>
                           <input autofocus="" id="admission_no" name="admission_no" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                           <span class="text-danger">
                              <p>The Admission No field is required.</p>
                           </span>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Class</label><small class="req"> *</small>
                           <select id="class_id" name="class_id" class="form-control">
                              <option value="">Select</option>
                              <option value="1" selected="selected">Class 1</option>
                              <option value="2">Class 2</option>
                              <option value="3">Class 3</option>
                           </select>
                           <span class="text-danger"></span>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Section</label><small class="req"> *</small>
                           <select id="section_id" name="section_id" class="form-control">
                              <option value="">Select</option>
                              <option value="1">A</option>
                              <option value="2" selected="">B</option>
                              <option value="3">C</option>
                           </select>
                           <span class="text-danger"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="exampleInputEmail1">First Name</label><small class="req"> *</small>
                           <input id="firstname" name="firstname" placeholder="" type="text" class="form-control" value="">
                           <span class="text-danger">
                              <p>The First Name field is required.</p>
                           </span>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Last Name</label>
                           <input id="lastname" name="lastname" placeholder="" type="text" class="form-control" value="">
                           <span class="text-danger"></span>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="exampleInputFile"> Gender</label><small class="req"> *</small>
                           <select class="form-control" name="gender">
                              <option value="">Select</option>
                              <option value="Male">Male</option>
                              <option value="Female" selected="">Female</option>
                           </select>
                           <span class="text-danger"></span>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Date of Birth</label><small class="req"> *</small>
                           <input id="dob" name="dob" placeholder="" type="text" class="form-control date" value="">
                           <span class="text-danger">
                              <p>The Date of Birth field is required.</p>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-2">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Religion</label>
                           <input id="religion" name="religion" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                           <span class="text-danger"></span>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Email</label>
                           <input id="email" name="email" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                           <span class="text-danger"></span>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Admission Date</label>
                           <input id="admission_date" name="admission_date" placeholder="" type="date" class="form-control date" value="" >
                           <span class="text-danger"></span>
                        </div>
                     </div>
                     <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Blood Group</label>
                           <select class="form-control" rows="3" placeholder="" name="blood_group" autocomplete="off">
                              <option value="">Select</option>
                              <option value="O+">O+</option>
                              <option value="A+">A+</option>
                              <option value="B+">B+</option>
                              <option value="AB+">AB+</option>
                              <option value="O-">O-</option>
                              <option value="A-">A-</option>
                              <option value="B-">B-</option>
                              <option value="AB-">AB-</option>
                           </select>
                           <span class="text-danger"></span>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Present address</label>
                           <input type="text" name="present_address" class="form-control" value="" autocomplete="off">
                           <span class="text-danger"></span>
                        </div>
                     </div>
                     <div class="col-md-3 col-xs-12">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Premanent Address</label>
                           <input type="text" name="premanent_address" class="form-control" value="" autocomplete="off">
                           <span class="text-danger"></span>
                        </div>
                     </div>
                     <div class="col-md-3" style="display:none;">
                        <div class="form-group">
                           <label for="exampleInputEmail1">Fees Discount</label>
                           <input id="fees_discount" name="fees_discount" placeholder="" type="text" class="form-control" value="0">
                           <span class="text-danger"></span>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <label for="upload">Upload Student picture</label>
                        <input type="file" name="picture" id="input-file-now" size="20" class="dropify" />
                     </div>
                     <div class="col-md-3">
                        <label for="upload">Upload Cnic/Form B picture</label>
                        <input type="file" name="cnic" id="input-file-now"  size="20" class="dropify" />
                     </div>
                  </div>
               </div>
               <div class="bozero">
                  <h4 class="pagetitleh2">Parent Guardian Detail</h4>
                  <div class="around10">
                     <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Father Name</label>
                              <input id="father_name" name="father_name" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                              <span class="text-danger"></span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Father Phone</label>
                              <input id="father_phone" name="father_phone" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                              <span class="text-danger"></span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Secondary Phone no</label>
                              <input id="father_secphone" name="father_secphone" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                              <span class="text-danger"></span>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Father Occupation</label>
                              <input id="father_occupation" name="father_occupation" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                              <span class="text-danger"></span>
                           </div>
                        </div>
                     </div>
                     <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Save</button>
                     </div>
                  </div>
      </form>
   </div>
</div>
      </div>
   </div>
</div>
@endsection
@section("customscript")
<script>
   $(document).ready(function(){
    $('.dropify').dropify();
   });
</script>
@endsection
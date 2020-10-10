@extends('Admin.layout.master')
@section("page-css")
    <link rel="stylesheet" type="text/css" href="{{ url('assets/dist/css/dropify.min.css') }}">
@endsection
@section("content")
<a href="{{route('showstudent')}}" class="btn btn-info">Show Existing Students</a>
      <h4 class="pagetitleh-whitebg">Student Admission </h4>
    
      <form id="updatestudent" action="{{route('updatestudent')}}"  method="post" accept-charset="utf-8" enctype="multipart/form-data">
           @csrf
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="exampleInputNAME1">Student Name </label> 
                           <small class="req"> *</small>
                           <input id="STUDENT_ID" name="STUDENT_ID" placeholder="" type="hidden" value="{{$student['STUDENT_ID']}}" class="form-control">
                           <input id="NAME" name="NAME" placeholder="" type="text" value="{{$student['NAME']}}" class="form-control">
                           <small id="NAME_error" class="form-text text-danger"></small>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="exampleInpUTFNAME1">FATHER NAME</label>
                           <small class="req"> *</small>
                           <input id="FATHER_NAME" name="FATHER_NAME" placeholder="" type="text" value="{{$student['FATHER_NAME']}}" class="form-control">
                           <small id="FATHER_NAME_error" class="form-text text-danger"></small> 
                        </div>
                     </div>
                     <div class="col-md-3">
                           <div class="form-group">
                              <label for="exampleInputFNO1">Father Phone</label>
                              <small class="req"> *</small>
                              <input id="FATHER_CONTACT" name="FATHER_CONTACT" placeholder="" type="text" value="{{$student['FATHER_CONTACT']}}" class="form-control" >
                              <small id="FATHER_CONTACT_error" class="form-text text-danger"></small>
                           </div>
                     </div>
                     <div class="col-md-3">
                           <div class="form-group">
                              <label for="exampleInputFSNO1">Secondary Phone no</label>
                              <small class="req"> *</small>
                              <input id="SECONDARY_CONTACT" name="SECONDARY_CONTACT" placeholder="" type="text" value="{{$student['SECONDARY_CONTACT']}}" class="form-control" >
                              <small id="SECONDARY_CONTACT_error" class="form-text text-danger"></small>
                           </div>
                     </div>
                  <div>
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                        
                           <label for="exampleInputGen"> Gender</label>
                           <small class="req"> *</small>
                           <select class="form-control" name="GENDER">
                              <option value="">Select</option>
                              <option value="Male" <?php if($student['GENDER']=="Male") echo 'selected="selected"'; ?> >Male</option>
                              <option value="Female" <?php if($student['GENDER']=="Female") echo 'selected="selected"'; ?> >Female</option>
                           </select>
                           <small id="GENDER_error" class="form-text text-danger"></small>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="exampleInputdob1">Date of Birth</label>
                           <small class="req"> *</small>
                           <input id="DOB" name="DOB" placeholder="" type="date" value="{{$student['DOB']}}" class="form-control date">
                           <small id="DOB_error" class="form-text text-danger"></small>
                        </div>
                     </div>

                     <div class="col-md-3">
                           <div class="form-group">
                              <label for="exampleInputFNO1">CNIC</label>
                              <small class="req"> *</small>
                              <input id="CNIC" name="CNIC" placeholder="" type="text"  value="{{$student['CNIC']}}" class="form-control" >
                              <small id="CNIC_error" class="form-text text-danger"></small>
                           </div>
                     </div>
                     <div class="col-md-3">
                           <div class="form-group">
                              <label for="exampleInputFNO1">RELIGION</label>
                              <small class="req"> *</small>
                              <input id="RELIGION" name="RELIGION" placeholder="" type="text" value="{{$student['RELIGION']}}" class="form-control" >
                              <small id="RELIGION_error" class="form-text text-danger"></small>
                           </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="Sins">Please Select SHIFT:</label>
                           <small class="req"> *</small>
                           <label class="radio-inline">
                           @php ($student['SHIFT']=='1')  @endphp
                           <small id="SHIFT_err" class="form-text text-danger"></small>
                           <input type="radio" id="Morning" name="SHIFT"  <?php echo($student['SHIFT']=='1'?'checked':''); ?> value="1" style=" margin: 10px;" > Morning
                           <input type="radio" id="Evening" name="SHIFT"  <?php echo ($student['SHIFT']=='2'?'checked':''); ?>  value="2" style=" margin: 10px;"> Evening
                           </label>
                           <small id="SHIFT_error" class="form-text text-danger"></small>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="exampleInputPAl1">Present address</label>
                           <small class="req"> *</small>
                           <input type="text" id="PRESENT_ADDRESS" name="PRESENT_ADDRESS" value="{{$student['PRESENT_ADDRESS']}}" class="form-control" >
                           <small id="PRESENT_ADDRESSerror" class="form-text text-danger"></small>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="exampleInputPAl1">PERMANENT ADDRESS</label>
                           <small class="req"> *</small>
                           <input type="text" id="PERMANENT_ADDRESS" name="PERMANENT_ADDRESS" value="{{$student['PERMANENT_ADDRESS']}}" class="form-control" >
                           <small id="PERMANENT_ADDRESS_error" class="form-text text-danger"></small>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="exampleInpUTFNAME1">GUARDIAN NAME</label>
                           <small class="req"> *</small>
                           <input id="GUARDIAN" name="GUARDIAN" placeholder="" type="text" value="{{$student['GUARDIAN']}}" class="form-control">
                           <small id="GUARDIAN_error" class="form-text text-danger"></small> 
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                           <div class="form-group">
                              <label for="exampleInputFNO1">GUARDIAN CNIC</label>
                              <small class="req"> *</small>
                              <input id="GUARDIAN_CNIC" name="GUARDIAN_CNIC" placeholder="" type="text" value="{{$student['GUARDIAN_CNIC']}}" class="form-control" >
                              <small id="GUARDIAN_CNIC_error" class="form-text text-danger"></small>
                           </div>
                     </div>
                     <div class="col-md-3">
                           <div class="form-group">
                              <label for="exampleInputFNO1">School Leaving Certificate</label>
                              <small class="req"> *</small>
                              <input id="SLC_NO" name="SLC_NO" placeholder="" type="number" value="{{$student['SLC_NO']}}" class="form-control" >
                              <small id="SLC_NO_error" class="form-text text-danger"></small>
                           </div>
                     </div>
                     <div class="col-md-3">
                           <div class="form-group">
                              <label for="exampleInputFNO1">Previous University/School Name</label>
                              <small class="req"> *</small>
                              <input id="PREV_BOARD_UNI" name="PREV_BOARD_UNI" placeholder="" type="text" value="{{$student['PREV_BOARD_UNI']}}" class="form-control" >
                              <small id="PREV_BOARD_UNI_error" class="form-text text-danger"></small>
                           </div>
                     </div>
                     <div class="col-md-3">
                        <div class="form-group">
                           <label for="exampleInputdob1">Passing year</label>
                           <small class="req"> *</small>
                           <input id="PASSING_YEAR" name="PASSING_YEAR" placeholder="" type="date" value="{{$student['PASSING_YEAR']}}" class="form-control date">
                           <small id="PASSING_YEAR_error" class="form-text text-danger"></small>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                        <label for="upload">Upload Student picture</label>
                        <input type="file" name="IMAGE" id="IMAGE" size="20" class="dropify" accept="image/*"/>
                        <img src="{{ asset('upload')}}/{{$student['IMAGE']}}" alt="No image Found" style="width: 50px;height:50px;">
                        <small id="IMAGE_error" class="form-text text-danger"></small>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="exampleInputdob1">Previous Class Marks</label>
                           <small class="req"> *</small>
                           <input id="PREV_CLASS_MARKS" name="PREV_CLASS_MARKS" placeholder="" type="text" value="{{$student['PREV_CLASS_MARKS']}}" class="form-control date">
                           <small id="PREV_CLASS_MARKS_error" class="form-text text-danger"></small>
                        </div>
                     </div>
                     <div class="col-md-4">
                        <div class="form-group">
                           <label for="exampleInputsection1">Select Class :  </label>
                              <small class="req"> *</small>
                              <select name="PREV_CLASS" id="PREV_CLASS" style="text-indent: 10px; color:#85144b; width: 150px;font-size: 20px; margin: 10px;">
                              @foreach($classes as $class)
                             <option value="{{$class->Class_id}}" <?php if($student['PREV_CLASS']==$class->Class_id) echo 'selected="selected"'; ?>>{{$class->Class_name}}</option>
                                   @endforeach
                             </select>
                             <small id="PREV_CLASS_error" class="form-text text-danger"></small>
                        </div>
                     </div>
                  </div>  
                
                  <div class="box-footer text-center">
                        <button type="submit" class="btn btn-info center">Update </button>
      </form>
@endsection
@section("customscript")
<script>
   $(document).ready(function(){
    $('.dropify').dropify();
   });
</script>
<script>

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$('body').on('submit','#updatestudent',function(e){
      e.preventDefault();
      $('#NAME_error').text('');
      $('#FATHER_NAME_error').text('');
      $('#FATHER_CONTACT_error').text('');
      $('#SECONDARY_CONTACT_error').text('');
      $('#GENDER_error').text('');
      $('#DOB_error').text('');
      $('#CNIC_error').text('');
      $('#RELIGION_error').text('');
      $('#FATHER_CNIC_error').text('');
      $('#SHIFT_error').text('');
      $('#PRESENT_ADDRESS_error').text('');
      $('#PERMANENT_ADDRESS_error').text('');
      $('#GUARDIAN_error').text('');
      $('#GUARDIAN_CNIC_error').text('');
      $('#IMAGE_error').text('');
      $('#PREV_CLASS_error').text('');
      $('#SLC_NO_error').text('');
      $('#PREV_CLASS_MARKS_error').text('');
      $('#PREV_BOARD_UNI_error').text('');
      $('#PASSING_YEAR_error').text('');
      var fdata = new FormData(this);
      $.ajax({
        url: '{{url("updatestudent")}}',
            type:'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data){
               console.log(data)
               toastr.success(data,'Notice');
               $("#updatestudent").get(0).reset();
               location.reload();
              },
              error: function(error){
               console.log(error);
               toastr.error('Please Fill the Required Fields','Notice');
               var response = $.parseJSON(error.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
    }
      

              
      });
    });
</script>
@endsection
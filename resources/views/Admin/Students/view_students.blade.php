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
              <div class="card-body"> <h4 class="register-heading">View Students</h4>
                <p class="text-muted m-b-30 ">Search Students .</p>
                 <div class="row ">
                    <div class="col-3">
                      <div class="form-group">
                        <label for="">Session</label> 
                            <small class="req"> *</small>
                        <select name="session_id" id="session_id" class="form-control">
                            <option value="">Select Session</option>

                        </select>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label for="">Session</label> 
                            <small class="req"> *</small>
                        <select name="session_id" id="session_id" class="form-control">
                            <option value="">Select Session</option>

                        </select>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label for="">Session</label> 
                            <small class="req"> *</small>
                        <select name="session_id" id="session_id" class="form-control">
                            <option value="">Select Session</option>

                        </select>
                      </div>
                    </div>
                    <div class="col-3 ">
                      <div class="form-group m-b-0">
                        <div>  
                          <button class="btn btn-success waves-effect waves-light">Search <i class="mdi mdi-account-search"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
               

                  <table class="table table-bordered dt-responsive nowrap"">
                    <thead>
                      <tr>
                        <th scope="col">Student ID</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">FATHER NAME</th>
                        <th scope="col">FATHER Contact</th>
                        <th scope="col">PREVIOUS CLASS</th>
                        <th scope="col">PREMANENT ADDRESS</th>
                        <th scope="col">SHIFT</th>
                        <th scope="col">Date Of Birth </th>
                        <th scope="col">School Logo</th>

                        <th scope="col">Actions</th>
                        <!-- <th scope="col">Delete</th> -->
                      </tr>
                    </thead>
                    <tbody id="displaydata">
                        
                      @foreach ($students as $student)
                      <tr id="row{{$student->STUDENT_ID}}">
                        <td>{{$student->STUDENT_ID}}</td>
                        <td>{{$student->NAME}}</td>
                        <td>{{$student->FATHER_NAME}}</td>
                        <td>{{$student->FATHER_CONTACT}}</td>
                        <td>{{$student->PREV_CLASS}}</td>
                        <td>{{$student->PERMANENT_ADDRESS}}</td>
                        <td>{{$student->SHIFT==1?'Morning':'Evening'}}</td>
                        <td>{{$student->DOB}}</td>
                        <td><img src="{{ asset('upload') }}/{{$student->IMAGE}}" alt="" style="width: 50px;height:50px;"></td>
                        <td>
                            <a href="editstudent/{{$student->STUDENT_ID}}" class="btn btn-success editbtn">Edit</button>
                        </td>
                        <!-- <td>
                            <button class="btn btn-danger deletebtn" value="{{$student->STUDENT_ID}}">Delete</button>
                        </td> -->
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<div class="modal fade bs-example-modal-lg" id="student-edit" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title mt-0" id="myLargeModalLabel">Large modal</h5>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          </div>
          <div class="modal-body" id="refresh-edit">
          <h1>Edit is comming soon...</h1>
          </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
            
         
         
           
          
@endsection

@section("customscript")
<script>

    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$('body').on('click', '.deletebtn',function () {
        var dstudentid = $(this).val();
        $.ajax({
            url: '{{url("deletestudent")}}',
            type: "GET",
            data: {
               dstudentid:dstudentid
            }, 
            dataType:"json",
            success: function(data){
              alert("delete successfully");
              $('#row' + data).remove();
            }
        });
      });

    </script>
               
@endsection
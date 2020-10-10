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
                                        <div class="container">
            <div class="pt-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <h1>Students Details</h1>
                </div>
                    
           {{--Table data display--}}         
           
                </div>
                <br>
                <br>
                <table class="table table-dark">
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

                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
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
                        <td>
                            <button class="btn btn-danger deletebtn" value="{{$student->STUDENT_ID}}">Delete</button>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>

                  <a href="{{route('student')}}" class="btn btn-primary">Add New STUDENT</a>
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
@extends('Admin.layout.master')
@section('content')

                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="container">
<<<<<<< HEAD
                                <div class="pt-5">
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <h3>Student Attendance details</h3>
                                    </div>
                                </div>
||||||| merged common ancestors
            <div class="pt-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <h1>Student Attendance details</h1>
                </div>
                    
           {{--Table data display--}}         
           
                </div>
=======
            <div class="row d-flex justify-content-center align-items-center">
                    <h1>Student Attendance details</h1>
                    
           {{--Table Attdence today display--}}
                   
>>>>>>> 89c6eed2df1574185a32430e5c31ed3332f627e1
                <div class="table-responsive">
                <small id="APPLICATION_STATUS_error" class="form-text text-danger"></small>
                <small id="APPROVED_AT_error" class="form-text text-danger"></small>
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Application Type</th>
                        <th scope="col">From date</th>
                        <th scope="col">TO Date</th>
                        <th scope="col">Application Status</th>
                      </tr>
                    </thead>
                    <tbody id="displaydata">

                    @if(isset($applications) && count($applications)>0)
                    @foreach($applications as $application)

                      <tr id="row{{$application->STD_APPLICATION_ID}}">
                        <td><?= $application->APPLICATION_TYPE=='SL'?'Sick Leave':'Leave'?></td>
                        <td>{{$application->START_DATE}}</td>
                        <td>{{$application->END_DATE}}</td>
                        <td>
<<<<<<< HEAD
                      <button class="btn btn-danger btnapp" approveid="{{$application->STD_APPLICATION_ID}}" value="1"> approve </button>
||||||| merged common ancestors
                      <button class="btn btn-danger btnapp" approveid="{{$application->STD_APPLICATION_ID}}" value="approved"> approve </button>
=======
                      <button class="btn btn-danger btnapp" studentid="{{$application->STUDENT_ID}}" approveid="{{$application->STD_APPLICATION_ID}}" value="1"> approve </button>
>>>>>>> 89c6eed2df1574185a32430e5c31ed3332f627e1
                      &nbsp
<<<<<<< HEAD
                      <button class="btn btn-primary btnrej" rejectid="{{$application->STD_APPLICATION_ID}}" value="2"> reject </button>
||||||| merged common ancestors
                      <button class="btn btn-primary btnrej" rejectid="{{$application->STD_APPLICATION_ID}}" value="rejected"> reject </button> 
=======
                      <button class="btn btn-primary btnrej" studentid="{{$application->STUDENT_ID}}" rejectid="{{$application->STD_APPLICATION_ID}}" value="2"> reject </button> 
>>>>>>> 89c6eed2df1574185a32430e5c31ed3332f627e1
                        </td>
                      </tr>
                      @endforeach
                      @else
                      <h5 style="color:green"> All Application Processed</h5>
                      @endif
                    </tbody>
                  </table>
<<<<<<< HEAD

||||||| merged common ancestors
                
=======
                </div>
            </div>
                <div class="row">
                    <h3> Attendance Log</h3>
                </div>
                    
           {{--Table Attendance Log display--}}         
           
                </div>
                <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">Application Type</th>
                        <th scope="col">From date</th>
                        <th scope="col">TO Date</th>
                        <th scope="col">Application Status</th>
                        <th scope="col">Response at</th>
                      </tr>
                    </thead>
                    <tbody id="displaydata">
                        @if(isset($todayapplog))
                      @foreach($todayapplog as $stdapplication)
                      <tr id="row{{$stdapplication->STD_APPLICATION_ID}}">
                        <td><?= $stdapplication->APPLICATION_TYPE=='SL'?'Sick Leave':'Leave'?></td>
                        <td>{{$stdapplication->START_DATE}}</td>
                        <td>{{$stdapplication->END_DATE}}</td>
                        <td>
                        <?php 
                        if($stdapplication->APPLICATION_STATUS=="1")
                        {
                          echo 'Approved';
                        }
                        else if($stdapplication->APPLICATION_STATUS=="2")
                        {
                          echo 'Rejected';
                        }
                        else
                        {
                          echo 'Pending';
                        }
                        ?>
                        </td>
                        <td><?= $stdapplication->APPROVED_AT==null?'Pending':$stdapplication->APPROVED_AT?></td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
>>>>>>> 89c6eed2df1574185a32430e5c31ed3332f627e1
                </div>
            </div>
        </div>
        </div>
        </div>
@endsection


@section('customscript')
<script>
$('body').on('click', '.btnapp',function () {
        var APPLICATION_STATUS = $(this).val();
        var STD_APPLICATION_ID  = $(this).attr('approveid');
        var studentid  = $(this).attr('studentid');
        $.ajax({
            url: '{{url("actionApplicationAdmin")}}',
            type: "GET",
            data: {
               APPLICATION_STATUS:APPLICATION_STATUS,
<<<<<<< HEAD
               STD_APPLICATION_ID:STD_APPLICATION_ID
            },
||||||| merged common ancestors
               STD_APPLICATION_ID:STD_APPLICATION_ID
            }, 
=======
               STD_APPLICATION_ID:STD_APPLICATION_ID,
               studentid:studentid
            }, 
>>>>>>> 89c6eed2df1574185a32430e5c31ed3332f627e1
            dataType:"json",
            success: function(data){
              if(data){
                toastr.success('Action Performed Successfully','Notice')
                setTimeout(function(){location.reload();},1000);
              }
              else
              {
                toastr.warning('Already Action taken, Please Refresh Page','Notice')
              }
            }
        });
   });

   $('body').on('click', '.btnrej',function () {
        var APPLICATION_STATUS = $(this).val();
        var STD_APPLICATION_ID =$(this).attr('rejectid');
        var studentid  = $(this).attr('studentid');
        $.ajax({
            url: '{{url("actionApplicationAdmin")}}',
            type: "GET",
            data: {
               APPLICATION_STATUS:APPLICATION_STATUS,
<<<<<<< HEAD
               STD_APPLICATION_ID:STD_APPLICATION_ID
            },
||||||| merged common ancestors
               STD_APPLICATION_ID:STD_APPLICATION_ID
            }, 
=======
               STD_APPLICATION_ID:STD_APPLICATION_ID,
               studentid:studentid
            }, 
>>>>>>> 89c6eed2df1574185a32430e5c31ed3332f627e1
            dataType:"json",
            success: function(data){
              if(data){
                toastr.success('Action Performed Successfully','Notice')
                setTimeout(function(){location.reload();},1000);
              }
              else
              {
                toastr.warning('Already Action taken, Please Refresh Page','Notice')
              }
            }
        });

   });
</script>
@endsection

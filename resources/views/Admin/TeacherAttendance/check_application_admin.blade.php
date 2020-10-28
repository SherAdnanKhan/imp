@extends('Admin.layout.master')
@section('content')
@section("content")

                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="container">
            <div class="row d-flex justify-content-center align-items-center">
                    <h1>Teacher Attendance details</h1>
                    
           {{--Table Attdence today display--}}
                   
                <div class="table-responsive">
                <small id="APPLICATION_STATUS_error" class="form-text text-danger"></small>
                <small id="APPROVED_AT_error" class="form-text text-danger"></small>
                <table class="table table-dark">
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
                      
                      <tr id="row{{$application->STAFF_APP_ID}}">
                        <td><?= $application->APPLICATION_TYPE==1?'Sick Leave':'Leave'?></td>
                        <td>{{$application->START_DATE}}</td>
                        <td>{{$application->END_DATE}}</td>
                        <td>
                      <button class="btn btn-danger btnapp" teacherid="{{$application->EMP_ID}}" approveid="{{$application->STAFF_APP_ID}}" value="1"> approve </button>
                      &nbsp
                      <button class="btn btn-primary btnrej" teacherid="{{$application->EMP_ID}}" rejectid="{{$application->STAFF_APP_ID}}" value="2"> reject </button> 
                        </td>
                      </tr>
                      @endforeach
                      @else
                      <h5 style="color:green"> All Application Processed</h5>
                      @endif
                    </tbody>
                  </table>
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
                      @foreach($todayapplog as $teachapplication)
                      <tr id="row{{$teachapplication->STAFF_APP_ID}}">
                        <td><?= $teachapplication->APPLICATION_TYPE==1?'Sick Leave':'Leave'?></td>
                        <td>{{$teachapplication->START_DATE}}</td>
                        <td>{{$teachapplication->END_DATE}}</td>
                        <td>
                        <?php 
                        if($teachapplication->APPLICATION_STATUS=="1")
                        {
                          echo 'Approved';
                        }
                        else if($teachapplication->APPLICATION_STATUS=="2")
                        {
                          echo 'Rejected';
                        }
                        else
                        {
                          echo 'Pending';
                        }
                        ?>
                        </td>
                        <td><?= $teachapplication->APPROVED_AT==null?'Pending':$teachapplication->APPROVED_AT?></td>
                      </tr>
                      @endforeach
                      @endif
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
        </div>
        </div>                                
@endsection


@section('customscript')
<script>
$('body').on('click', '.btnapp',function () {
       var EMP_ID  = $(this).attr('teacherid');
        var APPLICATION_STATUS = $(this).val();
        var STAFF_APP_ID  = $(this).attr('approveid');
        $.ajax({
            url: '{{url("TeacteractionApplicationAdmin")}}',
            type: "GET",
            data: {
                EMP_ID:EMP_ID,
               APPLICATION_STATUS:APPLICATION_STATUS,
               STAFF_APP_ID:STAFF_APP_ID
            }, 
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
        var EMP_ID  = $(this).attr('teacherid');
       var STD_APPLICATION_ID  = $(this).attr('approveid');
        var TeacteractionApplicationAdmin =$(this).attr('rejectid');
        $.ajax({
            url: '{{url("TeacteractionApplicationAdmin")}}',
            type: "GET",
            data: {
              EMP_ID:EMP_ID,
               APPLICATION_STATUS:APPLICATION_STATUS,
               TeacteractionApplicationAdmin:TeacteractionApplicationAdmin
            }, 
            dataType:"json",
            success: function(data){
              if(data){
                return false;
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
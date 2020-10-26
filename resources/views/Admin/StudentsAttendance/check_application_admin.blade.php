@extends('Admin.layout.master')
@section('content')

                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="container">
                                <div class="pt-5">
                                    <div class="row d-flex justify-content-center align-items-center">
                                        <h3>Student Attendance details</h3>
                                    </div>
                                </div>
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
                        <td><?= $application->APPLICATION_TYPE==1?'Sick Leave':'Leave'?></td>
                        <td>{{$application->START_DATE}}</td>
                        <td>{{$application->END_DATE}}</td>
                        <td>
                      <button class="btn btn-danger btnapp" approveid="{{$application->STD_APPLICATION_ID}}" value="1"> approve </button>
                      &nbsp
                      <button class="btn btn-primary btnrej" rejectid="{{$application->STD_APPLICATION_ID}}" value="2"> reject </button>
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
        </div>
        </div>
        </div>
@endsection


@section('customscript')
<script>
$('body').on('click', '.btnapp',function () {
        var APPLICATION_STATUS = $(this).val();
        var STD_APPLICATION_ID  = $(this).attr('approveid');
        $.ajax({
            url: '{{url("actionApplicationAdmin")}}',
            type: "GET",
            data: {
               APPLICATION_STATUS:APPLICATION_STATUS,
               STD_APPLICATION_ID:STD_APPLICATION_ID
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
        var STD_APPLICATION_ID =$(this).attr('rejectid');
        $.ajax({
            url: '{{url("actionApplicationAdmin")}}',
            type: "GET",
            data: {
               APPLICATION_STATUS:APPLICATION_STATUS,
               STD_APPLICATION_ID:STD_APPLICATION_ID
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
</script>
@endsection

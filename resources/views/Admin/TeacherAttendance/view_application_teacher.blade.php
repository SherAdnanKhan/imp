@extends('Admin.layout.master')
@section('content')
@section("content")

                        <div class="page-content-wrapper">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body">
                                        <div class="container">
            <div class="pt-5">
                <div class="row d-flex justify-content-center align-items-center">
                    <h1>Teacher Attendance details</h1>
                </div>
                    
           {{--Table data display--}}         
           
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
                        @if(isset($application))
                      @foreach($application as $teachapplication)
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
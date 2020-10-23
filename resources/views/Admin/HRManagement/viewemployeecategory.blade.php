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
                    <h1>Employee Details</h1>
                </div>
                    
           {{--Table data display--}}         
           
                </div>
                <div class="table-responsive">
                <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">Staff ID</th>
                        <th scope="col">Employee NO</th>
                        <th scope="col">Name</th>
                        <th scope="col">Designation</th>
                        <th scope="col">QUALIFICATION</th>
                        <th scope="col">Type</th>
                        <th scope="col">Image</th>
                        <th colspan="2" class="text-center"scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody id="displaydata">
                        
                      @foreach ($employees as $employee)
                      <tr id="row{{$employee->EMP_ID}}">
                        <td>{{$employee->EMP_ID}}</td>
                        <td>{{$employee->EMP_NO}}</td>
                        <td>{{$employee->EMP_NAME}}</td>
                        <td>{{$employee->DESIGNATION_ID}}</td>
                        <td>{{$employee->QUALIFICATION}}</td>
                        <td><?= $employee->EMP_TYPE==1?'Teaching':'Non Teaching'?></td>
                        <td><img src="{{asset('upload')}}/{{$employee['EMP_IMAGE']}}" onerror="this.src='https://via.placeholder.com/200'" alt="" style="width: 50px;height:50px;"></td>
                        <td>
                           <a href="editemployee/{{$employee->EMP_ID}}" style="margin-right:10px;" class="btn btn-success editbtn"> Edit </a>
                        </td>
                        <td>
                           <a href="teacher/getemployeedetails/{{$employee->EMP_ID}}" class="btn btn-danger editbtn"> Details </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                  <a href="{{route('employee')}}" class="btn btn-primary">Add New Employee</a>
            </div>
        </div>
@endsection
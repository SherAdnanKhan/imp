@extends('Admin.layout.master')

@section("content")
	<div class="container">
     	<div class="row d-flex justify-content-center">
            <div class="col-md-10 mt-5 pt-5">
             	<div class="row z-depth-3">
                 	<div class="col-sm-4 bg-info rounded-left">
        		        <div class="card-block text-center text-white ">
                		    <div class="mt-4 text-center ">
                                <img src="{{asset('upload')}}/{{$student['IMAGE']}}" 
                                    class="card-img ml-6 img-fluid border-primary rounded"  
                                   style=" width:200px; height:200px;"
                                    alt="student image">
                            </div>
                    		<h2 class="font-weight-bold mt-5">{{$student['NAME']}}</h2>
                            <p class="font-weight-bold">Reg No : {{$student['REG_NO']}}</p>
                            <p class="font-weight-bold">Class Name : {{ucwords($classes['Class_name'])}}</p>

                           <p class="font-weight-bold">Section Name : {{ucwords($sections['Section_name'])}}</p>

                            <p class="font-weight-bold">Issue date : {{ date('Y-m-d') }}</p>

                            <p class="font-weight-bold">Expiry date : {{date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 365 day"))}}</p>
                		</div>
            		</div>
            		<div class="col-sm-8 bg-white rounded-right">
                    	<h3 class="mt-3 text-center">Information</h3>
                    	<hr class="bg-primary mt-0 w-25">
                   		<div class="row">
                        	<div class="col-sm-6">
                            	<p class="font-weight-bold">CNIC:</p>
                           		<h6 class=" text-muted">{{$student['CNIC']}}</h6>
                        	</div>
                        	<div class="col-sm-6">
                            	<p class="font-weight-bold">Shift: </p>
                           		<h6 class="text-muted"> <?php echo($student['SHIFT']=='1'?'Morning':'Evening'); ?></h6>
                        	</div>
                    	</div>
                    		<h4 class="mt-3">Additional Information</h4>
                    		<hr class="bg-primary">
                   		<div class="row">
                        	<div class="col-sm-6"> 
                           		<p class="font-weight-bold">Gender:</p>
                          	  	<h6 class="text-muted">{{$student['GENDER']}}</h6>
                        	</div>
                        	<div class="col-sm-6">
                            	<p class="font-weight-bold">Father Name</p>
                            	<h6 class="text-muted">{{$student['FATHER_NAME']}}</h6>
                        	</div>
                        </div>
                        <h4 class="mt-3">Living Address</h4>
                    		<hr class="bg-primary">
                   		<div class="row">
                        	<div class="col-sm-6"> 
                           		<p class="font-weight-bold">{{$student['PRESENT_ADDRESS']}}</p>
                          	  	
                        	</div>
                	   	<hr class="bg-primary">
                	    <div class=" d-flex justify-content-center ">
                            {{-- <p class="font-weight-bold">Address</p> --}}
                            <div>
                            {{-- <h6 class="text-muted">{{$student['PRESENT_ADDRESS']}}</h6> --}}
                        </div>
                	    </div>  
              		</div>
             	</div>
            </div>
        </div>
    </div>
@endsection
@extends('Admin.layout.master')

@section('content')
<div class="page-content-wrapper">
    <div class="row">   
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card m-b-20">
                        <div class="row">
                        <section class="content">
   <div class="row">
      <div class="col-md-12">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title"><i class="fa fa-search"></i> Select Criteria</h3>
               <div class="box-tools pull-right">
               </div>
            </div>
            <form action="" id="searching" method="post" accept-charset="utf-8">
            @csrf

               <div class="box-body">
                  <input type="hidden" name="ci_csrf_token" value="">                            
                  <div class="row">
                         <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">SubjectGroup *<span class="gcolor"></span> </label>
                                    <select class="form-control formselect required" placeholder="Select Subject Group" name="GROUP_ID"
                                    id="group_id">
                                    <option value="">Select SubjectGroup</option>
                                        @foreach($subjectgroups as $row)
                                        <option  value="{{ $row->GROUP_ID  }}">{{ ucfirst($row->GROUP_NAME) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                <label for="">Class *<span class="gcolor"></span> </label>
                                    <select class="form-control formselect required" placeholder="Select Class" name="CLASS_ID"
                                    id="class_id">
                                    <option value="">Select
                                        Class*</option>
                                    @foreach($classes as $class)
                                    <option  value="{{ $class->Class_id }}">
                                        {{ ucfirst($class->Class_name) }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>section*</label>
                                    <select class="form-control formselect required" placeholder="Select Section" name="SECTION_ID" id="sectionid">
                                    <option value="">Select
                                    </select>
                                </div>
                            </div>
                  </div>
               </div>
               <div class="box-footer">
                  <button type="submit" class="btn btn-primary pull-right btn-sm">Search</button>
               </div>
            </form>
            <div class="box-header ptbnull"></div>
            </div> </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <div class="nav-tabs-custom">
            <ul class="nav nav-pills nav-justified" role="tablist">
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link active" data-days="Monday" data-toggle="tab" href="#tab_1" role="tab">Monday</a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link" data-days="Tuesday" data-toggle="tab" href="#tab_2" role="tab">Tuesday</a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link" data-days="Wednesday" data-toggle="tab" href="#tab_3" role="tab">Wednesday</a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link" data-days="Thursday" data-toggle="tab" href="#tab_4" role="tab">Thursday</a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link" data-days="Friday" data-toggle="tab" href="#tab_5" role="tab">Friday</a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link" data-days="Saturday" data-toggle="tab" href="#tab_6" role="tab">Saturday</a>
                                                </li>
                                                <li class="nav-item waves-effect waves-light">
                                                    <a class="nav-link" data-days="Sunday" data-toggle="tab" href="#tab_7" role="tab">Sunday</a>
                                                </li>
                                               
                                                
      </ul>
            </div>
               <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                     <style type="text/css">
                        .relative label.text-danger{position: absolute; left:5px; bottom:0;}
                     </style>
                     <div class="row clearfix">
                        <div class="col-md-12 column">
                           <a id="add_row" class="addrow addbtnright btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add New</a>
                           <form method="POST" action="" id="form_Monday" class="commentForm autoscroll" novalidate="novalidate">
                            @csrf
                            <div id="inputfields">
                           <input type="hidden" name="day" value="1">
                            </div>
                              <div class="">
                                 <table class="table table-bordered table-hover order-list tablewidthRS" id="tab_logic">
                                    <thead>
                                       <tr>
                                          <th>
                                             Subject                        
                                          </th>
                                          <th>
                                             Teacher                        
                                          </th>
                                          <th>
                                             Time From                        
                                          </th>
                                          <th>
                                             Time To                        
                                          </th>
                                          <th class="text-right">
                                             Action                        
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    <tr id="tabledata">
                                 
                                    </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <button class="btn btn-primary btn-sm pull-right" type="submit"><i class="fa fa-save"></i> Save</button>
                           </form>
                        </div>
                     </div>
                   
                  </div>
                  <div class="tab-pane" id="tab_2">
                     <style type="text/css">
                        .relative label.text-danger{position: absolute; left:5px; bottom:0;}
                     </style>
                     <div class="row clearfix">
                        <div class="col-md-12 column">
                           <a id="add_row" class="addrow addbtnright btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add New</a>
                           <form method="POST" action="" id="form_Tuesday" class="commentForm autoscroll" novalidate="novalidate">
                            @csrf
                            <div id="inputfields">
                           <input type="hidden" name="day" value="1">
                            </div>
                              <div class="">
                                 <table class="table table-bordered table-hover order-list tablewidthRS" id="tab_logic">
                                    <thead>
                                       <tr>
                                          <th>
                                             Subject                        
                                          </th>
                                          <th>
                                             Teacher                        
                                          </th>
                                          <th>
                                             Time From                        
                                          </th>
                                          <th>
                                             Time To                        
                                          </th>
                                          <th class="text-right">
                                             Action                        
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    <tr id="tabledata">
                                 
                                    </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <button class="btn btn-primary btn-sm pull-right" type="submit"><i class="fa fa-save"></i> Save</button>
                           </form>
                        </div>
                     </div>
                   
                  </div>
                  <div class="tab-pane" id="tab_3">
                     <style type="text/css">
                        .relative label.text-danger{position: absolute; left:5px; bottom:0;}
                     </style>
                     <div class="row clearfix">
                        <div class="col-md-12 column">
                           <a id="add_row" class="addrow addbtnright btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add New</a>
                           <form method="POST" action="" id="form_Wednesday" class="commentForm autoscroll" novalidate="novalidate">
                            @csrf
                            <div id="inputfields">
                           <input type="hidden" name="day" value="1">
                            </div>
                              <div class="">
                                 <table class="table table-bordered table-hover order-list tablewidthRS" id="tab_logic">
                                    <thead>
                                       <tr>
                                          <th>
                                             Subject                        
                                          </th>
                                          <th>
                                             Teacher                        
                                          </th>
                                          <th>
                                             Time From                        
                                          </th>
                                          <th>
                                             Time To                        
                                          </th>
                                          <th class="text-right">
                                             Action                        
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    <tr id="tabledata">
                                 
                                    </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <button class="btn btn-primary btn-sm pull-right" type="submit"><i class="fa fa-save"></i> Save</button>
                           </form>
                        </div>
                     </div>
                   
                  </div>
                  <div class="tab-pane" id="tab_4">
                     <style type="text/css">
                        .relative label.text-danger{position: absolute; left:5px; bottom:0;}
                     </style>
                     <div class="row clearfix">
                        <div class="col-md-12 column">
                           <a id="add_row" class="addrow addbtnright btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add New</a>
                           <form method="POST" action="" id="form_Wednesday" class="commentForm autoscroll" novalidate="novalidate">
                            @csrf
                            <div id="inputfields">
                           <input type="hidden" name="day" value="1">
                            </div>
                              <div class="">
                                 <table class="table table-bordered table-hover order-list tablewidthRS" id="tab_logic">
                                    <thead>
                                       <tr>
                                          <th>
                                             Subject                        
                                          </th>
                                          <th>
                                             Teacher                        
                                          </th>
                                          <th>
                                             Time From                        
                                          </th>
                                          <th>
                                             Time To                        
                                          </th>
                                          <th class="text-right">
                                             Action                        
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    <tr id="tabledata">
                                 
                                    </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <button class="btn btn-primary btn-sm pull-right" type="submit"><i class="fa fa-save"></i> Save</button>
                           </form>
                        </div>
                     </div>
                 
                  </div>
                  <div class="tab-pane" id="tab_5">
                     <style type="text/css">
                        .relative label.text-danger{position: absolute; left:5px; bottom:0;}
                     </style>
                     <div class="row clearfix">
                        <div class="col-md-12 column">
                           <a id="add_row" class="addrow addbtnright btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add New</a>
                           <form method="POST" action="" id="form_Wednesday" class="commentForm autoscroll" novalidate="novalidate">
                            @csrf
                            <div id="inputfields">
                           <input type="hidden" name="day" value="1">
                            </div>
                              <div class="">
                                 
                                 <table class="table table-bordered table-hover order-list tablewidthRS" id="tab_logic">
                                    <thead>
                                       <tr>
                                          <th>
                                             Subject                        
                                          </th>
                                          <th>
                                             Teacher                        
                                          </th>
                                          <th>
                                             Time From                        
                                          </th>
                                          <th>
                                             Time To                        
                                          </th>
                                          <th class="text-right">
                                             Action                        
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    <tr id="tabledata">
                                 
                                    </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <button class="btn btn-primary btn-sm pull-right" type="submit"><i class="fa fa-save"></i> Save</button>
                           </form>
                        </div>
                     </div>
                  
                  </div>
                  <div class="tab-pane" id="tab_6">
                     <style type="text/css">
                        .relative label.text-danger{position: absolute; left:5px; bottom:0;}
                     </style>
                     <div class="row clearfix">
                        <div class="col-md-12 column">
                           <a id="add_row" class="addrow addbtnright btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add New</a>
                           <form method="POST" action="" id="form_Wednesday" class="commentForm autoscroll" novalidate="novalidate">
                            @csrf
                            <div id="inputfields">
                           <input type="hidden" name="day" value="1">
                            </div>
                              <div class="">
                                 <table class="table table-bordered table-hover order-list tablewidthRS" id="tab_logic">
                                    <thead>
                                       <tr>
                                          <th>
                                             Subject                        
                                          </th>
                                          <th>
                                             Teacher                        
                                          </th>
                                          <th>
                                             Time From                        
                                          </th>
                                          <th>
                                             Time To                        
                                          </th>
                                          <th class="text-right">
                                             Action                        
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    <tr id="tabledata">
                                 
                                    </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <button class="btn btn-primary btn-sm pull-right" type="submit"><i class="fa fa-save"></i> Save</button>
                           </form>
                        </div>
                     </div>
                   
                  </div>
                  <div class="tab-pane" id="tab_7">
                     <style type="text/css">
                        .relative label.text-danger{position: absolute; left:5px; bottom:0;}
                     </style>
                     <div class="row clearfix">
                        <div class="col-md-12 column">
                           <a id="add_row" class="addrow addbtnright btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Add New</a>
                           <form method="POST" action="https://demo.smart-school.in/admin/timetable/savetimetable" id="form_Sunday" class="commentForm autoscroll" novalidate="novalidate">
                              <input type="hidden" name="day" value="Sunday">
                              <input type="hidden" name="class_id" value="1">
                              <input type="hidden" name="section_id" value="1">
                              <input type="hidden" name="subject_group_id" value="1">
                              <div class="">
                                 <table class="table table-bordered table-hover order-list tablewidthRS" id="tab_logic">
                                    <thead>
                                       <tr>
                                          <th>
                                             Subject                        
                                          </th>
                                          <th>
                                             Teacher                        
                                          </th>
                                          <th>
                                             Time From                        
                                          </th>
                                          <th>
                                             Time To                        
                                          </th>
                                          <th>
                                             Room No                        
                                          </th>
                                          <th class="text-right">
                                             Action                        
                                          </th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                       <tr id="addr0">
                                          <td class="relative">
                                             <input type="hidden" name="total_row[]" value="1">
                                             <input type="hidden" name="prev_id_1" value="0">
                                             <select class="form-control subject select2-hidden-accessible" id="subject_id_1" name="subject_1" tabindex="-1" aria-hidden="true">
                                                <option value="">Select</option>
                                                <option value="1">English (210)</option>
                                                <option value="2">Hindi (211)</option>
                                                <option value="3">Mathematics (110)</option>
                                                <option value="4">Science (112)</option>
                                                <option value="19">Social Studies (111)</option>
                                             </select>
                                             <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-subject_id_1-container"><span class="select2-selection__rendered" id="select2-subject_id_1-container" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                          </td>
                                          <td class="relative">
                                             <select class="form-control staff select2-hidden-accessible" id="staff_id_1" name="staff_1" tabindex="-1" aria-hidden="true">
                                                <option value="">Select</option>
                                                <option value="2"></option>
                                                <option value="5">Jason Sharlton (9001)</option>
                                             </select>
                                             <span class="select2 select2-container select2-container--default" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-autocomplete="list" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-staff_id_1-container"><span class="select2-selection__rendered" id="select2-staff_id_1-container" title="Select">Select</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                          </td>
                                          <td>
                                             <div class="input-group">
                                                <input type="text" name="time_from_1" class="form-control time_from time" id="time_from_1" aria-invalid="false">
                                                <div class="input-group-addon">
                                                   <span class="fa fa-clock-o"></span>
                                                </div>
                                             </div>
                                          </td>
                                          <td>
                                             <div class="input-group">
                                                <input type="text" name="time_to_1" class="form-control time_to time" id="time_to_1" aria-invalid="false">
                                                <div class="input-group-addon">
                                                   <span class="fa fa-clock-o"></span>
                                                </div>
                                             </div>
                                          </td>
                                          <td>
                                             <input type="text" name="room_no_1" id="room_no_1" placeholder="Room no" class="form-control room_no">
                                          </td>
                                          <td class="text-right"><button class="ibtnDel btn btn-danger btn-sm btn-danger"> <i class="fa fa-trash"></i></button></td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </div>
                              <button class="btn btn-primary btn-sm pull-right" type="submit"><i class="fa fa-save"></i> Save</button>
                           </form>
                        </div>
                     </div>
                   
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('customscript')
<script>
      $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
   $(document).ready(function(){
    $('#class_id').on('change', function () {
                let id = $(this).val();
                class_id = id;
                $('#sectionid').empty();
                $('#sectionid').append(`<option value="0" disabled selected>Processing...</option>`);
                $.ajax({
                type: 'GET',
                url: 'getsections/' + id,
                success: function (response) {
                var response = JSON.parse(response);
                //console.log(response);
                $('#sectionid').empty();
                $('#sectionid').append(`<option value="0" disabled selected>Select Section*</option>`);
                response.forEach(element => {
                    $('#sectionid').append(`<option value="${element['Section_id']}">${element['Section_name']}</option>`);
                    });
                }
            });
        });
   });

$('body').on('submit','#searching',function(e){
   e.preventDefault();
   $('#inputfields').empty();  
   var fdata = new FormData(this);
    html="";
   let inputfield="";
   $.ajax({
        url: '{{url("Searchtimetable")}}',
            type:'POST',
            data :fdata,
            processData: false,
            contentType: false,
            success: function(data){
               subject=data.subject;
               teacher=data.teacher;
               console.log(data.subject);
                inputfield+='<h4>'+subject[0]['Class_name']+' '+subject[0]['Section_name'] +'  TimeTable  </h4>';
                inputfield+=' <input type="hidden" name="CLASS_ID" value="'+subject[0]['CLASS_ID']+'">';
                inputfield+=' <input type="hidden" name="SECTION_ID" value="'+subject[0]['SECTION_ID']+'">';
                inputfield+=' <input type="hidden" name="GROUP_ID" value="'+subject[0]['GROUP_ID']+'">';
               
               html+='                           <td>';
               html+='                              <select class="form-control subject select2-hidden-accessible" id="subject_id_1" name="SUBJECT_ID[]" tabindex="-1" aria-hidden="true">';
               html+='                        <option value="" disabled> Please Select Subject </option>';
                      for(var i=0;i<subject.length;i++){
                  html+='                              <option value="'+subject[i]["SUBJECT_ID"]+'" selected="selected">';
                  html+=                   subject[i]["SUBJECT_NAME"];                                                   
                  html+='                              </option>';
                      }
               html+='                        </select>';
               html+='                        <small id="subject_error" class="form-text text-danger"></small>';                 
               html+='                          </span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>';
               html+='                     </td>';
               html+='                     <td>';
               html+='                        <select class="form-control staff select2-hidden-accessible" id="staff_id_1" name="EMP_ID[]" tabindex="-1" aria-hidden="true">';
               html+='                            <option value="">Select</option>';
                                             for(var i=0;i<teacher.length;i++){
                  html+='                              <option value="'+teacher[i]["EMP_ID"]+'" selected="selected">';
                  html+=                   teacher[i]["EMP_NAME"];                                                   
                  html+='                              </option>';
                                                      }
               html+='                              </select>';
               html+='                       </td>';
               html+='                     <td>';
               html+='                        <div class="input-group">';
               html+='                           <input type="time" name="TIMEFROM[]" class="form-control time_from time" id="time_from_1" value="9:00 AM">';
               html+='                           <div class="input-group-addon">';
               html+='                           </div>';
               html+='                        </div>';
               html+='                     </td>';
               html+='                     <td>';
               html+='                        <div class="input-group">';
               html+='                           <input type="time" name="TIMETO[]" class="form-control time_to time" id="time_to_1" value="9:45 AM">';
               html+='                           <div class="input-group-addon">';
               html+='                           </div>';
               html+='                        </div>';
               html+='                     </td>';
               html+='                     <td class="text-right"><button class="ibtnDel btn btn-danger btn-sm btn-danger"> <i class="fa fa-trash"></i></button></td>';
   
         
            $('#tabledata').html(html);  
            $('#inputfields').append(inputfield);               
            },
          
          
  });

});
$('body').on('click', '#add_row',function () {
  $('#tab_logic tbody:last-child').append('<tr> '+html+'</tr>')  
      });

$('body').on('submit','#form_Monday',function(e){
   e.preventDefault();
   var fdata = new FormData(this);
   $.ajax({
        url: '{{url("Savetimetable")}}',
            type:'POST',
            data :fdata,
            processData: false,
            contentType: false,
            success: function(data){
               if(data){
                
                toastr.success('Timetable for Monday added', 'Notice');
                setTimeout(function(){location.reload();},1000);
                }
                else{
                    toastr.error("Record Already exist please refresh", 'Notice');
                }
            },
   });
});
      
</script>

@endsection
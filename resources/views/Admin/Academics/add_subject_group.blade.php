@extends('Admin.layout.master')

@section("content")
<section class="content">
   <div class="row">
      <div class="col-md-4">
         <!-- Horizontal Form -->
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Add Subject Group</h3>
            </div>
            <!-- /.box-header -->
            <form id="addsubjectgroup" action="{{ route('addsubjectgroup')}}" name="addsubjectgroup" method="post" accept-charset="utf-8">
            @csrf
            <div class="form-group">
                                    <label for="">subject group names</label> 
                                       <small class="req"> *</small>
                                       <select name="GROUP_ID" class="form-control formselect required" placeholder="Select Class"
                                          id="GROUP_ID">
                                          <option value="0" disabled selected>Select
                                             Subject Group Name*</option>
                                          @foreach($subjectgroupnames as $subjectgroupname)
                                          <option  value="{{ $subjectgroupname->GROUP_ID}}">
                                             {{ ucfirst($subjectgroupname->GROUP_NAME) }}</option>
                                          @endforeach
                                    </select>
                                    <small id="GROUP_ID_error" class="form-text text-danger"></small>
                                </div>
               
                  <div class="form-group">
                                    <label for="">Class</label> 
                                       <small class="req"> *</small>
                                       <select name="CLASS_ID" class="form-control formselect required" placeholder="Select Class"
                                          id="class_id">
                                          <option value="0" disabled selected>Select
                                             Class*</option>
                                          @foreach($classes as $class)
                                          <option  value="{{ $class->Class_id }}">
                                             {{ ucfirst($class->Class_name) }}</option>
                                          @endforeach
                                    </select>
                                    <small id="CLASS_ID_error" class="form-text text-danger"></small>
                                </div>
                                <div class="form-group">
                                       <label for="">Section</label> 
                                          <small class="req"> *</small>
                                          <select name="SECTION_ID" class="form-control formselect required" placeholder="Select Section" id="sectionid" >
                                       </select>
                                       <small id="SECTION_ID_error" class="form-text text-danger"></small>
                                </div>
                  <div class="form-group">
                     <label for="exampleInputEmail1">Subject</label>
                     @foreach($subjects as $subject)
                     <div class="checkbox">
                     <input type="checkbox" id="subjectgroup[{{$subject->SUBJECT_ID}}]" name="subjectgroup[{{$subject->SUBJECT_ID}}]" value="{{$subject->SUBJECT_ID}}">
                           <label for="subjectgroup[{{$subject->SUBJECT_ID}}]">{{$subject->SUBJECT_NAME }} </label><br>
                  
                     </div>
                     @endforeach
                     <small id="subject_error" class="form-text text-danger"></small>
                  </div>
                  <div class="form-group">
                                    <label for="">Session</label> 
                                       <small class="req"> *</small>
                                       <select name="SESSION_ID" class="form-control formselect required" placeholder="Select Session"
                                          id="SESSION_ID">
                                          <option value="0" disabled selected>Select
                                             Session*</option>
                                          @foreach($sessions as $session)
                                          <option  value="{{ $session->SB_ID }}">
                                             {{ ucfirst($session->SB_NAME) }}</option>
                                          @endforeach
                                    </select>
                                    <small id="SESSION_ID_error" class="form-text text-danger"></small>
                                </div>
               </div>
               <!-- /.box-body -->
               <div class="box-footer">
                  <button type="submit" class="btn btn-info pull-right">Save</button>
               </div>
            </form>
         </div>
    
      <!--/.col (right) -->
      <!-- left column -->
      <div class="col-md-8">
         <!-- general form elements -->
         <div class="box box-primary">
            <div class="box-header ptbnull">
               <h3 class="box-title titlefix">Subject Group List</h3>
               <div class="box-tools pull-right">
               </div>
               <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <div class="table-responsive mailbox-messages" id="subject_list">
                  <div class="download_label">Subject Group List</div>
                  <a class="btn btn-default btn-xs pull-right" id="print" onclick="printDiv()" style="display: block;"><i class="fa fa-print"></i></a> <a class="btn btn-default btn-xs pull-right" id="btnExport" onclick="fnExcelReport();" style="display: block;"> <i class="fa fa-file-excel-o"></i> </a>
                  <table class="table table-striped  table-hover " id="headerTable">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Class Section Session</th>
                           <th>Subject</th>
                           <th class="text-right no_print" style="display: block;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="mailbox-name">
                              <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title="">Class 3rd Subject Group</a>
                           </td>
                           <td>
                              <table width="100%">
                                 <tbody>
                                    <tr>
                                       <td>
                                          <div>Class 3 - A</div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <div>Class 3 - B</div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <div>Class 3 - C</div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                           <td>
                              <table width="100%">
                                 <tbody>
                                    <tr>
                                       <td>
                                          <div>English</div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <div>Hindi</div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <div>Mathematics</div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <div>Science</div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <div>Social Studies</div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <div>French</div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <div>Drawing</div>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </td>
                           <td class="mailbox-date pull-right no_print" style="display: block;">
                              <a href="https://demo.smart-school.in/admin/subjectgroup/edit/3" class="btn btn-default btn-xs no_print" data-toggle="tooltip" title="Edit" style="display: block;">
                              <i class="fa fa-pencil"></i>
                              </a>
                              <a href="https://demo.smart-school.in/admin/subjectgroup/delete/3" class="btn btn-default btn-xs no_print" data-toggle="tooltip" title="Delete" onclick="return confirm('Delete Confirm?');" style="display: block;">
                              <i class="fa fa-remove"></i>
                              </a>
                           </td>
                        </tr>
                        
                     </tbody>
                  </table>
                  <!-- /.table -->
               </div>
               <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
         </div>
      </div>
      <!--/.col (left) -->
      <!-- right column -->
   </div>
   <div class="row">
      <!-- left column -->
      <!-- right column -->
      <div class="col-md-12">
      </div>
      <!--/.col (right) -->
   </div>
   <!-- /.row -->
</section>
@endsection
@section("customscript")
 <!-- Required datatable js -->
 <script src="{{asset('admin_assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
        <script src="{{asset('admin_assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/datatables/buttons.print.min.js')}}"></script>
        <script src="{{asset('admin_assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
<script>
 $(document).ready( function () {
      $('#DataTables_Table_0').DataTable();
    $('#class_id').on('change', function () {
                let id = $(this).val();
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
</script>    
<Script>
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$('body').on('submit','#addsubjectgroup',function(e){
      e.preventDefault();
      $('#CLASS_ID_error').text('');
      $('#SECTION_ID_error').text('');
      $('#NAME_error').text('');
      $('#subject_error').text('');
      $('#SESSION_ID_error').text('');
      var fdata = new FormData(this);
      $.ajax({
        url: '{{url("addsubjectgroup")}}',
            type:'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data){
              console.log(data);
             
              },
              error: function(error){
                console.log(error);
                var response = $.parseJSON(error.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
              }
      });
    });
</script>

@endsection
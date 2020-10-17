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
                     @foreach($subjects as $subject => $key)
                     <div class="checkbox">
                     <input type="checkbox" id="subjectgroup[{{ $subject }}]" name="subjectgroup[]" value="{{ $subject }}">
                           <label for="subjectgroup[{{ $subject }}]">{{$key}} </label><br>
                  
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
                  <table class="table table-striped" id="headerTable">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Class Section Session</th>
                           <th>Subject</th>
                           <th class="text-right no_print" style="display: block;">Action</th>
                        </tr>
                     </thead>
                     <tbody id="displaydata">
                     @foreach($subjectgroup as $sb)
                     <tr id="{{$sb->id}}">
                      <td class="mailbox-name">{{ $sb->GROUP_NAME}}</td>
                   <td class="mailbox-name">({{$sb->Class_name}}) ({{$sb->Section_name}})({{$sb->SB_NAME}})</td>
                      <td>
                         <?php $IDs = explode(',',$sb->SUBJECT_ID); for($i=0; $i < count($IDs); $i++) { ?>
                         {{ $subjects[$IDs[$i]] }},
                         <?php } ?>
                        </td>
                           <td class="mailbox-date pull-right">
                            <button value="{{$sb->id}}" class="btn btn-default btn-xs editbtn"> edit </button>
                             <button value="{{$sb->id}}" class="btn btn-default btn-xs deletebtn"> delete </button>
                                 
                            </td>
                    </tr>
                    @endforeach
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
      let html = "";
      $.ajax({
        url: '{{url("addsubjectgroup")}}',
            type:'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data){
            if ($.trim(data) == '' ) {
                    html +='<p style="text-align:center;color:red;"> Record Already Present </p>';
            }
           else {
            var id= data['id'];
            var subjects= data['subjects'];
            var SUBJECT_ID=data['SUBJECT_ID'];
            var Class_name=data['Class_name']['Class_name'];
            var Section_name=data['Section_name']['Section_name'];
            var SB_NAME=data['SB_NAME']['SB_NAME'];
            var SUBJECT_NAME=data['SUBJECT_NAME'];
            var Groupid=data['subjectgroup']['GROUP_ID'];
            var Groupname=data['subjectgroup']['GROUP_NAME'];
            IDs = SUBJECT_ID.split(',');

              html += '  <tr id="'+id+'">';
              html += '          <td class="mailbox-name">' + Groupname + '</td>';
              html += '       <td class="mailbox-name">(' + Class_name+') ('+ Section_name+')( ' + SB_NAME + ')</td>';
              for( var i=0; i < IDs.length; i++) {        
              html += '                       <td class="mailbox-name">' + subjects[IDs[i]] + '</td>';
              }
              html += '               <td class="mailbox-date pull-right">';
              html += '                <button value="'+data.GROUP_ID+'" class="btn btn-default btn-xs editbtn"> edit </button>';
              html += '                 <button value="'+data.GROUP_ID+'" class="btn btn-default btn-xs deletebtn"> delete </button>';
                                 
              html += '                </td>';
              html += '        </tr>';
           }
               $('#displaydata').append(html);
             
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
@extends('Admin.layout.master')
@section("page-css")
  <!-- DataTables -->
  <link href="{{asset('admin_assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('admin_assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section("content")

                        <!-- end row -->

<div class="page-content-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                <div class="row">
   <div class="col-md-4">
      <div class="box box-primary">
         <div class="box-header with-border">
            <h3 class="box-title">Add Subject</h3>
         </div>
         <form  action="{{ route('addcampus')}}" id="addsubject" method="post" accept-charset="utf-8">
            <div class="box-body">
              @csrf                           
               <div class="form-group">
                  <label for="exampleInputsubject1">Subject Name</label><small class="req"> *</small>
                  <input autofocus="" id="sbjname" name="subject_name" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                  <span class="text-danger"></span>
               </div>
               <div class="form-group"><br>
                  <label for="exampleInputEmail1">Subject Code</label>
                  <input id="sbjcode" name="subject_code" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                  <span class="text-danger"></span>
               </div>
               
            </div>
            <div class="box-footer">
               <button type="submit" class="btn btn-info pull-right">Save</button>
            </div>
         </form>
      </div>
   </div>

   <div class="col-md-8">
      <div class="box box-primary" id="sublist">
         <div class="box-header ptbnull">
            <h3 class="box-title titlefix">Subject List</h3>
         </div>
         <div class="box-body">
            <div class="table-responsive mailbox-messages">
                 <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
               <table class="table table-striped table-bordered table-hover example dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                     <thead>
                        <tr role="row">
                           <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Subject: activate to sort column ascending" style="width: 208px;">Subject</th>
                           <th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Subject Code: activate to sort column ascending" style="width: 236px;" aria-sort="descending">Subject Code</th>
                           <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Subject Type: activate to sort column ascending" style="width: 239px;">Instuition Type</th>
                           <th class="text-right no-print sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 121px;">Action</th>
                        </tr>
                     </thead>
                     <tbody id="displaydata">
                           @foreach($gsubject as $subject)
                           <tr id="row{{$subject->SUBJECT_ID}}">
                              <td class="mailbox-name"> {{$subject->SUBJECT_NAME}}</td>
                              <td class="mailbox-name"> {{$subject->SUBJECT_CODE}}</td>
                              <td class="mailbox-name"> {{$subject->TYPE}} </td>
                              <td class="mailbox-date pull-right">
                                 <button value="{{$subject->SUBJECT_ID}}" class="btn btn-default btn-xs editbtn" > edit </button>
                                 <button value="{{$subject->SUBJECT_ID}}" class="btn btn-default btn-xs deletebtn"> delete </button>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                  </table>
                </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div> 
</div> 
                                     </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page content-->

                    </div> <!-- container-fluid -->

                </div>
<div class="modal fade" id="SubjectEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header" style="color:rgb(255, 255, 255); background-color: rgb(13, 189, 13);">
            <h5 class="modal-title" id="exampleModalLabel">Edit class </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:rgb(255, 255, 255);">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{route('updatesubject')}}" id="editsubject" name="classform" method="post" accept-charset="utf-8">
            <div class="box-body">
               <div class="form-group" style="margin:10px">
                  <input  id="subject_id"type="hidden" name="subject_id" value="">
                  <label for="exampleInputsubject1">Subject Name </label><small class="req"> *</small>
                  <input autofocus="" id="subject_name" name="subject_name" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                  <span class="text-danger"></span>
               </div>
               <div class="form-group" style="margin:10px">
                  <label for="exampleInputclass1">Subject Code </label><small class="req"> *</small>
                  <input autofocus="" id="subject_code" name="subject_code" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                  <span class="text-danger"></span>
               </div>
            </div>
            <div class="box-footer">
               <button type="submit" class="btn btn-info pull-right">Save</button>
            </div>
            @csrf
         </form>
      </div>
   </div>
</div>
 <!-- content -->
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
        } );
     </script> 
<Script>
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$('body').on('submit','#addsubject',function(e){
      e.preventDefault();
      var fdata = new FormData(this);
      $.ajax({
        url: '{{url("addsubject")}}',
            type:'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data){
               console.log(data)
                $('#displaydata').append(`
                     <tr id="row`+data.SUBJECT_ID+`">
                        <td class="mailbox-name">` + data.SUBJECT_NAME + `</td>
                        <td class="mailbox-name">` + data.SUBJECT_CODE + `</td>
                        <td class="mailbox-name">` + data.TYPE + `</td>
                        
                              <td class="mailbox-date pull-right">
                              <button value="`+data.SUBJECT_ID+`" class="btn btn-default btn-xs editbtn"> edit </button>
                              <button value="`+data.SUBJECT_ID+`" class="btn btn-default btn-xs deletebtn"> delete </button>
                                 
                              </td>
                      </tr>`)
                      $("#addsubject").get(0).reset();
              },
              error: function(error){
                console.log(error);
              }
      });
    });
    $(document).on('click', '.editbtn',function () {
        var subjectid = $(this).val();
        $.ajax({
            url: '{{url("editsubject")}}',
            type: "GET",
            data: {
               subjectid:subjectid
            }, 
            dataType:"json",
            success: function(data){
             //  console.log(data);
               
          for(i=0;i<data.length;i++){
            $('#subject_id').val(data[i].SUBJECT_ID);
            $('#subject_name').val(data[i].SUBJECT_NAME);
            $('#subject_code').val(data[i].SUBJECT_CODE);
          }
            }
        });
       $('#SubjectEditModal').modal('show');
   });
  $('body').on('submit','#editsubject',function(e){
      e.preventDefault();
      var fdata = new FormData(this);
      $.ajax({
        url: '{{url("updatesubject")}}',
            type:'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data){
              // console.log(data)
               
               for(i=0;i<data.length;i++){
               $('#row' + data[i].SUBJECT_ID).replaceWith(`
                     <tr id="row`+data[i].SUBJECT_ID+`">
                     <td class="mailbox-name">` + data[i].SUBJECT_NAME + `</td>
                     <td class="mailbox-name">` + data[i].SUBJECT_CODE + `</td>
                     <td class="mailbox-name">` + data[i].TYPE + `</td>
                 
                              <td class="mailbox-date pull-right">
                              <button value="`+data[i].SUBJECT_ID+`" class="btn btn-default btn-xs editbtn" > edit </button>
                              <button value="`+data[i].SUBJECT_ID+`" class="btn btn-default btn-xs deletebtn"> delete </button>
                                 
                              </td>
                      </tr>`)
                      $("#editsubject").get(0).reset();
                $('#SubjectEditModal').modal('hide');
             } },
              error: function(error){
                console.log(error);
              }
      });
    });
    $('body').on('click', '.deletebtn',function () {
        var subjectid = $(this).val();
        $.ajax({
            url: '{{url("deletesubject")}}',
            type: "GET",
            data: {
               subjectid:subjectid
            }, 
            dataType:"json",
            success: function(data){
               alert("deleted");
               $('#row' + data).remove();
               
              
            }
        });
      });

</script>
@endsection
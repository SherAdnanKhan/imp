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
            <h3 class="box-title">Add Session and Batch</h3>
         </div>
         <form  action="{{ route('addcampus')}}" id="addsession-batch" method="post" accept-charset="utf-8">
            <div class="box-body">
              @csrf                           
               <div class="form-group">
                  <label for="exampleInputSB1">Session/Batch Name</label><small class="req"> *</small>
                  <input autofocus="" name="sb_name" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                  <span class="text-danger"></span>
               </div>
               <div class="form-group"><br>
                  <label for="exampleInputEmail1">Start date</label>
                  <input name="start_date" placeholder="" type="date" class="form-control" value="" autocomplete="off">
                  <span class="text-danger"></span>
               </div>
               <div class="form-group"><br>
                  <label for="exampleInputEmail1">End Date</label>
                  <input  name="end_date" placeholder="" type="date" class="form-control" value="" autocomplete="off">
                  <span class="text-danger"></span>
               </div>
               <div class="form-group">
                <label for="Sins">Please Session/Batch:</label><br> 
                <label class="radio-inline">
                <input type="radio" name="type" value="1" style=" margin: 10px;" > Session
                <input type="radio" name="type" value="0" style=" margin: 10px;"> Batch
                </label>
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
            <h3 class="box-title titlefix">Session/Batch List</h3>
         </div>
         <div class="box-body">
            <div class="table-responsive mailbox-messages">
                 <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
               <table class="table table-striped table-bordered table-hover example dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                     <thead>
                        <tr role="row">
                           <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Subject: activate to sort column ascending" style="width: 208px;">SESSION/BATCH </th>
                           <th class="sorting_desc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Subject Code: activate to sort column ascending" style="width: 236px;" aria-sort="descending">START DATE</th>
                           <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Subject Type: activate to sort column ascending" style="width: 239px;">END DATE</th>
                           <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Subject Type: activate to sort column ascending" style="width: 239px;">TYPE</th>
                           <th class="text-right no-print sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 230px;">Action</th>
                        </tr>
                     </thead>
                     <tbody id="displaydata">
                           @foreach($gsession as $session)
                           <tr id="row{{$session->SB_ID}}">
                              <td class="mailbox-name"> {{$session->SB_NAME}}</td>
                              <td class="mailbox-name"> {{$session->START_DATE}}</td>
                              <td class="mailbox-name"> {{$session->END_DATE}}</td>
                              <td class="mailbox-name"> {{$session->TYPE==1?'Session':'Batch'}}</td>
                              <td class="mailbox-date pull-right">
                                 <button value="{{$session->SB_ID}}" class="btn btn-default btn-xs editbtn" > edit </button>
                                 <button value="{{$session->SB_ID}}" class="btn btn-default btn-xs deletebtn"> delete </button>
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
<div class="modal fade" id="sessionEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header" style="color:rgb(255, 255, 255); background-color: rgb(13, 189, 13);">
            <h5 class="modal-title" id="exampleModalLabel">Edit class </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:rgb(255, 255, 255);">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{route('updatesession-batch')}}" id="editsession" name="classform" method="post" accept-charset="utf-8">
         @csrf     
         <div class="box-body">
            <div class="form-group">
            <input  id="sb_id"type="hidden" name="sb_id" value="">
                  <label for="exampleInputSB1">Session/Batch Name</label><small class="req"> *</small>
                  <input autofocus="" id="sb_name" name="sb_name" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                  <span class="text-danger"></span>
               </div>
               <div class="form-group"><br>
                  <label for="exampleInputEmail1">Start date</label>
                  <input id="start_date" name="start_date" placeholder="" type="date" class="form-control" value="" autocomplete="off">
                  <span class="text-danger"></span>
               </div>
               <div class="form-group"><br>
                  <label for="exampleInputEmail1">End Date</label>
                  <input id="end_date" name="end_date" placeholder="" type="date" class="form-control" value="" autocomplete="off">
                  <span class="text-danger"></span>
               </div>
               <div class="form-group">
                <label for="Sins">Please Session/Batch:</label><br> 
                <label class="radio-inline">
                <input type="radio" id="session" name="type" value="1" style=" margin: 10px;" > Session
                <input type="radio" id="batch" name="type" value="0" style=" margin: 10px;"> Batch
                </label>
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

$('body').on('submit','#addsession-batch',function(e){
      e.preventDefault();
      var fdata = new FormData(this);
      $.ajax({
        url: '{{url("addsession-batch")}}',
            type:'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data){
              //console.log(data)
              var type = data.TYPE==1?'Session':'Batch';
                $('#displaydata').append(`
                     <tr id="row`+data.SB_ID+`">
                        <td class="mailbox-name">` + data.SB_NAME + `</td>
                        <td class="mailbox-name">` + data.START_DATE + `</td>
                        <td class="mailbox-name">` + data.END_DATE + `</td>
                        <td class="mailbox-name">` + type + `</td>
                        
                              <td class="mailbox-date pull-right">
                              <button value="`+data.SB_ID+`" class="btn btn-default btn-xs editbtn"> edit </button>
                              <button value="`+data.SB_ID+`" class="btn btn-default btn-xs deletebtn"> delete </button>
                                 
                              </td>
                      </tr>`)
                      $("#addsession-batch").get(0).reset();
              },
              error: function(error){
                console.log(error);
              }
      });
    });
    $(document).on('click', '.editbtn',function () {
        var sessionid = $(this).val();
        $.ajax({
            url: '{{url("editsession-batch")}}',
            type: "GET",
            data: {
               sessionid:sessionid
            }, 
            dataType:"json",
            success: function(data){
             //  console.log(data);
               
          for(i=0;i<data.length;i++){
            $('#sb_id').val(data[i].SB_ID);
            $('#sb_name').val(data[i].SB_NAME);
            $('#start_date').val(data[i].START_DATE);
            $('#end_date').val(data[i].END_DATE);
            (data[i].TYPE=="1")?$('#session').prop('checked', true):$('#batch').prop('checked', true);
          }
            }
        });
       $('#sessionEditModal').modal('show');
   });
  $('body').on('submit','#editsession',function(e){
      e.preventDefault();
      var fdata = new FormData(this);
      $.ajax({
        url: '{{url("updatesession-batch")}}',
            type:'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data){
               console.log(data)
               
               for(i=0;i<data.length;i++){
                  var type = data[i].TYPE==1?'Session':'Batch';
               $('#row' + data[i].SB_ID).replaceWith(`
               <tr id="row`+data[i].SB_ID+`">
                        <td class="mailbox-name">` + data[i].SB_NAME + `</td>
                        <td class="mailbox-name">` + data[i].START_DATE + `</td>
                        <td class="mailbox-name">` + data[i].END_DATE + `</td>
                        <td class="mailbox-name">` + type+ `</td>
                        
                              <td class="mailbox-date pull-right">
                              <button value="`+data[i].SB_ID+`" class="btn btn-default btn-xs editbtn"> edit </button>
                              <button value="`+data[i].SB_ID+`" class="btn btn-default btn-xs deletebtn"> delete </button>
                                 
                              </td>
                      </tr>`)
                      $("#editsession").get(0).reset();
                $('#sessionEditModal').modal('hide');
             } },
              error: function(error){
                console.log(error);
              }
      });
    });
    $('body').on('click', '.deletebtn',function () {
        var sessionid = $(this).val();
        $.ajax({
            url: '{{url("deletesession-batch")}}',
            type: "GET",
            data: {
               sessionid:sessionid
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
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
         <form  action="{{ route('addcampus')}}" id="subjectform" method="post" accept-charset="utf-8">
            <div class="box-body">
               <input type="hidden" name="ci_csrf_token" value="">                                
               <div class="form-group">
                  <label for="exampleInputsubject1">Subject Name</label><small class="req"> *</small>
                  <input autofocus="" id="category" name="name" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                  <span class="text-danger"></span>
               </div>
            <div class="form-group">
                <label for="Sins">Please Select Instuition type:</label><br> 
                <label class="radio-inline">
                <input type="radio" name="instuition" value="school" style=" margin: 10px;" > School
                <input type="radio" name="instuition" value="L_instuition" style=" margin: 10px;"> Learning Instution
                </label>
                <span class="text-danger"></span>
            </div>
              
               <div class="form-group"><br>
                  <label for="exampleInputEmail1">Subject Code</label>
                  <input id="category" name="code" placeholder="" type="text" class="form-control" value="" autocomplete="off">
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
                           <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Subject                                            Type                                        : activate to sort column ascending" style="width: 239px;">Subject                                            Type                                        </th>
                           <th class="text-right no-print sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 121px;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr role="row" class="odd">
                           <td class="mailbox-name"> Drawing</td>
                           <td class="mailbox-name sorting_1">310</td>
                           <td class="mailbox-name">Practical</td>
                           <td class="mailbox-date pull-right no-print">
                              <a data-placement="left" href="https://demo.smart-school.in/admin/subject/edit/7" class="btn btn-default btn-xs" data-toggle="tooltip" title="Edit">
                              <i class="fa fa-pencil"></i>
                              </a>
                              <a data-placement="left" href="https://demo.smart-school.in/admin/subject/delete/7" class="btn btn-default btn-xs" data-toggle="tooltip" title="Delete" onclick="return confirm('Delete Confirm?');">
                              <i class="fa fa-remove"></i>
                              </a>
                           </td>
                        </tr>
                     
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

                </div> <!-- content -->
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
@endsection
@extends('Admin.AdminLayout.combinelayout')
@section("content")
 <!-- Edit class using modal -->
 <div class="modal fade classEditModal" id="classEditModal"  aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header" style="color:rgb(255, 255, 255); background-color: rgb(13, 189, 13);">
            <h5 class="modal-title" id="exampleModalLabel">Edit class </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:rgb(255, 255, 255);">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{route('updateclass')}}" id="editclass" name="classform" method="post" accept-charset="utf-8">
            <div class="box-body">
              <div class="form-group" style="margin:10px">
                  <input  id="classid"type="hidden" name="classid" value="">
                  <label for="exampleInputclass1">class Name </label><small class="req"> *</small>
                  <input autofocus="" id="classname" name="class_name" placeholder="" type="text" class="form-control" value="" autocomplete="off">
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
<div class="content-page">
<!-- Start content -->
<div class="content">
   <div class="container-fluid">
      <div class="row">
            <div class="col-sm-12">
               <div class="page-title-box">
                  <h4 class="page-title">Blank page</h4>
                  <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Agroxa</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Blank page</li>
                  </ol>

                  <div class="state-information d-none d-sm-block">
                        <div class="state-graph">
                           <div id="header-chart-1"></div>
                           <div class="info">Balance $ 2,317</div>
                        </div>
                        <div class="state-graph">
                           <div id="header-chart-2"></div>
                           <div class="info">Item Sold 1230</div>
                        </div>
                  </div>
               </div>
            </div>
      </div>
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
                                       <h3 class="box-title">Add class</h3>
                                    </div>
                                    <form action="{{route('addclass')}}" id="addclass" name="classform" method="post" accept-charset="utf-8">
                                    
                                    <div class="box-body">
                                    
                                          <div class="form-group">
                                             <label for="exampleInputclass1">Class Name </label><small class="req"> *</small>
                                             <input autofocus="" id="class" name="class_name" placeholder="" type="text" class="form-control" value="" autocomplete="off">
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
                              <div class="col-md-8">
                                 <div class="box box-primary">
                                    <div class="box-header ptbnull">
                                       <h3 class="box-title titlefix">Class List</h3>
                                    </div>
                                    <div class="box-body ">
                                       <div class="table-responsive mailbox-messages">
                                          <div class="download_label">Class List</div>
                                          <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                                             <div class="dt-buttons btn-group btn-group2">               <a class="btn btn-default dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#" title="Copy"><span><i class="fa fa-files-o"></i></span></a> <a class="btn btn-default dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#" title="Excel"><span><i class="fa fa-file-excel-o"></i></span></a> <a class="btn btn-default dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#" title="CSV"><span><i class="fa fa-file-text-o"></i></span></a> <a class="btn btn-default dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#" title="PDF"><span><i class="fa fa-file-pdf-o"></i></span></a> <a class="btn btn-default dt-button buttons-print" tabindex="0" aria-controls="DataTables_Table_0" href="#" title="Print"><span><i class="fa fa-print"></i></span></a> <a class="btn btn-default dt-button buttons-collection buttons-colvis" tabindex="0" aria-controls="DataTables_Table_0" href="#" title="Columns"><span><i class="fa fa-columns"></i></span></a> </div>
                                             <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search" class="" placeholder="Search..." aria-controls="DataTables_Table_0"></label></div>
                                             <table class="table table-striped table-bordered table-hover example dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                                                <thead>
                                                   <tr role="row">
                                                      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Section: activate to sort column ascending" style="width: 479px;">Class</th>
                                                      <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 355px;">Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody id="displaydata">
                                                   @foreach($gclass as $class)
                                                   <tr id="row{{$class->Class_id}}">
                                                      <td class="mailbox-name"> {{$class->Class_name}}</td>
                                                      <td class="mailbox-date pull-right">
                                                         <button value="{{$class->Class_id}}" class="btn btn-default btn-xs editbtn" > edit </button>
                                                         <button value="{{$class->Class_id}}" class="btn btn-default btn-xs deletebtn"> delete </button>
                                                         
                                                      </td>
                                                   </tr>
                                                   @endforeach
                                                </tbody>
                                             </table>
                                             <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Records: 1 to 3 of 3</div>
                                             <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate"><a class="paginate_button previous disabled" aria-controls="DataTables_Table_0" data-dt-idx="0" tabindex="0" id="DataTables_Table_0_previous"><i class="fa fa-angle-left"></i></a><span><a class="paginate_button current" aria-controls="DataTables_Table_0" data-dt-idx="1" tabindex="0">1</a></span><a class="paginate_button next disabled" aria-controls="DataTables_Table_0" data-dt-idx="2" tabindex="0" id="DataTables_Table_0_next"><i class="fa fa-angle-right"></i></a></div>
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
<style>
   
</style>




<script>
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$(document).ready(function(){
   $("body").children().first().before($(".modal"));
});
$('body').on('submit','#addclass',function(e){
      e.preventDefault();
      var fdata = new FormData(this);
      $.ajax({
        url: '{{url("addclass")}}',
            type:'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data){
              // console.log(data)
                $('#displaydata').append(`
                     <tr id="row`+data.Class_id+`">
                        <td class="mailbox-name">` + data.class_name + `</td>
                              <td class="mailbox-date pull-right">
                              <button value="`+data.id+`" class="btn btn-default btn-xs editbtn"> edit </button>
                              <button value="`+data.Class_id+`" class="btn btn-default btn-xs deletebtn"> delete </button>
                                 
                              </td>
                      </tr>`)
                      $("#addclass").get(0).reset();
              },
              error: function(error){
                console.log(error);
              }
      });
    });
    $('body').on('click', '.editbtn',function () {
        var classid = $(this).val();
        $.ajax({
            url: '{{url("editclass")}}',
            type: "GET",
            data: {
               classid:classid
            }, 
            dataType:"json",
            success: function(data){
               console.log(data);
               
          for(i=0;i<data.length;i++){
            $('#classid').val(data[i].Class_id);
            $('#classname').val(data[i].Class_name);
          }
            }
        });
      
      $('.classEditModal').modal('show');
      
   });
  $('body').on('submit','#editclass',function(e){
      e.preventDefault();
      var fdata = new FormData(this);
      $.ajax({
        url: '{{url("updateclass")}}',
            type:'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data){
               console.log(data);
               for(i=0;i<data.length;i++){
               $('#row' + data[i].Class_id).replaceWith(`
                     <tr id="row`+data[i].Class_id+`">
                     <td class="mailbox-name">` + data[i].Class_name + `</td>
                              <td class="mailbox-date pull-right">
                              <button value="`+data[i].Class_id+`" class="btn btn-default btn-xs editbtn" > edit </button>
                              <button value="`+data[i].Class_id+`" class="btn btn-default btn-xs deletebtn"> delete </button>
                                 
                              </td>
                      </tr>`)
                      $("#editclass").get(0).reset();
                $('#classEditModal').modal('hide');
             } },
              error: function(error){
                console.log(error);
              }
      });
    });
    $('body').on('click', '.deletebtn',function () {
        var classid = $(this).val();
        $.ajax({
            url: '{{url("deleteclass")}}',
            type: "GET",
            data: {
               classid:classid
            }, 
            dataType:"json",
            success: function(data){
               alert("deleted");
               $('#row' + data).remove();
                $('#studentdeleteModel').modal('hide');
              
            }
        });
      });

</script>
   
@endSection
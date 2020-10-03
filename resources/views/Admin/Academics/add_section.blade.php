@extends('Admin.AdminLayout.combinelayout')
@section('content')
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
                                        <section class="content">
   <div class="row">
      <div class="col-md-4">
         <div class="box box-primary">
            <div class="box-header with-border">
               <h3 class="box-title">Add Section</h3>
            </div>
            <form action="{{route('addsection')}}" id="addsection" name="sectionform" method="post" accept-charset="utf-8">
            
            <div class="box-body">
             
               <div class="form-group">
                     <label for="exampleInputsection1">Section Name </label><small class="req"> *</small>
                     <input autofocus="" id="section" name="Section_name" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                     <span class="text-danger"></span>
               </div>
               <label for="exampleInputsection1">Select Class :  </label>
                              <select name="Classes_id" id="classes_id" style="text-indent: 10px; color:#85144b; width: 150px;font-size: 20px; margin: 10px;">
                              @foreach($classes as $class)
                     <option value="{{$class->Class_id}}">{{$class->Class_name}}</option>
                     @endforeach
                  </select>
                 
               
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
               <h3 class="box-title titlefix">Section List</h3>
            </div>
            <div class="box-body ">
            
               <div class="table-responsive mailbox-messages">
                  <div class="download_label">Section List</div>
                  <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
                     <div class="dt-buttons btn-group btn-group2">               <a class="btn btn-default dt-button buttons-copy buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#" title="Copy"><span><i class="fa fa-files-o"></i></span></a> <a class="btn btn-default dt-button buttons-excel buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#" title="Excel"><span><i class="fa fa-file-excel-o"></i></span></a> <a class="btn btn-default dt-button buttons-csv buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#" title="CSV"><span><i class="fa fa-file-text-o"></i></span></a> <a class="btn btn-default dt-button buttons-pdf buttons-html5" tabindex="0" aria-controls="DataTables_Table_0" href="#" title="PDF"><span><i class="fa fa-file-pdf-o"></i></span></a> <a class="btn btn-default dt-button buttons-print" tabindex="0" aria-controls="DataTables_Table_0" href="#" title="Print"><span><i class="fa fa-print"></i></span></a> <a class="btn btn-default dt-button buttons-collection buttons-colvis" tabindex="0" aria-controls="DataTables_Table_0" href="#" title="Columns"><span><i class="fa fa-columns"></i></span></a> </div>
                     <div id="DataTables_Table_0_filter" class="dataTables_filter"><label><input type="search" class="" placeholder="Search..." aria-controls="DataTables_Table_0"></label></div>
                     <table class="table table-striped table-bordered table-hover example dataTable no-footer" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                           <thead>
                              <tr role="row">
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Class: activate to sort column ascending" style="width: 255px;">Sections</th>
                                 <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Sections: activate to sort column ascending" style="width: 341px;">Classes</th>
                                 <th class="text-right sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 222px;">Action</th>
                              </tr>
                           </thead>
                                <tbody id="displaydata">
                                @foreach($gsection as $section)
                                <tr id="row{{$section->Section_id}}">
                                    <td class="mailbox-name">
                                       {{$section->Section_name}} 
                                    </td>
                                    <td>
                                    <div>
                                       {{$section->Class_name}}
                                    </div>
                                  </td>
                                 <td class="mailbox-date pull-right">
                                 <button value="{{$section->Section_id}}" class="btn btn-default btn-xs editbtn" > edit </button>
                                 <button value="{{$section->Section_id}}" class="btn btn-default btn-xs deletebtn"> delete </button>
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
</section>

 <!-- Edit section using modal -->
 <div class="modal fade" id="sectionEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="color:rgb(255, 255, 255); background-color: rgb(13, 189, 13);">
                <h5 class="modal-title" id="exampleModalLabel">Edit Section </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:rgb(255, 255, 255);">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
         <form action="{{route('updatesection')}}" id="editsection" name="sectionform" method="post" accept-charset="utf-8">
            
            <div class="box-body">
             
                  <div class="form-group" style="margin:10px">
                     <input  id="sectionid"type="hidden" name="sectionid" value="">
                     <label for="exampleInputsection1">Section Name </label><small class="req"> *</small>
                     <input autofocus="" id="sectionname" name="Section_name" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                     <span class="text-danger"></span>
                  </div>
                  <label for="exampleInputsection1">Select Class :  </label>
                              <select name="editClass_id" id="editClass_id" style="text-indent: 10px; color:#85144b; width: 150px;font-size: 20px; margin: 10px;">
                              @foreach($classes as $class)
                     <option value="{{$class->Class_id}}">{{$class->Class_name}}</option>
                     @endforeach
                  </select>
                 
            </div>
               <div class="box-footer">
                  <button type="submit" class="btn btn-info pull-right">Save</button>
              </div>
               @csrf
         </form>
 </div>
            </div>
 </div>
 <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
<script>
    $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
$('body').on('submit','#addsection',function(e){
      e.preventDefault();
      var fdata = new FormData(this);
      $.ajax({
        url: '{{url("addsection")}}',
            type:'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data){
              // console.log(data)
               
          for(i=0;i<data.length;i++){
                $('#displaydata').append(`
                     <tr id="row`+data[i].Section_id+`">
                        <td class="mailbox-name">` + data[i].Section_name + `</td>
                        <td>
                        <div>` + data[i].Class_name + ` </div>
                         </td>
                              <td class="mailbox-date pull-right">
                              <button value="`+data[i].id+`" class="btn btn-default btn-xs editbtn"> edit </button>
                              <button value="`+data[i].Section_id+`" class="btn btn-default btn-xs deletebtn"> delete </button>
                                 
                              </td>
                      </tr>`)
                      $("#addsection").get(0).reset();
              }},
              error: function(error){
                console.log(error);
              }
      });
    });
    $('body').on('click', '.editbtn',function () {
        var sectionid = $(this).val();
        $.ajax({
            url: '{{url("editsection")}}',
            type: "GET",
            data: {
               sectionid:sectionid
            }, 
            dataType:"json",
            success: function(data){
               //console.log(data);
               
          for(i=0;i<data.length;i++){
            $('#sectionid').val(data[i].Section_id);
            $('#sectionname').val(data[i].Section_name);
          }
            }
        });
       $('#sectionEditModal').modal('show');
   });
  $('body').on('submit','#editsection',function(e){
      e.preventDefault();
      var fdata = new FormData(this);
      fdata.append('key1', 'value1');
fdata.append('key2', 'value2');

// Display the key/value pairs
for (var pair of fdata.entries()) {
    console.log(pair[0]+ ', ' + pair[1]); 
}

      $.ajax({
        url: '{{url("updatesection")}}',
            type:'POST',
            data: fdata,
            processData: false,
            contentType: false,
            success: function(data){
               console.log(data)
               
               for(i=0;i<data.length;i++){
               $('#row' + data[i].Section_id).replaceWith(`
                     <tr id="row`+data[i].Section_id+`">
                     <td class="mailbox-name">` + data[i].Section_name + `</td>
                     <td>
                        <div>` + data[i].Class_name + ` </div>
                         </td>
                 
                              <td class="mailbox-date pull-right">
                              <button value="`+data[i].Section_id+`" class="btn btn-default btn-xs editbtn" > edit </button>
                              <button value="`+data[i].Section_id+`" class="btn btn-default btn-xs deletebtn"> delete </button>
                                 
                              </td>
                      </tr>`)
                      $("#editsection").get(0).reset();
                $('#sectionEditModal').modal('hide');
             } },
              error: function(error){
                console.log(error);
              }
      });
    });
    $('body').on('click', '.deletebtn',function () {
        var sectionid = $(this).val();
        $.ajax({
            url: '{{url("deletesection")}}',
            type: "GET",
            data: {
               sectionid:sectionid
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
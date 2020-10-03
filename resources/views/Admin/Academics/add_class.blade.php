@extends('Admin.AdminLayout.combinelayout')
@section("content")
 <!-- Edit class using modal -->
 <div class="modal fade classEditModal" id="classEditModal"  aria-hidden="true" data-toggle="modal">

   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title mt-0" id="myModalLabel">Edit class</h5>
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
         </div>
         <form action="{{route('updateclass')}}" id="editclass" name="classform" method="post" accept-charset="utf-8">
            <div class="modal-body">
               <div class="box-body">
                  <div class="form-group"">
                        <input  id="classid" type="hidden" name="classid" value="">
                        <label for="exampleInputclass1">class Name </label><small class="req"> *</small>
                        <input autofocus="" id="classname" name="class_name" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                        <span class="text-danger"></span>
                     </div>
                  </div>
               </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div>
               @csrf
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->




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
<<<<<<< HEAD
   </div>
</section>
</div>

=======
      <!-- end row -->

      <div class="page-content-wrapper">
            <div class="row">
               <div class="col-9">
               
                  <div class="card">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-4">
                                 <div class="box box-primary">
                                    <div class="box-header with-border">
                                       <h3 class="box-title">Add class</h3>
>>>>>>> 14eb97018145a904f59c43d7ec7eea2fbed856f8
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
                              <div class="col-8">
                                 <div class="box box-primary">
                                    <div class="box-header ptbnull">
                                       <h3 class="box-title titlefix">Class List</h3>
                                    </div>
                                    <div class="box-body ">
                                             <table id="claases_table" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                              <thead>
                                                   <tr>
                                                      <th>Class</th>
                                                      <th>Action</th>
                                                   </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach($gclass as $class)
                                                   <tr id="row{{$class->Class_id}}">
                                                      <td> {{$class->Class_name}}</td>
                                                      <td>
                                                         <button value="{{$class->Class_id}}" class="btn btn-warning waves-effect waves-light btn-sm editbtn" > Edit </button>
                                                         <button value="{{$class->Class_id}}" class="btn btn-primary waves-effect waves-light btn-sm deletebtn"> Delete </button>
                                                         
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
      <!-- end page content-->

   </div> <!-- container-fluid -->

</div> <!-- content -->




<<<<<<< HEAD
 <!-- Edit class using modal -->
 <div class="form-feed modal fade" id="classEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
=======
>>>>>>> 14eb97018145a904f59c43d7ec7eea2fbed856f8
<script>
$(document).ready(function() {
    $('#claases_table').DataTable();

    //Buttons examples
    var table = $('#datatable-buttons').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'colvis']
    });

    table.buttons().container()
        .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
} );
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
                              <button value="`+data.id+`" class="btn btn-default  waves-effect waves-light editbtn editbtn"> edit </button>
                              <button value="`+data.Class_id+`" class="btn btn-default  waves-effect waves-light deletebtn"> delete </button>
                                 
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
                              <button value="`+data[i].Class_id+`" class="btn btn-primary  waves-effect waves-light btn-sm editbtn" > edit </button>
                              <button value="`+data[i].Class_id+`" class="btn btn-warning  waves-effect waves-light  btn-sm deletebtn"> delete </button>
                                 
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
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
            <form id="form1" action="https://demo.smart-school.in/admin/subjectgroup" name="employeeform" method="post" accept-charset="utf-8">
               <div class="box-body">
                  <input type="hidden" name="ci_csrf_token" value="">
                  <div class="form-group">
                     <label for="exampleInputEmail1">Name</label> <small class="req">*</small>
                     <input autofocus="" id="name" name="name" placeholder="" type="text" class="form-control" value="" autocomplete="off">
                     <span class="text-danger"></span>
                  </div>
                  <div class="form-group">
                     <label for="exampleInputEmail1">Class </label><small class="req"> *</small>
                     <select id="class_id" name="class_id" class="form-control">
                        <option value="">Select</option>
                        <option value="1">
                           Class 1
                        </option>
                        <option value="2">
                           Class 2
                        </option>
                        <option value="3">
                           Class 3
                        </option>
                     </select>
                     <span class="text-danger"></span>
                  </div>
                  <div class="form-group">
                     <!-- Radio group !-->
                     <label class="control-label">Sections</label><small class="req"> *</small>
                     <div class="section_checkbox"></div>
                     <span class="text-danger"></span>
                  </div>
                  <div class="form-group">
                     <label for="exampleInputEmail1">Subject</label><small class="req"> *</small>
                     <div class="checkbox">
                        <label>
                        <input type="checkbox" name="subject[]" value="1">English
                        </label>
                     </div>
                     <div class="checkbox">
                        <label>
                        <input type="checkbox" name="subject[]" value="2">Hindi
                        </label>
                     </div>
                     <div class="checkbox">
                        <label>
                        <input type="checkbox" name="subject[]" value="3">Mathematics
                        </label>
                     </div>
                     <div class="checkbox">
                        <label>
                        <input type="checkbox" name="subject[]" value="4">Science
                        </label>
                     </div>
                     <div class="checkbox">
                        <label>
                        <input type="checkbox" name="subject[]" value="5">Social Studies
                        </label>
                     </div>
                     <div class="checkbox">
                        <label>
                        <input type="checkbox" name="subject[]" value="6">French
                        </label>
                     </div>
                     <div class="checkbox">
                        <label>
                        <input type="checkbox" name="subject[]" value="7">Drawing
                        </label>
                     </div>
                     <span class="text-danger"></span>
                  </div>
                  <div class="form-group">
                     <label for="exampleInputEmail1">Description</label>
                     <textarea class="form-control" id="description" name="description" placeholder="" rows="3"></textarea>
                     <span class="text-danger"></span>
                  </div>
               </div>
               <!-- /.box-body -->
               <div class="box-footer">
                  <button type="submit" class="btn btn-info pull-right">Save</button>
               </div>
            </form>
         </div>
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
                           <th>Class Section</th>
                           <th>Subject</th>
                           <th class="text-right no_print" style="display: block;">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="mailbox-name">
                              <a href="#" data-toggle="popover" class="detail_popover" data-original-title="" title="">Class 3rd Subject Group</a>
                              <div class="fee_detail_popover" style="display: none">
                                 <p class="text text-danger">No Description</p>
                              </div>
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
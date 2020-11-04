@extends('Admin.layout.master')

@section('page-css')
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
@endsection
@section('content')
<div class="page-content-wrapper">
    <div class="row">   
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card m-b-20">
                        <div class="row">

<div class="box-body">
   <div class="table-responsive">
      <table class="table" id="customers">
         <thead>
            <tr>
               <th class="text text-center">Monday                                                    
               </th>
               <th class="text text-center">Tuesday                                                    
               </th>
               <th class="text text-center">Wednesday                                                    
               </th>
               <th class="text text-center">Thursday                                                    
               </th>
               <th class="text text-center">Friday                                                    
               </th>
               <th class="text text-center">Saturday                                                    
               </th>
               <th class="text text-center">Sunday                                                    
               </th>
            </tr>
         </thead>
         <tbody>
            <tr>
               <td class="text text-center" width="14%">
                  <div class="attachment-block clearfix">
                     <b class="text-green">Subject: English (210)
                     </b><br>
                     <strong class="text-green">9:00 AM</strong>
                     <b class="text text-center">-</b>
                     <strong class="text-green">9:45 AM</strong><br>
                     <strong class="text-green">Room Number: 101</strong><br>
                  </div>
               </td>
               <td>
                  <div class="attachment-block clearfix">
                     <b class="text-green">Subject: Mathematics (110)
                     </b><br>
                     <strong class="text-green">11:00 AM</strong>
                     <b class="text text-center">-</b>
                     <strong class="text-green">11:45 AM</strong><br>
                     <strong class="text-green">Room Number: 101</strong><br>
                  </div>
                  </td>
               <td>
                  <div class="attachment-block clearfix">
                     <b class="text-green">Subject: Social Studies (111)
                     </b><br>
                     <strong class="text-green">1:00 PM</strong>
                     <b class="text text-center">-</b>
                     <strong class="text-green">1:45 PM</strong><br>
                     <strong class="text-green">Room Number: 101</strong><br>
                  </div>
                  </td>
               <td>
                  <div class="attachment-block clearfix">
                     <b class="text-green">Subject: Hindi (211)
                     </b><br>
                     <strong class="text-green">10:00 AM</strong>
                     <b class="text text-center">-</b>
                     <strong class="text-green">10:45 AM</strong><br>
                     <strong class="text-green">Room Number: 101</strong><br>
                  </div>
                  </td>
               <td>
                  <div class="attachment-block clearfix">
                     <b class="text-green">Subject: Science (112)
                     </b><br>
                     <strong class="text-green">12:00 AM</strong>
                     <b class="text text-center">-</b>
                     <strong class="text-green">12:45 AM</strong><br>
                     <strong class="text-green">Room Number: 101</strong><br>
                  </div>
               </td>

               <td class="text text-center" width="14%">
                  <div class="attachment-block clearfix">
                     <b class="text-green">Subject: English (210)
                     </b><br>
                     <strong class="text-green">9:00 AM</strong>
                     <b class="text text-center">-</b>
                     <strong class="text-green">9:45 AM</strong><br>
                     <strong class="text-green">Room Number: 101</strong><br>
                  </div>
                  </td>
               <td>
                  <div class="attachment-block clearfix">
                     <b class="text-green">Subject: Mathematics (110)
                     </b><br>
                     <strong class="text-green">11:00 AM</strong>
                     <b class="text text-center">-</b>
                     <strong class="text-green">11:45 AM</strong><br>
                     <strong class="text-green">Room Number: 101</strong><br>
                  </div>
                  </td>
</tr>
<tr>

               <td>
                  <div class="attachment-block clearfix">
                     <b class="text-green">Subject: Social Studies (111)
                     </b><br>
                     <strong class="text-green">1:00 PM</strong>
                     <b class="text text-center">-</b>
                     <strong class="text-green">1:45 PM</strong><br>
                     <strong class="text-green">Room Number: 101</strong><br>
                  </div>
                  </td>
               <td>
                  <div class="attachment-block clearfix">
                     <b class="text-green">Subject: Hindi (211)
                     </b><br>
                     <strong class="text-green">10:00 AM</strong>
                     <b class="text text-center">-</b>
                     <strong class="text-green">10:45 AM</strong><br>
                     <strong class="text-green">Room Number: 101</strong><br>
                  </div>
                  </td>
               <td>
                  <div class="attachment-block clearfix">
                     <b class="text-green">Subject: Science (112)
                     </b><br>
                     <strong class="text-green">12:00 PM</strong>
                     <b class="text text-center">-</b>
                     <strong class="text-green">12:45 PM</strong><br>
                     <strong class="text-green">Room Number: 101</strong><br>
                  </div>
               </td>
               <td class="text text-center" width="14%">
                  <div class="attachment-block clearfix">
                     <b class="text-green">Subject: English (210)
                     </b><br>
                     <strong class="text-green">9:00 AM</strong>
                     <b class="text text-center">-</b>
                     <strong class="text-green">9:45 AM</strong><br>
                     <strong class="text-green">Room Number: 101</strong><br>
                  </div>
                  </td>
               <td>
                  <div class="attachment-block clearfix">
                     <b class="text-green">Subject: Mathematics (110)
                     </b><br>
                     <strong class="text-green">11:00 AM</strong>
                     <b class="text text-center">-</b>
                     <strong class="text-green">11:45 AM</strong><br>
                     <strong class="text-green">Room Number: 101</strong><br>
                  </div>
                  </td>
               <td>
                  <div class="attachment-block clearfix">
                     <b class="text-green">Subject: Social Studies (111)
                     </b><br>
                     <strong class="text-green">1:00 PM</strong>
                     <b class="text text-center">-</b>
                     <strong class="text-green">1:45 PM</strong><br>
                     <strong class="text-green">Room Number: 101</strong><br>
                  </div>
                  </td>
               <td>
                  <div class="attachment-block clearfix">
                     <b class="text-green">Subject: Hindi (211)
                     </b><br>
                     <strong class="text-green">10:00 AM</strong>
                     <b class="text text-center">-</b>
                     <strong class="text-green">10:45 AM</strong><br>
                     <strong class="text-green">Room Number: 101</strong><br>
                  </div>
                  </td>
</tr>
<tr>
    
               <td class="text text-center" width="14%">
                  <div class="attachment-block clearfix">
                     <b class="text text-center">Not <br>Scheduled</b><br>
                  </div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
</div>
</div></div></div></div></div></div></div>


@endsection
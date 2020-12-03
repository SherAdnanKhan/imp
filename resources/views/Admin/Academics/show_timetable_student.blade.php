@extends('Admin.layout.master')

@section('content')
<div class="page-content-wrapper">
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <div class="card m-b-20">
                  <div class="row">
               <div class="col-md-12">

                        <div id="myDIV" >
                              <div class="box-body">
                           <div class="table-responsive">
                           <table class="table" id="customers">
                              <thead id="theads">
                              </thead>
                                    <tbody id="tabledata">
                                    <th width="125">Time</th>
               @for($i = 0; $i < count($WEEK_DAYS); $i++)
                  <th> {{$WEEK_DAYS[$i]}} </th>
               @endfor 
                @foreach($calendarData as $time => $days)
                    <tr>
                 <td>   {{ $time }} </td>
                 @foreach($days as $value)
                  @if (is_array($value))
   
                  <td>  Subject: {{$value['subject_name']}}<br>
                  Room : {{$value['class_name']}}<br>
                  Teacher: {{$value['teacher_name']}} </td>
               
                
                 @elseif($value === 1)
                  <td></td>
                 @endif          
               @endforeach
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
@endsection

@section('customscript')


@endsection
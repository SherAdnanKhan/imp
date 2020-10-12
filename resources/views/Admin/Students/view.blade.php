@extends('Admin.layout.master')
@section("page-css")
<style>
  
td:nth-child(even) {color: white; background-color: #009B77;}
  * {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>

@endsection
@section("content")
<div class="container mt-4">
        <div class="row">

            <div class="col-md-4">
                <h3>Category*<span class="gcolor"></span> </h3>
                <div class="form-s2">
                    <div>
                        <select class="form-control formselect required" placeholder="Select Class"
                            id="class_id">
                            <option value="0" disabled selected>Select
                                Class*</option>
                            @foreach($classes as $class)
                            <option  value="{{ $class->Class_id }}">
                                {{ ucfirst($class->Class_name) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <h3>section*</h3>
                <select class="form-control formselect required" placeholder="Select Section" id="sectionid"
                    >
                </select>
            </div>
            <div class="col-md-4">
                <h3>Search*</h3>
                <div class="form-s2">
                <form class="example" action="/action_page.php" style="margin:auto;max-width:300px">
                  <input type="text" placeholder="Search.." name="search2">
                  <button type="submit"><i class="fa fa-search"></i></button>
                  </form>
                    <div>
                      
                    </div>
                </div>
            </div>
       </div>

       <div class="row" style="padding-top: 40px;">
            <div class="col-md-12" id="displaydata">
            </div>
            </div>

</div>

@endsection
@section('customscript')
<script>
                $(document).ready(function () {
                $('#class_id').on('change', function () {
                let id = $(this).val();
                $('#sectionid').empty();
                $('#sectionid').append(`<option value="0" disabled selected>Processing...</option>`);
                $.ajax({
                type: 'GET',
                url: 'getsection/' + id,
                success: function (response) {
                var response = JSON.parse(response);
                //console.log(response);   
                $('#sectionid').empty();
                $('#sectionid').append(`<option value="0" disabled selected>Select Section*</option>`);
                response.forEach(element => {
                    $('#sectionid').append(`<option value="${element['Section_id']}.${element['Class_id']}">${element['Section_name']}</option>`);
                    });
                }
            });
        });
        $('#sectionid').on('change', function () {
                let id = $(this).val();
                let html = "";

                $.ajax({
                type: 'GET',
                dataType: "json",
                url: 'getmatchingdata/'+ id,
                success: function (data) {
                  if ($.trim(data) == '' ) {
                    html +='<p style="text-align:center;color:red;"> NO Result Match </p>';
                  }
                  else
                  {
                    html += '<table class="table table-dark">';
                    html += '<thead>';
                    html += ' <tr>';
                    html += '   <th scope="col">Student ID</th>';
                    html += '    <th scope="col">Student Name</th>';
                    html += '   <th scope="col">FATHER NAME</th>';
                    html += '    <th scope="col">FATHER Contact</th>';
                    html += '    <th scope="col">PREVIOUS CLASS</th>';
                    html += '    <th scope="col">PRESENT ADDRESS</th>';
                    html += '    <th scope="col">SHIFT</th>';
                    html += '   <th scope="col">Date Of Birth </th>';
                    html += '    <th scope="col">Student Picture</th>';
                    html += '     <th scope="col">Edit</th>';
                    html += '   </tr>';
                    html += ' </thead>';
                    html += ' <tbody>';
                    for (i = 0; i < data.length; i++) {
               
                     
                      html += '<tr id="row'+data[i].STUDENT_ID+'">';
                      html += '  <td>'+ data[i].STUDENT_ID+' </td>';
                      html += '  <td>' + data[i].NAME+ '</td>';
                      html += '  <td>' + data[i].FATHER_NAME+ '</td>';
                      html += '  <td>' + data[i].FATHER_CONTACT+ '</td>';
                      html += '  <td>'+ data[i].PREV_CLASS+ '</td>';
                      html += '  <td>' + data[i].PRESENT_ADDRESS + '</td>';
                      html += ' <td>' + data[i].SHIFT + '</td>';
                      html += '  <td>' + data[i].DOB + '</td>';
                      html += '  <td><img src="http://127.0.0.1:8000/upload/'+ data[i].IMAGE + '" style="width:50px;height:50px;" alt=""></td>';
                      html += '   <td>';
                      html += '      <button class="btn btn-success ajaxEditBtn">Edit</button>';
                      html += '   </td>';
                      html += '</tr>';
                    }
                    html += '</tbody>';
                   html += '</table>';

                  }
                 
                  $("#displaydata").empty();
                $('#displaydata').html(html);
                }
                
              });
            });
    });
  </script>
@endsection
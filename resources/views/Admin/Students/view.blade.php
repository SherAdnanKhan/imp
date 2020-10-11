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
            <div class="col-md-12">
            <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">Student ID</th>
                        <th scope="col">Student Name</th>
                        <th scope="col">FATHER NAME</th>
                        <th scope="col">FATHER Contact</th>
                        <th scope="col">PREVIOUS CLASS</th>
                        <th scope="col">PRESENT ADDRESS</th>
                        <th scope="col">SHIFT</th>
                        <th scope="col">Date Of Birth </th>
                        <th scope="col">Student Picture</th>
                        <th scope="col">Edit</th>
                      </tr>
                    </thead>
                    
                    <tbody id="displaydata">
                    </tbody>
                  </table>
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
                $.ajax({
                type: 'GET',
                dataType: "json",
                url: 'getmatchingdata/'+ id,
                success: function (data) {
                  if ($.trim(data) == '' ) {
                    $("#displaydata").empty();
                    $('#displaydata').append(`
                    <p style="text-align:center;color:red;"> NO Result Match </p>
                    `)
                  }
                  else
                  {
                    $("#displaydata").empty();
                for (i = 0; i < data.length; i++) {

                $('#displaydata').append(`

                     <tr id="row`+data[i].STUDENT_ID+`">
                        <td>`+ data[i].STUDENT_ID+ `</td>
                        <td>` + data[i].NAME+ `</td>
                        <td>` + data[i].FATHER_NAME+ `</td>
                        <td>` + data[i].FATHER_CONTACT+ `</td>
                        <td>`+ data[i].PREV_CLASS+ `</td>
                        <td>` + data[i].PRESENT_ADDRESS + `</td>
                        <td>` + data[i].SHIFT + `</td>
                        <td>` + data[i].DOB + `</td>
                        <td><img src="http://127.0.0.1:8000/upload/`+ data[i].IMAGE + `" style="width:50px;height:50px;" alt=""></td>
                        <td>
                            <button class="btn btn-success ajaxEditBtn">Edit</button>
                        </td>
                      </tr>`)
                }}
                }
              });
            });
    });
  </script>
@endsection
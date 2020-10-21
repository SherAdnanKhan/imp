<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelex_employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\teacherloginRequest;

class EmployeeController extends Controller
{

   

    public function index_employee()
    {   
        return view('Admin.HRManagement.addemployeecategory');
      
    }
    public function add_employee(EmployeeRequest $request)
    {
        $image = $request->file('EMP_IMAGE');
        $my_image =null;
        if(!empty($image)):
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload'), $my_image);
        endif;

        $recent_entry_student= Kelex_employee::create([
            'EMP_NAME' => $request->EMP_NAME,
            'FATHER_NAME' => $request->FATHER_NAME,
            'DESIGNATION_ID' => $request->DESIGNATION_ID,
            'QUALIFICATION' => $request->QUALIFICATION,
            'GENDER' => $request->GENDER,
            'EMP_DOB' => $request->EMP_DOB, 
            'CNIC' => $request->CNIC,
            'EMP_TYPE' => $request->EMP_TYPE,
            'ADDRESS' => $request->ADDRESS,
            'EMP_NO' => $request->EMP_NO, 
            'ALLOWANCESS' => $request->ALLOWANCESS,
            'CREATED_BY' => Auth::user()->id,
             'JOINING_DATE' => $request->JOINING_DATE,
             'LEAVING_DATE' => $request->LEAVING_DATE, 
             'EMP_IMAGE' => $my_image,
              'ADDED_BY' => Auth::user()->id,
             'CAMPUS_ID' => Auth::user()->CAMPUS_ID,
             'PASSWORD'=> Hash::make('123456'),
        ]);
        $msg='Employee Record inserted successfully';
        return response()->json($msg);
    }
    public function showemployee()
    {

    $employee= Kelex_employee::all();
    

    return view('Admin.HRManagement.viewemployeecategory')->with('employees',$employee);
    }

    public function getemployeedata($id){

        $data= Kelex_employee::where('EMP_ID',$id)->first();
        return view('Admin.HRManagement.editemployeecategory')->with('employee',$data,);
       
    }
    public function update_employee(Request $request)
    {
        $res = Kelex_employee::find($request->id);
        $image = $request->file('EMP_IMAGE');
        if(!empty($image))
        {
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload'), $my_image);
                $res->EMP_IMAGE = $my_image;
        }
        $res->EMP_NAME = $request->input('EMP_NAME');
        $res->FATHER_NAME = $request->input('FATHER_NAME');
        $res->GENDER = $request->input('GENDER');
        $res->CNIC = $request->input('CNIC');
        $res->DESIGNATION_ID = $request->input('DESIGNATION_ID');
        $res->QUALIFICATION = $request->input('QUALIFICATION');
        $res->EMP_TYPE = $request->input('EMP_TYPE');
        $res->ADDRESS = $request->input('ADDRESS');
        $res->CREATED_BY = $request->input('CREATED_BY');
        $res->JOINING_DATE = $request->input('JOINING_DATE');
        $res->LEAVING_DATE = $request->input('LEAVING_DATE');
        $res->EMP_DOB = $request->input('EMP_DOB');
        $res->ALLOWANCESS = $request->input('ALLOWANCESS');
        $res->ADDED_BY = $request->input('ADDED_BY');
        $res->CAMPUS_ID = $request->input('CAMPUS_ID');
        $res->save();

        return response()->json('success fully updated');

    }
}

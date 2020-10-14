<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelex_employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\EmployeeRequest;

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
        // $regno = 0;
        $EMP= DB::table('kelex_employees')
        ->where('CAMPUS_ID',Auth::user()->CAMPUS_ID)
        ->select('EMP_NO')
        ->latest('created_at')
        ->first();
     
        $EMP_NO = ( $EMP == NULL) ? 1 : $EMP->EMP_NO+1;
        // dd($regno);
        $recent_entry_student= Kelex_employee::create([
            'EMP_NAME' => $request->EMP_NAME,
            'FATHER_NAME' => $request->FATHER_NAME,
            'DESIGNATION_ID' => $request->DESIGNATION_ID,
            'QUALIFICATION' => $request->QUALIFICATION,
            'GENDER' => $request->GENDER,
            'EMP_DOB' => $request->DOB, 
            'CNIC' => $request->CNIC,
            'EMP_TYPE' => $request->EMP_TYPE,
            'ADDRESS' => $request->ADDRESS,
            'PASSWORD' => $request->PASSWORD, 
            'ALLOWANCESS' => $request->ALLOWANCESS,
            'CREATED_BY' => Auth::user()->id,
             'JOINING_DATE' => $request->JOINING_DATE,
             'LEAVING_DATE' => $request->LEAVING_DATE, 
             'EMP_IMAGE' => $my_image,
              'ADDED_BY' => Auth::user()->id,
             'CAMPUS_ID' => Auth::user()->CAMPUS_ID,
             'EMP_NO'=> $EMP_NO,
        ]);
        $msg='Student Record inserted successfully';
        return response()->json($msg);
    }
}

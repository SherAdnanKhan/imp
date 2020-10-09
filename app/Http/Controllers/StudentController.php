<?php

namespace App\Http\Controllers;

use App\Http\Requests\studentrequest;
use App\Models\Kelex_class;
use App\Models\Kelex_student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index_student()
    {
        $class= Kelex_class::all(); 
        return view("Admin.Students.addstudent")->with('classes',$class);
    }
    public function add_student(studentrequest $request)
    {
         Kelex_student::create([
            'NAME' => $request->NAME,
            'FATHER_NAME' => $request->FATHER_NAME,
            'FATHER_CONTACT' => $request->FATHER_CONTACT,
            'SECONDARY_CONTACT' => $request->SECONDARY_CONTACT,
            'GENDER' => $request->GENDER,
            'DOB' => $request->DOB, 
            'CNIC' => $request->CNIC,
            'RELIGION' => $request->RELIGION,
            'FATHER_CNIC' => $request->FATHER_CNIC,
            'SHIFT' => $request->SHIFT, 
            'PRESENT_ADDRESS' => $request->PRESENT_ADDRESS,
            'PERMANENT_ADDRESS' => $request->PERMANENT_ADDRESS,
             'GUARDIAN' => $request->GUARDIAN,
             'GUARDIAN_CNIC' => $request->GUARDIAN_CNIC, 
             'IMAGE' => $request->IMAGE,
              'PREV_CLASS' => $request->PREV_CLASS,
              'SLC_NO' => $request->SLC_NO,
             'PREV_CLASS_MARKS' => $request->PREV_CLASS_MARKS,
             'PREV_BOARD_UNI' => $request->PREV_BOARD_UNI,
             'PASSING_YEAR' => $request->PASSING_YEAR, 
             'CAMPUS_ID' => '1',
              'USER_ID' => '1', 
        ]);
        $msg='Company inserted successfully';
        return response()->json($msg);
    }
}

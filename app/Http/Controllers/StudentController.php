<?php

namespace App\Http\Controllers;

use App\Models\Kelex_class;
use Illuminate\Http\Request;
use App\Models\Kelex_student;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\studentrequest;

class StudentController extends Controller
{
    public function index_student()
    {
        $class= Kelex_class::all(); 
        return view("Admin.Students.addstudent")->with('classes',$class);
    }
    public function add_student(studentrequest $request)
    {
        $image = $request->file('IMAGE');
        $my_image =null;
        if(!empty($image)):
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload'), $my_image);
        endif;
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
             'IMAGE' => $my_image,
              'PREV_CLASS' => $request->PREV_CLASS,
              'SLC_NO' => $request->SLC_NO,
             'PREV_CLASS_MARKS' => $request->PREV_CLASS_MARKS,
             'PREV_BOARD_UNI' => $request->PREV_BOARD_UNI,
             'PASSING_YEAR' => $request->PASSING_YEAR, 
             'CAMPUS_ID' => '1',
              'USER_ID' => '1', 
        ]);
        $msg='Student Record inserted successfully';
        return response()->json($msg);
    }
    public function showstudent()
    {
    $student= Kelex_student::all();
    

    return view('Admin.Students.view_students')->with('students',$student);
    }

    public function getstudentdata($id){
        $data = Kelex_student::find($id)->toArray();
        $class= Kelex_class::all(); 
        return view('Admin.Students.editstudent')->with(['student'=>$data,'classes'=>$class]);
       
    }
    public function update_student(studentrequest $request)
    {
        $image = $request->file('IMAGE');
        $my_image =null;
        if(!empty($image)):
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload'), $my_image);
        endif;
       Kelex_student::where('STUDENT_ID',$request->STUDENT_ID)->update([
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
             'IMAGE' => $my_image,
              'PREV_CLASS' => $request->PREV_CLASS,
              'SLC_NO' => $request->SLC_NO,
             'PREV_CLASS_MARKS' => $request->PREV_CLASS_MARKS,
             'PREV_BOARD_UNI' => $request->PREV_BOARD_UNI,
             'PASSING_YEAR' => $request->PASSING_YEAR, 
             'CAMPUS_ID' => '1',
              'USER_ID' => '1', 
        ]);
        $msg='Student Record Updated successfully';
        return response()->json($msg);
    }
    public function delete_student(Request $request)
    {
        $id=$request->input('dstudentid');
        $selstudent = Kelex_student::find($id);
        $selstudent->delete(); 
        return response()->json($id);

    }

}

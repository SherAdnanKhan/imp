<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelex_student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\studentloginRequest;

class StudentLoginController extends Controller
{
    public function login_student(studentloginRequest $request)
    {
     $REG_NO = $request->input('REG_NO');
     $password = $request->input('STD_PASSWORD');

     $student = Kelex_student::where('REG_NO', '=',$REG_NO)->first();
     
     if (!$student)
    {
        return response()->json();
    }
     if (!Hash::check($password, $student->STD_PASSWORD))
      {
        return response()->json();
     }
        Session::put([
            'CAMPUS_ID'=>$student['CAMPUS_ID'],
            'is_student'=>true,
            'STUDENT_ID'=>$student['STUDENT_ID'],
            ]);
        return response()->json(['url'=>url('student/dashboard')]);

    }


    public function logout_student(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/');
    }
    public function dashboard()
    {   
        return view('student_dashboard');
    }

}

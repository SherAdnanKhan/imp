<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelex_employee;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\teacherloginRequest;
use Illuminate\Support\Facades\Hash;

class TeacherLoginController extends Controller
{
    public function login_employee(teacherloginRequest $request)
    {
      $EMP_NO = $request->input('EMP_NO');
      $PASSWORD = $request->input('PASSWORD');
 
      $employee = Kelex_employee::where('EMP_NO', '=',$EMP_NO)->first();
      if (!$employee)
     {
         return response()->json();
     }
      if (!Hash::check($PASSWORD, $employee->PASSWORD))
       {
         return response()->json();
      }
        Session::put([
            'CAMPUS_ID'=>$employee['CAMPUS_ID'],
            'is_teacher'=>true,
            'EMP_ID'=>$employee['EMP_ID'],
            ]);
        return response()->json(['url'=>url('teacher/dashboard')]);
     
    }
    public function logout_employee(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();

        return redirect('/');
    }
    public function dashboard()
    {   
        return view('teacher_dashboard');
    }

}

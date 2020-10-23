<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelex_employee;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\teacherloginRequest;

class TeacherLoginController extends Controller
{
    public function login_employee(teacherloginRequest $request)
    {
      $result=  Kelex_employee::where(['EMP_NO'=>$request->EMP_NO,'PASSWORD'=>$request->PASSWORD])
      ->select('kelex_employees.*')
      ->get();
   

        
      if(count($result)>0)
      {
        Session::put([
            'CAMPUS_ID'=>$result[0]['CAMPUS_ID'],
            'is_teacher'=>true,
            'EMP_ID'=>$result[0]['EMP_ID'],
            ]);
        return response()->json(['url'=>url('teacher/dashboard')]);
      }
      else
      {
        return response()->json();
      }

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

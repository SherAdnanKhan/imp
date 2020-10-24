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

      $result=  Kelex_student::where(['REG_NO'=>$request->REG_NO,'STD_PASSWORD'=>$request->STD_PASSWORD])->
      select('kelex_students.*')
      ->get();


      if(count($result)>0)
      {
        Session::put([
            'CAMPUS_ID'=>$result[0]['CAMPUS_ID'],
            'is_student'=>true,
            'STUDENT_ID'=>$result[0]['STUDENT_ID'],
            ]);
        return response()->json(['url'=>url('student/dashboard')]);
      }
      else
      {
        return response()->json();
      }

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

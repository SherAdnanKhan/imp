<?php

namespace App\Http\Controllers;

use DateTime;
use DatePeriod;
use DateInterval;
use Illuminate\Http\Request;
use App\Models\Kelex_staff_application;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\TeacherApplicationRequest;

class TeacherAttendanceController extends Controller
{
    public function TeacherApplication(Request $request)
    {
        return view('Admin.TeacherAttendance.teacher_application');
    }
    public function AddApplication(TeacherApplicationRequest $request)
    {
        $result= Kelex_staff_application::where('START_DATE',$request->START_DATE)->
        where('CAMPUS_ID', Session::get('CAMPUS_ID'))->
        where('EMP_ID',Session::get('EMP_ID'))->get();
        if(count($result)==0)
        {
           Kelex_staff_application::create(['EMP_ID'=>Session::get('EMP_ID'),'APPLICATION_STATUS'=>'0',
          'APPLICATION_DESCRIPTION'=>$request->APPLICATION_DESCRIPTION,'APPLICATION_TYPE'=>$request->APPLICATION_TYPE,
          'START_DATE'=>$request->START_DATE,'END_DATE'=>$request->END_DATE,'CAMPUS_ID'=>Session::get('CAMPUS_ID')]);
          return response()->json(true);
        }
        else
        {
            return response()->json(false);
        }
    
    }
    public function ViewApplication(Request $request)
    {
        $application=Kelex_staff_application::where('EMP_ID',Session::get('EMP_ID'))->
        where('CAMPUS_ID', Session::get('CAMPUS_ID'))->get();
    
        return view('Admin.TeacherAttendance.view_application_teacher')->with('application',$application);
    
    }


    public function ViewApplicationbyadmin(Request $request)
    {
        // $dates = $this->twoDatesRange('2020-04-04', '2020-04-06'); dd($dates);
    
        $todayapplicationlog=Kelex_staff_application::orderBy('START_DATE', 'ASC')->get();
            
        $application=Kelex_staff_application::where('APPLICATION_STATUS',"0")->
        where('CAMPUS_ID', Session::get('CAMPUS_ID'))->get();
    
        return view('Admin.TeacherAttendance.check_application_admin')->with(['applications'=>$application,'todayapplog'=>$todayapplicationlog]);
    
    }
    public function actionApplicationbyadmin(Request $request)
    {
        
        $application=Kelex_staff_application::where('APPLICATION_STATUS',"0")->
        where('STAFF_APP_ID',$request->STAFF_APP_ID)
        ->where('CAMPUS_ID', Session::get('CAMPUS_ID'))->get();
        if(count($application)!=="0"){
        Kelex_staff_application::where('STAFF_APP_ID',$request->STAFF_APP_ID)->
        update(['APPLICATION_STATUS'=>$request->APPLICATION_STATUS,
        'APPROVED_AT'=>date('Y-m-d'),'USER_ID'=>Session::get('user_id')]);
        return response()->json(true);
        }
    
        return response()->json(false);
    
    
    
    }
    
    function twoDatesRange($start, $end, $format = 'Y-m-d') {
        $arr = array();
        $interval = new DateInterval('P1D');
    
        $realEnd = new DateTime($end);
        $realEnd->add($interval);
    
        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);
    
        foreach($period as $date) { 
            $arr[] = $date->format($format); 
        }
    
        return $arr;
    }
}
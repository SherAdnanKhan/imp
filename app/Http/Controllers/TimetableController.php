<?php

namespace App\Http\Controllers;

use App\Models\Kelex_class;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Kelex_subjectgroupname;
use App\Models\Kelex_timetable;
use Illuminate\Support\Facades\Session;

class TimetableController extends Controller
{
    public function index(){
        $campus_id = Auth::user()->CAMPUS_ID;
        $class= Kelex_class::where('CAMPUS_ID',$campus_id)->get();
        $Kelex_subjectgroupname= Kelex_subjectgroupname::where('CAMPUS_ID',$campus_id)->get();
        // dd($class);
        return view("Admin.Academics.add-timetable")->with(['classes'=>$class,'subjectgroups'=>$Kelex_subjectgroupname]);
    
    }
    public function Searchtimetable(Request $request){
        // dd($request->all());
        $data['subject'] = DB::table('kelex_subjectgroups')
        ->leftJoin('kelex_sections', 'kelex_subjectgroups.SECTION_ID', '=', 'kelex_sections.Section_id')
        ->leftJoin('kelex_classes', 'kelex_subjectgroups.CLASS_ID', '=', 'kelex_classes.Class_id')
        ->leftJoin('kelex_subjects', 'kelex_subjects.SUBJECT_ID', '=', 'kelex_subjectgroups.SUBJECT_ID')
        ->where('kelex_subjectgroups.SECTION_ID', '=',$request->SECTION_ID)
        ->where('kelex_subjectgroups.CLASS_ID', '=',$request->CLASS_ID)
        ->where('kelex_subjectgroups.GROUP_ID', '=',$request->GROUP_ID)
        ->where('kelex_sections.CAMPUS_ID', '=', Session::get('CAMPUS_ID'))
        ->select('kelex_sections.Section_name', 'kelex_classes.Class_name','kelex_subjectgroups.*' ,'kelex_subjects.SUBJECT_NAME')
        ->orderBy('kelex_sections.section_id', 'asc')
        ->get()->toArray();
        $data['teacher']=DB::table('kelex_employees')->where('CAMPUS_ID', '=', Session::get('CAMPUS_ID'))->where('EMP_TYPE', '=', '1')->get()->toArray();
       return response()->json($data);
    
    }
    public function Savetimetable(Request $request){
       $result= Kelex_timetable::where('DAY',$request->DAY)->where('CAMPUS_ID', Session::get('CAMPUS_ID'))
       ->where('GROUP_ID', $request->GROUP_ID)
       ->where('SECTION_ID', Session::get('SECTION_ID'))->get();

       if(count($result)>0)
       {
           return false;
       }
       $EMP_ID=implode(',',$request->EMP_ID);
       $SUBJECT_ID=implode(',',$request->SUBJECT_ID);
       $TIMEFROM=implode(',',$request->TIMEFROM);
       $TIMETO=implode(',',$request->TIMETO);
       
       
       Kelex_timetable::create(['EMP_ID'=>$EMP_ID,'GROUP_ID'=>$request->GROUP_ID,'CLASS_ID'=>$request->CLASS_ID,
       'SECTION_ID'=>$request->SECTION_ID,'SUBJECT_ID'=>$SUBJECT_ID,'DAY'=>$request->DAY,'TIMEFROM'=> $TIMEFROM,
       'TIMETO'=>$TIMETO,'CAMPUS_ID'=>Auth::user()->CAMPUS_ID,'USER_ID'=>Auth::user()->id]);
       return response()->json(true);
    
    }

}

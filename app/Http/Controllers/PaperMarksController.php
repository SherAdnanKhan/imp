<?php

namespace App\Http\Controllers;

use App\Models\Kelex_exam;
use App\Models\Kelex_class;
use Illuminate\Http\Request;
use App\Models\Kelex_paper_mark;
use App\Models\Kelex_sessionbatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Exam_CheckRequest;
use App\Http\Requests\Exam_MarkSearchRequest;

class PaperMarksController extends Controller
{


    public function paper(){
        $class= Kelex_class::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        $getexam = Kelex_exam::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        $session = Kelex_sessionbatch::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        return view('Admin.Examination.paper_mark_teacher')->with(['gexam'=>$getexam,'sessions'=>$session,'classes'=>$class]);
    }
    public function getsubjects(Request $request){
        // dd($request->CLASS_ID);
        $data= DB::table('kelex_exam_papers')
        ->leftJoin('kelex_exams', 'kelex_exams.EXAM_ID', '=', 'kelex_exam_papers.EXAM_ID')
        ->leftJoin('kelex_subjects', 'kelex_subjects.SUBJECT_ID', '=', 'kelex_exam_papers.SUBJECT_ID')
        ->leftJoin('kelex_exam_assigns', 'kelex_exam_assigns.PAPER_ID', '=', 'kelex_exam_papers.PAPER_ID')
        ->where('kelex_exam_assigns.EMP_ID', '=', Session::get('EMP_ID'))
        ->where('kelex_exam_papers.CAMPUS_ID', '=', Session::get('CAMPUS_ID'))
        ->where('kelex_exam_papers.SECTION_ID','=',$request->SECTION_ID)
        ->where('kelex_exam_papers.CLASS_ID','=', $request->CLASS_ID)
        ->where('kelex_exam_papers.SESSION_ID','=',$request->SESSION_ID)
        ->where('kelex_exam_papers.EXAM_ID','=',$request->EXAM_ID)
        ->select('kelex_subjects.*','kelex_exam_papers.*')
        ->get()->toArray();
     

        return response()->json($data);
       }
    public function Search_Student(Exam_MarkSearchRequest $request){
        $data['result']= DB::table('kelex_students_sessions')
        ->leftJoin('kelex_students', 'kelex_students.STUDENT_ID', '=', 'kelex_students_sessions.STUDENT_ID')
        ->leftJoin('kelex_paper_marks', 'kelex_paper_marks.STUDENT_ID', '=', 'kelex_students_sessions.STUDENT_ID')
        ->where('kelex_students_sessions.CAMPUS_ID', '=', Session::get('CAMPUS_ID'))
        ->where('kelex_students_sessions.SECTION_ID','=',$request->SECTION_ID)
        ->where('kelex_students_sessions.CLASS_ID','=', $request->CLASS_ID)
        ->where('kelex_students_sessions.SESSION_ID','=',$request->SESSION_ID)
        ->where('kelex_paper_marks.EXAM_ID','=',$request->EXAM_ID)
        ->where('kelex_paper_marks.SUBJECT_ID','=',$request->SUBJECT_ID)
        ->select('kelex_students.*','kelex_paper_marks.*')
        ->get()->toArray();
        
        if(count($data['result'])==0)
        {
            $data['result']= DB::table('kelex_students_sessions')
            ->leftJoin('kelex_students', 'kelex_students.STUDENT_ID', '=', 'kelex_students_sessions.STUDENT_ID')
            ->where('kelex_students_sessions.CAMPUS_ID', '=', Session::get('CAMPUS_ID'))
            ->where('kelex_students_sessions.SECTION_ID','=',$request->SECTION_ID)
            ->where('kelex_students_sessions.CLASS_ID','=', $request->CLASS_ID)
            ->where('kelex_students_sessions.SESSION_ID','=',$request->SESSION_ID)
            ->select('kelex_students.*')
            ->get()->toArray();
        }
        $data['subjectid']=$request->SUBJECT_ID;
        return response()->json($data);
    }
     public function  Add_marks(Request $request)
     {
        $TOB_MARKS= $request->TOB_MARKS;
        $VOB_MARKS= $request->VOB_MARKS;
        $REMARKS= $request->REMARKS;
        $STUDENT_ID=$request->STUDENT_ID;
        //dd($STUDENT_ID);
        for($i=0;$i<count($STUDENT_ID);$i++)
        {
        $Result= Kelex_paper_mark::updateOrCreate(
          ['PAPER_ID' => $request->PAPER_ID,'STUDENT_ID'=>$STUDENT_ID[$i],'SUBJECT_ID'=>$request->SUBJECT_ID, 'EXAM_ID'=>$request->EXAM_ID],
          ['PAPER_ID' => $request->PAPER_ID,
          'STUDENT_ID'=>$STUDENT_ID[$i],
          'SESSION_ID'=>$request->SESSION_ID,
          'CLASS_ID'=>$request->CLASS_ID,
          'SECTION_ID'=>$request->SECTION_ID,
          'SUBJECT_ID'=>$request->SUBJECT_ID,
          'EXAM_ID'=>$request->EXAM_ID,
          'TOB_MARKS'=>$TOB_MARKS[$i],
          'VOB_MARKS'=>$VOB_MARKS[$i],
          'REMARKS'=>$REMARKS[$i],
          'CAMPUS_ID' => Session::get('CAMPUS_ID'),
          'USER_ID' =>Session::get('EMP_ID'),
      ]);
        }
      //dd($Result);
   return response()->json(true);
         }
  
     }


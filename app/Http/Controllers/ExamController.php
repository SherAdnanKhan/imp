<?php

namespace App\Http\Controllers;

use DateTime;
use DatePeriod;
use KelexClass;
use DateInterval;
use App\Models\Kelex_exam;
use App\Models\Kelex_class;
use Illuminate\Http\Request;
use App\Models\Kelex_subject;
use App\Models\Kelex_exam_paper;
use App\Http\Requests\Kelex_exams;
use App\Models\Kelex_sessionbatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Exam_paperRequest;
use App\Http\Requests\Exam_SearchRequest;
use App\Models\Kelex_employee;

class ExamController extends Controller
{
// Add Exam Controller Function start here

    public function index_exam(Request $request)
    {


        $getexam = Kelex_exam::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        $session = Kelex_sessionbatch::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
      
        return view('Admin.Examination.add_exams')->with(['gexam'=>$getexam,'sessions'=>$session]);

    }
    public function add_exam(Kelex_exams $request)
    {
        $matchdates=0;
        $results= DB::table('Kelex_exams')
        ->where('EXAM_ID','!=', $request->input('EXAM_ID'))
        ->where('SESSION_ID','=', $request->input('SESSION_ID'))
        ->where('Kelex_exams.CAMPUS_ID', '=', Session::get('CAMPUS_ID'))->get()->toArray();
        if(count($results))
    {
        foreach($results as $result){
        $requestdates=$this->twoDatesRange($request->START_DATE, $request->END_DATE);
        if(count($requestdates)==0)
        {
            return response()->json('wrongselect');
        }
        $dates = $this->twoDatesRange($result->START_DATE, $result->END_DATE);
        //dd($dates);
        for($i=0;$i<count($dates);$i++)
        {
            for($j=0;$j<count($requestdates);$j++)
            {
            if($dates[$i]==$requestdates[$j])
            {
            $matchdates+=1;
            }
        }
        }
        }
    }
        if($matchdates==0)
        {
            $exKelex_exam = new Kelex_exam();
            $exKelex_exam->EXAM_NAME=$request->input('EXAM_NAME');
            $exKelex_exam->START_DATE=$request->input('START_DATE');
            $exKelex_exam->END_DATE=$request->input('END_DATE');
            $exKelex_exam->SESSION_ID=$request->input('SESSION_ID');
            $exKelex_exam->CAMPUS_ID= Auth::user()->CAMPUS_ID;
            $exKelex_exam->USER_ID = Auth::user()->id;
            $exKelex_exam->save();
           
          return response()->json(true);
        }
        else
        {
            return response()->json(false);
        }
         

    }
    public function edit_exam(Request $request)
    {

        $currentSB= DB::table('Kelex_exams')->where(['EXAM_ID' => $request->EXAM_ID])
        ->where('Kelex_exams.CAMPUS_ID', '=', Session::get('CAMPUS_ID'))->get();
       echo json_encode($currentSB);

    }

    public function update_exam(Kelex_exams $request)
    {

        $matchdates=0;
        $results= DB::table('Kelex_exams')
        ->where('EXAM_ID','!=', $request->input('EXAM_ID'))
        ->where('SESSION_ID','=', $request->input('SESSION_ID'))
        ->where('Kelex_exams.CAMPUS_ID', '=', Session::get('CAMPUS_ID'))->get()->toArray();
        if(count($results))
    {
        foreach($results as $result){
        $requestdates=$this->twoDatesRange($request->START_DATE, $request->END_DATE);
        if(count($requestdates)==0)
        {
            return response()->json('wrongselect');
        }
        $dates = $this->twoDatesRange($result->START_DATE, $result->END_DATE);
        for($i=0;$i<count($dates);$i++)
        {
            for($j=0;$j<count($requestdates);$j++)
            {
            if($dates[$i]==$requestdates[$j])
            {
            $matchdates+=1;
            }
        }
        }
        }
    }
        if($matchdates==0)
        {
        DB::table('Kelex_exams')
        ->where('EXAM_ID', $request->input('EXAM_ID'))
        ->where('Kelex_exams.CAMPUS_ID', '=', Session::get('CAMPUS_ID'))
        ->update(['EXAM_NAME' => $request->input('EXAM_NAME'),
        'START_DATE' => $request->input('START_DATE'),
        'END_DATE' => $request->input('END_DATE'),
        'SESSION_ID' => $request->input('SESSION_ID')]);
          return response()->json(true);
        }
        else
        {
            return response()->json(false);
        }
    
    }
    public function delete_exam(Request $request)
    {
        $id=$request->input('EXAM_ID');
        DB::table('Kelex_exams')->where('EXAM_ID',$request->input('EXAM_ID'))
        ->where('Kelex_exams.CAMPUS_ID', '=', Session::get('CAMPUS_ID'))->delete();

                 return response()->json($id);
    }
    function twoDatesRange($start, $end, $format = 'Y-m-d')
    {
        $arr = array();
        $interval = new DateInterval('P1D');

        $realEnd = new DateTime($end);
        $realEnd->add($interval);

        $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

        foreach ($period as $date) {
            $arr[] = $date->format($format);
        }

        return $arr;
    }
    public function index_exampaper(Request $request)
    {
        $class= Kelex_class::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        $getexam = Kelex_exam::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        $session = Kelex_sessionbatch::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        $Subject = Kelex_subject::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        $teacher= Kelex_employee::where('EMP_TYPE','1')->where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        return view('Admin.Examination.add_exams_paper')->with(['gexam'=>$getexam,'subjects'=>$Subject,'sessions'=>$session,'classes'=>$class,'teachers'=>$teacher]);

    }
    public function view_exam_paper(Exam_SearchRequest $request){
        $record['record'] =  DB::table('Kelex_exam_papers')
        ->leftJoin('Kelex_exams', 'Kelex_exams.EXAM_ID', '=', 'Kelex_exam_papers.EXAM_ID')
        ->leftJoin('kelex_sections', 'kelex_sections.Section_id', '=', 'Kelex_exam_papers.SECTION_ID')
        ->leftJoin('kelex_classes', 'kelex_classes.Class_id', '=', 'Kelex_exam_papers.CLASS_ID')
        ->leftJoin('kelex_sessionbatches', 'kelex_sessionbatches.SB_ID', '=', 'Kelex_exam_papers.SESSION_ID')
        ->leftJoin('kelex_subjects', 'kelex_subjects.SUBJECT_ID', '=', 'Kelex_exam_papers.SUBJECT_ID')
        ->where('Kelex_exam_papers.SECTION_ID', '=',$request->SECTION_ID)
        ->where('Kelex_exam_papers.CLASS_ID', '=',$request->CLASS_ID)
        ->where('Kelex_exam_papers.SESSION_ID', '=',$request->SESSION_ID)
        ->select('Kelex_exam_papers.*', 'kelex_subjects.SUBJECT_NAME','Kelex_exams.EXAM_NAME',
        'kelex_sections.Section_name','kelex_classes.Class_name','kelex_sessionbatches.SB_NAME')
        ->groupBy('Kelex_exam_papers.DATE')
        ->get()->toArray();
        $record['SECTION_ID']=$request->SECTION_ID;
        $record['CLASS_ID']=$request->CLASS_ID;
        $record['SESSION_ID']=$request->SESSION_ID;
        return response()->json($record);
    }
    public function add_exam_paper(Exam_paperRequest $request){
     
        $matchdates=0;
        $data= DB::table('Kelex_exam_papers')
        ->where('DATE', '=',$request->DATE)
        ->where('CAMPUS_ID', '=', Session::get('CAMPUS_ID'))->get()->toArray();

        if(count($data)>0)
        {
            return response()->json('datematch');
        }

        $results= DB::table('Kelex_exams')
        ->where('EXAM_ID','=', $request->input('EXAM_ID'))
        ->where('Kelex_exams.CAMPUS_ID', '=', Session::get('CAMPUS_ID'))->get()->toArray();
        //dd($results);
        if(count($results))
    {
        foreach($results as $result)
    {
        $dates = $this->twoDatesRange($result->START_DATE, $result->END_DATE);
        for($i=0;$i<count($dates);$i++)
        {
            if($dates[$i]==$request->DATE)
            {
            $matchdates+=1;
            }
        }
    }
    }
        if($matchdates>0)
    {   
        $data= Kelex_exam_paper::create(['EXAM_ID'=>$request->EXAM_ID,'SECTION_ID'=>$request->SECTION_ID,'SUBJECT_ID'=>$request->SUBJECT_ID,'CLASS_ID'=>$request->CLASS_ID,'TIME'=>$request->TIME
        ,'DATE'=>$request->DATE,'TOTAL_MARKS'=>$request->TOTAL_MARKS,'PASSING_MARKS'=>$request->PASSING_MARKS,'VIVA'=>$request->VIVA,'VIVA_MARKS'=>$request->VIVA_MARKS,
        'SESSION_ID'=>$request->SESSION_ID,'CAMPUS_ID'=>Session::get('CAMPUS_ID'),'USER_ID'=>Auth::user()->id]);
        
        return response()->json(true);
     }

     return response()->json(false);


    }
    
    public function edit_exam_paper(Request $request)
    {
        $data= Kelex_exam_paper::where('PAPER_ID',$request->PAPER_ID)->where('CAMPUS_ID',Session::get('CAMPUS_ID'))->first();
        return response()->json($data);
    }
    public function update_exam_paper(Exam_paperRequest $request){
     
        $matchdates=0;
        $data= DB::table('Kelex_exam_papers')
        ->where('PAPER_ID','!=',$request->PAPER_ID)
        ->where('DATE', '=',$request->DATE)
        ->where('CAMPUS_ID', '=', Session::get('CAMPUS_ID'))->get()->toArray();

        if(count($data)>0)
        {
            return response()->json('datematch');
        }

        $results= DB::table('Kelex_exams')
        ->where('EXAM_ID','=', $request->input('EXAM_ID'))
        ->where('Kelex_exams.CAMPUS_ID', '=', Session::get('CAMPUS_ID'))->get()->toArray();
        //dd($results);
        if(count($results))
    {
        foreach($results as $result)
    {
        $dates = $this->twoDatesRange($result->START_DATE, $result->END_DATE);
        for($i=0;$i<count($dates);$i++)
        {
            if($dates[$i]==$request->DATE)
            {
            $matchdates+=1;
            }
        }
    }
    }
        if($matchdates>0)
    {   
        $data= Kelex_exam_paper::Where('PAPER_ID','=',$request->PAPER_ID)->update(['EXAM_ID'=>$request->EXAM_ID,'SECTION_ID'=>$request->SECTION_ID,'SUBJECT_ID'=>$request->SUBJECT_ID,'CLASS_ID'=>$request->CLASS_ID,'TIME'=>$request->TIME
        ,'DATE'=>$request->DATE,'TOTAL_MARKS'=>$request->TOTAL_MARKS,'PASSING_MARKS'=>$request->PASSING_MARKS,'VIVA'=>$request->VIVA,'VIVA_MARKS'=>$request->VIVA_MARKS,
        'SESSION_ID'=>$request->SESSION_ID,'CAMPUS_ID'=>Session::get('CAMPUS_ID'),'USER_ID'=>Auth::user()->id]);
        
        return response()->json(true);
     }

     return response()->json(false);


    }
    public function assign_exam_paper(Request $request)
    {
       
        return response()->json();
    }


}

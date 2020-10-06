<?php

namespace App\Http\Controllers;

use App\Category;

use App\Models\Kelex_class;
use Illuminate\Http\Request;
use App\Models\Kelex_section;
use App\Models\Kelex_subject;
use App\Models\Kelex_sessionbatch;
use Illuminate\Support\Facades\DB;

class AcademicsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //section controller function
    public function index_section(Request $request)
    {
        $data = DB::table('kelex_sections')
        ->leftJoin('kelex_classes', 'kelex_sections.Class_id', '=', 'kelex_classes.Class_id')
        ->select('kelex_sections.*', 'kelex_classes.Class_name')
        ->orderBy('kelex_sections.section_id', 'asc')
        ->get();

        $class= Kelex_class::all(); 

        return view('admin.Academics.add_section')->with(['gsection'=>$data,'classes'=>$class]);
      
    }
    public function add_section(Request $request)
    {
           $section= new Kelex_section();
           $section->Section_name=$request->input('Section_name');
           $section->Class_id=$request->input('Classes_id');
           $section->save();
           $data = DB::table('kelex_sections')
            ->leftJoin('kelex_classes', 'kelex_sections.Class_id', '=', 'kelex_classes.Class_id')
            ->where('kelex_sections.section_id', '=',$section->id )
            ->select('kelex_sections.*', 'kelex_classes.Class_name')
            ->orderBy('kelex_sections.section_id', 'asc')
            ->get();
           
                 return response()->json($data);
            
      
    }
    public function edit_section(Request $request)
    {

        $currentsection= DB::table('kelex_sections')->where(['Section_id' => $request->sectionid])
        ->get();
       echo json_encode($currentsection);
      
    }
    public function update_section(Request $request)
    {
         DB::table('kelex_sections')
        ->where('Section_id', $request->input('sectionid'))
        ->update(['Section_Name' => $request->input('Section_name'),'Class_id' => $request->input('editClass_id')]);
        $data = DB::table('kelex_sections')
        ->leftJoin('kelex_classes', 'kelex_sections.Class_id', '=', 'kelex_classes.Class_id')
        ->where('kelex_sections.section_id', '=',$request->sectionid)
        ->select('kelex_sections.*', 'kelex_classes.Class_name')
        ->orderBy('kelex_sections.section_id', 'asc')
        ->get();
         
        return response()->json($data);
    }
    public function delete_section(Request $request)
    {
        $id=$request->input('sectionid');
        DB::table('kelex_sections')->where('Section_id',$request->input('sectionid'))->delete();
        
                 return response()->json($id);
            }

    //class controller function

    public function index_class(Request $request)
    {
        $getclass = Kelex_class::all();
     
            return view('admin.Academics.add_class')->with('gclass',$getclass);
      
    }
    public function add_class(Request $request)
    {
           $class= new Kelex_class();
           $class->class_name=$request->input('class_name');
           if ($class->save()) {
                 return response()->json($class);
            }
      
    }
    public function edit_class(Request $request)
    {
        
        $currentclass= DB::table('kelex_classes')->where(['class_id' => $request->classid])
        ->get();
       echo json_encode($currentclass);
      
    }
    public function update_class(Request $request)
    {
      
         DB::table('kelex_classes')
        ->where('class_id', $request->input('classid'))
        ->update(['class_Name' => $request->input('class_name')]);

        $classhthis= DB::table('kelex_classes')->where('class_id',$request->input('classid'))
        ->get();
         
        return response()->json($classhthis);
    }
    public function delete_class(Request $request)
    {
        $id=$request->input('classid');
        DB::table('kelex_classes')->where('class_id',$request->input('classid'))->delete();
        
                 return response()->json($id);
    }
      
    #Subject Controller Functions

    public function index_subject(Request $request)
    {
        

        $getsubject = Kelex_subject::all();
     
            return view('admin.Academics.add_subject')->with('gsubject',$getsubject);
      
    }
    public function add_subject(Request $request)
    {
           $subject= new Kelex_subject();
           $subject->SUBJECT_NAME=$request->input('subject_name');
           $subject->SUBJECT_CODE=$request->input('subject_code');
           if ($subject->save()) {
                 return response()->json($subject);
            }
      
    }
    public function edit_subject(Request $request)
    {
        
        $currentclass= DB::table('kelex_subjects')->where(['SUBJECT_ID' => $request->subjectid])
        ->get();
       echo json_encode($currentclass);
      
    }
    public function update_subject(Request $request)
    {
      
         DB::table('kelex_subjects')
        ->where('SUBJECT_ID', $request->input('subject_id'))
        ->update(['SUBJECT_NAME' => $request->input('subject_name'),
        'SUBJECT_CODE' => $request->input('subject_code')
        ]);

        $selectsubject= DB::table('kelex_subjects')->where('SUBJECT_ID',$request->input('subject_id'))
        ->get();
         
        return response()->json($selectsubject);
    }
    public function delete_subject(Request $request)
    {
        $id=$request->input('subjectid');
        DB::table('kelex_subjects')->where('SUBJECT_ID',$request->input('subjectid'))->delete();
        
                 return response()->json($id);
    }

    #Session-batch Controller Functions
    public function index_sessionbatch(Request $request)
    {
        

        $getsession = Kelex_sessionbatch::all();
     
            return view('admin.Academics.add_session-batch')->with('gsession',$getsession);
      
    }
    public function add_sessionbatch(Request $request)
    {
           $sessionbatch = new Kelex_sessionbatch();
           $sessionbatch->SB_NAME=$request->input('sb_name');
           $sessionbatch->START_DATE=$request->input('start_date');
           $sessionbatch->END_DATE=$request->input('end_date');
           $sessionbatch->TYPE=$request->input('type');
           if ($sessionbatch->save()) {
                 return response()->json($sessionbatch);
            }
      
    }
    public function edit_sessionbatch(Request $request)
    {
        
        $currentSB= DB::table('kelex_sessionbatches')->where(['SB_ID' => $request->sessionid])
        ->get();
       echo json_encode($currentSB);
      
    }
    public function update_sessionbatch(Request $request)
    {
      
         DB::table('kelex_sessionbatches')
        ->where('SB_ID', $request->input('sb_id'))
        ->update(['SB_NAME' => $request->input('SB_name'),
        'START_DATE' => $request->input('start_date'),
        'END_DATE' => $request->input('end_date'),
        'TYPE' => $request->input('type')
        ]);

        $selectSB= DB::table('kelex_sessionbatches')->where('SB_ID',$request->input('SB_id'))
        ->get();
         
        return response()->json($selectSB);
    }
    public function delete_sessionbatch(Request $request)
    {
        $id=$request->input('sessionid');
        DB::table('kelex_sessionbatches')->where('SB_ID',$request->input('sessionid'))->delete();
        
                 return response()->json($id);
    }


}


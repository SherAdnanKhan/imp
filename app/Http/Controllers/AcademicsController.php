<?php

namespace App\Http\Controllers;

use App\Category;
use App\Models\Kelex_class;
use Illuminate\Http\Request;
use App\Models\Kelex_section;
use App\Models\Kelex_subject;
use App\Http\Requests\sbnrequest;
use App\Models\Kelex_sessionbatch;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\classrequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\sectionrequest;
use App\Http\Requests\subjectrequest;
use App\Models\Kelex_subjectgroupname;
use App\Http\Requests\session_batchrequest;
use App\Http\Requests\subjectgrouprequest;
use App\Models\Kelex_students_session;
use App\Models\Kelex_subjectgroup;

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
    public function add_section(sectionrequest $request)
    {
        $section= new Kelex_section();
        $section-> Section_name=$request->input('Section_name');
        $section-> Class_id=$request->input('Classes_id');
        $section-> CAMPUS_ID= Auth::user()->CAMPUS_ID;
        $section-> USER_ID = Auth::user()->id;
        $section->save();
      
           $data = DB::table('kelex_sections')
            ->leftJoin('kelex_classes', 'kelex_sections.Class_id', '=', 'kelex_classes.Class_id')
            ->where('kelex_sections.Section_id', '=',$section->Section_id)
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
    public function update_section(sectionrequest $request)
    {
         DB::table('kelex_sections')
        ->where('Section_id', $request->input('sectionid'))
        ->update(['Section_Name' => $request->input('Section_name'),'Class_id' => $request->input('Classes_id')]);
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
        DB::table('kelex_sections')->where('Section_id',$id)->delete();
        
                 return response()->json($id);
            }

    //CLASS CONTROLLER ROUTES

        public function index_class(Request $request)
        {
            $getclass = Kelex_class::all();
            
                return view('admin.Academics.add_class')->with('gclass',$getclass);
            
        }
        public function add_class(classrequest $request)
        {
            
                $class= new Kelex_class();
                $class->class_name=$request->input('class_name');
                $class->CAMPUS_ID= Auth::user()->CAMPUS_ID;
                $class->USER_ID = Auth::user()->id;
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
        public function update_class(classrequest $request)
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
    
    //SUBJECT GROUP NAME controller function

    public function index_sgroup(Request $request)
    {
        $subjectgroup = Kelex_subjectgroupname::all();
     
            return view('admin.Academics.add_groupname')->with('subjectgroup',$subjectgroup);
      
    }
    public function add_sgroup(sbnrequest $request)
    {
        
           $subject_group_name= new Kelex_subjectgroupname();
           $subject_group_name->GROUP_NAME=$request->input('GROUP_NAME');
           $subject_group_name->CAMPUS_ID= Auth::user()->CAMPUS_ID;
           $subject_group_name->USER_ID = Auth::user()->id;
           if ($subject_group_name->save()) {
                 return response()->json($subject_group_name);
            }
      
    }
    public function edit_sgroup(Request $request)
    {
        
        $currentSBG= DB::table('Kelex_subjectgroupnames')->where(['GROUP_ID' => $request->GROUP_ID])
        ->get();
       echo json_encode($currentSBG);
      
    }
    public function update_sgroup(sbnrequest $request)
    {
      
         DB::table('Kelex_subjectgroupnames')
        ->where('GROUP_ID', $request->input('GROUP_ID'))
        ->update(['GROUP_NAME' => $request->input('GROUP_NAME')]);

        $SBNthis= DB::table('Kelex_subjectgroupnames')->where('GROUP_ID',$request->input('GROUP_ID'))
        ->get();
         
        return response()->json($SBNthis);
    }

    #Subject Group Controller Functions

    public function index_subjectgroup(Request $request)
    {
        $class= Kelex_class::all(); 
        $subject= Kelex_subject::all();
        $subjectgroupname= Kelex_subjectgroupname::all();
        $session= Kelex_sessionbatch::all();
        return view('admin.Academics.add_subject_group')->with(['subjects'=>$subject,'subjectgroupnames'=>$subjectgroupname,'classes'=>$class,'sessions'=>$session]);
    }
    public function add_subjectgroup(subjectgrouprequest $request)
    {
        $subject=$request->input('subjectgroup');
        for($i=0;$i<count($subject);$i++){

        }
           $subjectgroup= new Kelex_subjectgroup();
           $subjectgroup->GROUP_ID=$request->input('GROUP_ID');
           $subjectgroup->CLASS_ID=$request->input('CLASS_ID');
           $subjectgroup->SECTION_ID=$request->input('SECTION_ID');
           $subjectgroup->SUBJECT_ID=$subject[$i];
           $subjectgroup->CAMPUS_ID= Auth::user()->CAMPUS_ID;
           $subjectgroup->USER_ID = Auth::user()->id;
           if ($subjectgroup->save()) {
               dd($subjectgroup);
                 return response()->json($subjectgroup);
            }
      
    }
    public function edit_subjectgroup(Request $request)
    {
        
        $currentclass= DB::table('kelex_subjects')->where(['SUBJECT_ID' => $request->subjectid])
        ->get();
       echo json_encode($currentclass);
      
    }
    public function update_subjectgroup(subjectgrouprequest $request)
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
    public function delete_subjectgroup(Request $request)
    {
        $id=$request->input('subjectid');
        DB::table('kelex_subjects')->where('SUBJECT_ID',$request->input('subjectid'))->delete();
        
                 return response()->json($id);
    }

     #Subject Controller Functions

     public function index_subject(Request $request)
     {
         
 
         $getsubject = Kelex_subject::all();
      
             return view('admin.Academics.add_subject')->with('gsubject',$getsubject);
       
     }
     public function add_subject(subjectrequest $request)
     {
            $subject= new Kelex_subject();
            $subject->SUBJECT_NAME=$request->input('subject_name');
            $subject->SUBJECT_CODE=$request->input('subject_code');
            $subject->CAMPUS_ID= Auth::user()->CAMPUS_ID;
            $subject->USER_ID = Auth::user()->id;
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
     public function update_subject(subjectrequest $request)
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
    public function add_sessionbatch(session_batchrequest $request)
    {
           $sessionbatch = new Kelex_sessionbatch();
           $sessionbatch->SB_NAME=$request->input('sb_name');
           $sessionbatch->START_DATE=$request->input('start_date');
           $sessionbatch->END_DATE=$request->input('end_date');
           $sessionbatch->TYPE=$request->input('type');
           $sessionbatch->CAMPUS_ID= Auth::user()->CAMPUS_ID;
           $sessionbatch->USER_ID = Auth::user()->id;
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
    public function update_sessionbatch(session_batchrequest $request)
    {
      
         DB::table('kelex_sessionbatches')
        ->where('SB_ID', $request->input('sb_id'))
        ->update(['SB_NAME' => $request->input('sb_name'),
        'START_DATE' => $request->input('start_date'),
        'END_DATE' => $request->input('end_date'),
        'TYPE' => $request->input('type')
        ]);

        $selectSB= DB::table('kelex_sessionbatches')->where('SB_ID',$request->input('sb_id'))
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


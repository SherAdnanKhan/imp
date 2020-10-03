<?php

namespace App\Http\Controllers;

use App\Category;

use App\Models\Kelex_class;
use App\Models\Kelex_section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AcademicsController extends Controller
{
    //section controller function
    public function index_section(Request $request)
    {
        $getsections = Kelex_class::all();
        $class= Kelex_class::all(); 

        return view('admin.Academics.add_section')->with(['gsection'=>$getsections,'classes'=>$class]);
      
    }
    public function add_section(Request $request)
    {
           $section= new Kelex_section();
           $section->Section_name=$request->input('Section_name');
           if ($section->save()) {
                 return response()->json($section);
            }
      
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
        ->update(['Section_Name' => $request->input('Section_name')]);

        $sectionhthis= DB::table('kelex_sections')->where(['Section_id' => $request->sectionid])
        ->get();
         
        return response()->json($sectionhthis);
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
      
    }


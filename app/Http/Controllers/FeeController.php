<?php

namespace App\Http\Controllers;

use App\Models\Kelex_class;
use Illuminate\Http\Request;
use App\Models\kelex_section;
use App\Models\Kelex_fee_type;
use App\Models\Kelex_fee_category;
use App\Models\Kelex_sessionbatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FeetypeRequest;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\FeeCategoryRequest;

class FeeController extends Controller
{

// FEE CATEROGORY CONTROLLER START HERE
    public function index_feecategory()
    {
        $getfeecat = DB::table('kelex_fee_categories')
                                ->join('kelex_sections', 'kelex_sections.Section_id', '=', 'kelex_fee_categories.SECTION_ID')
                                ->join('kelex_classes', 'kelex_classes.Class_id', '=', 'kelex_fee_categories.CLASS_ID')
                                ->select('kelex_fee_categories.*','kelex_classes.*','kelex_sections.*')
                                ->where('kelex_fee_categories.CAMPUS_ID','=',Session::get('CAMPUS_ID'))
                                ->get()->toArray();
        $class= Kelex_class::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        return view('Admin.FeesManagement.add_feecaterogry')->with(['classes'=>$class,'getfeecat'=>$getfeecat]);

    }
    public function add_feecategory(FeeCategoryRequest $request)
    {
           $feecategory = new Kelex_fee_category();
           $feecategory->CLASS_ID=$request->input('CLASS_ID');
           $feecategory->SECTION_ID=$request->input('SECTION_ID');
           $feecategory->SHIFT=$request->input('SHIFT');
           $feecategory->CATEGORY=$request->input('CATEGORY');
           $feecategory->CAMPUS_ID= Session::get('CAMPUS_ID');
           $feecategory->USER_ID = Auth::user()->id;
           if ($feecategory->save()) {
                 return response()->json($feecategory);
            }

    }

    public function get_fee_categories(Request $request)
    {
        // dd($request->all());
        $getfeecat = DB::table('kelex_fee_categories')
                    ->join('kelex_sections', 'kelex_sections.Section_id', '=', 'kelex_fee_categories.SECTION_ID')
                    ->join('kelex_classes', 'kelex_classes.Class_id', '=', 'kelex_fee_categories.CLASS_ID')
                    ->where('kelex_fee_categories.SECTION_ID','=',$request->section_id)
                    ->where('kelex_fee_categories.CLASS_ID','=',$request->class_id)
                    ->where('kelex_fee_categories.CAMPUS_ID','=',Session::get('CAMPUS_ID'))
                    ->select('FEE_CAT_ID','CATEGORY')
                    ->get()->toArray();
        return  $getfeecat;
    }

    public function edit_feecategory(Request $request)
    {

        $currentFC['record']= DB::table('kelex_fee_categories')->where(['FEE_CAT_ID' => $request->feecatid])
        ->where('CAMPUS_ID','=',Session::get('CAMPUS_ID'))
        ->get();
        $fetchcid= $currentFC['record'][0]->CLASS_ID;
        $fetchsid= $currentFC['record'][0]->SECTION_ID;
        $currentFC['classes']= Kelex_class::all();
        $currentFC['sections']= kelex_section::where('Section_id',$fetchsid)
        ->where('CAMPUS_ID','=',Session::get('CAMPUS_ID'))->
        select('Section_id','Section_name')->first();
       echo json_encode($currentFC);

    }
    public function update_feecategory(FeeCategoryRequest $request)
    {

         DB::table('kelex_fee_categories')
        ->where('FEE_CAT_ID', $request->input('FEE_CAT_ID'))
        ->where('CAMPUS_ID','=',Session::get('CAMPUS_ID'))->
        update(['CLASS_ID' => $request->input('CLASS_ID'),
        'SECTION_ID' => $request->input('SECTION_ID'),
        'SHIFT' => $request->input('SHIFT'),
        'CATEGORY' => $request->input('CATEGORY')
        ]);

        $selectFC= DB::table('kelex_fee_categories')->where('FEE_CAT_ID',$request->input('FEE_CAT_ID'))->
        where('CAMPUS_ID','=',Session::get('CAMPUS_ID'))
        ->get();

        return response()->json($selectFC);
    }
// FEE CATEROGORY CONTROLLER END HERE



// FEE type CONTROLLER START HERE
    public function fee_type()
    {
        $sessions = Kelex_sessionbatch::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        $feecategory = Kelex_fee_category::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        $getfeecat = DB::table('kelex_fee_types')
                                ->join('kelex_sections', 'kelex_sections.Section_id', '=', 'kelex_fee_types.SECTION_ID')
                                ->join('kelex_classes', 'kelex_classes.Class_id', '=', 'kelex_fee_types.CLASS_ID')
                                ->join('kelex_sessionbatches', 'kelex_sessionbatches.SB_ID', '=', 'kelex_fee_types.SESSION_ID')
                                ->join('kelex_fee_categories', 'kelex_fee_categories.FEE_CAT_ID', '=', 'kelex_fee_types.FEE_CAT_ID')
                                ->where('kelex_fee_types.CAMPUS_ID','=',Session::get('CAMPUS_ID'))->
                                select('kelex_fee_categories.CATEGORY','kelex_classes.Class_name','kelex_sections.Section_name',
                                'kelex_sessionbatches.SB_NAME','kelex_fee_types.*')
                                ->get()->toArray();

        $class= Kelex_class::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        $data = ['sessions' => $sessions,'classes'=>$class,'getfeecat'=>$getfeecat,'feecategory'=> $feecategory];
        return view('Admin.FeesManagement.fee_type')->with($data);
    }
    public function get_fee_type($session_id,$class_id,$section_id,$fee_cat_id)
    {
        // dd($session_id);
        $getfeecat = DB::table('kelex_fee_types')
                        ->join('kelex_sessionbatches', 'kelex_sessionbatches.SB_ID', '=', 'kelex_fee_types.SESSION_ID')
                            ->where('kelex_fee_types.CAMPUS_ID','=',Session::get('CAMPUS_ID'))
                            ->where('kelex_fee_types.CLASS_ID','=',$class_id)
                            ->where('kelex_fee_types.SECTION_ID','=',$section_id)
                            ->where('kelex_fee_types.FEE_CAT_ID','=',$fee_cat_id)
                            ->select('kelex_fee_types.*')
                            ->get()
                            ->toArray();
                            return $getfeecat;
    }

   

    public function add_fee_type(FeetypeRequest $request)
    {
        // dd($request->all());
        $result= DB::table('kelex_fee_types')
            ->where('CLASS_ID','=', $request->input('CLASS_ID'))
            ->where('SECTION_ID','=',$request->input('SECTION_ID'))
            ->where('SESSION_ID','=',$request->input('SESSION_ID'))
            ->where('FEE_CAT_ID', $request->input('FEE_CAT_ID'))
            ->where('FEE_TYPE', $request->input('FEE_TYPE'))->
            where('CAMPUS_ID','=',Session::get('CAMPUS_ID'))
            ->select('kelex_fee_types.FEE_CAT_ID')
            ->get()->toArray();
        if(count($result) == 0)
        {
            $data = ['CLASS_ID'=>$request->CLASS_ID,
                    'SESSION_ID'=>$request->SESSION_ID,
                    'SECTION_ID'=>$request->SECTION_ID,
                    'FEE_CAT_ID'=>$request->FEE_CAT_ID,
                    'CAMPUS_ID'=> Session::get('CAMPUS_ID'),
                    'CREATED_BY'=> Auth::user()->id,'SHIFT'=>$request->SHIFT,
                    'FEE_TYPE'=>$request->input('FEE_TYPE')];

        $feetype= Kelex_fee_type::create($data);
        return response()->json();
        }
        else
        {
            return response()->json("Record Already Existed");
        }
    }
    public function edit_fee_type(Request $request)
    {

        $editfeedata= DB::table('kelex_fee_types')->where('FEE_ID', $request->FEE_ID)
        ->where('CAMPUS_ID','=',Session::get('CAMPUS_ID'))
        ->first();
       echo json_encode($editfeedata);

    }
    public function update_subjectgroup(FeetypeRequest $request)
    {
        $result= DB::table('kelex_fee_types')
        ->where('FEE_ID','!=',$request->FEE_ID)
        ->where('CLASS_ID','=', $request->input('CLASS_ID'))
        ->where('SECTION_ID','=',$request->input('SECTION_ID'))
        ->where('SESSION_ID','=',$request->input('SESSION_ID'))
        ->where('FEE_CAT_ID', $request->input('FEE_CAT_ID'))
        ->where('CAMPUS_ID','=',Session::get('CAMPUS_ID'))
        ->select('kelex_fee_types.FEE_ID')
        ->get()->toArray();
        if(count($result) == 0)
        {

            $feetype= Kelex_fee_type::where('FEE_ID', $request->FEE_ID)
            ->where('CAMPUS_ID','=',Session::get('CAMPUS_ID'))->
            update(['CLASS_ID'=>$request->CLASS_ID,'SESSION_ID'=>$request->SESSION_ID,
            'SECTION_ID'=>$request->SECTION_ID,
            'FEE_CAT_ID'=>$request->FEE_CAT_ID,'CAMPUS_ID'=> Session::get('CAMPUS_ID'),
            'UPDATE_BY'=> Auth::user()->id,
            'SHIFT'=>$request->SHIFT,
            'FEE_TYPE'=>$request->FEE_TYPE]);
            return response()->json();
            }
            else
            {
                return response()->json("Another Record Already Existed");
            }
    }

    public function add_fee_structure(Request $request)
    {
        // dd
    }

    public function fee_structure()
    {
        $sessions = Kelex_sessionbatch::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        $feecategory = Kelex_fee_category::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        $getfeeStructure = DB::table('kelex_fee_types')
                                ->join('kelex_sections', 'kelex_sections.Section_id', '=', 'kelex_fee_types.SECTION_ID')
                                ->join('kelex_classes', 'kelex_classes.Class_id', '=', 'kelex_fee_types.CLASS_ID')
                                ->join('kelex_sessionbatches', 'kelex_sessionbatches.SB_ID', '=', 'kelex_fee_types.SESSION_ID')
                                ->join('kelex_fee_categories', 'kelex_fee_categories.FEE_CAT_ID', '=', 'kelex_fee_types.FEE_CAT_ID')
                                ->where('kelex_fee_types.CAMPUS_ID', '=',Session::get('CAMPUS_ID'))
                                ->select('kelex_fee_categories.CATEGORY','kelex_classes.Class_name','kelex_sections.Section_name',
                                'kelex_sessionbatches.SB_NAME','kelex_fee_types.*')
                                ->get()->toArray();


        $class= Kelex_class::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        // dd($getfeecat);
          $data = ['sessions' => $sessions,'classes'=>$class, 'getfeeStructure'=> $getfeeStructure,'feecategory'=> $feecategory];
        return view('Admin.FeesManagement.fee_structure')->with($data);
    }

}

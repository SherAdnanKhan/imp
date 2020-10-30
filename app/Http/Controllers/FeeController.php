<?php

namespace App\Http\Controllers;

use App\Models\Kelex_class;
use Illuminate\Http\Request;
use App\Models\kelex_section;
use App\Models\Kelex_fee_type;
use App\Models\Kelex_fee_category;
use App\Models\Kelex_sessionbatch;
use App\Models\KelexFee_structure;
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
                                ->get()->toArray();
        $class= Kelex_class::all();
        return view('Admin.FeesManagement.add_feecaterogry')->with(['classes'=>$class,'getfeecat'=>$getfeecat]);

    }
    public function add_feecategory(FeeCategoryRequest $request)
    {
           $feecategory = new Kelex_fee_category();
           $feecategory->CLASS_ID=$request->input('CLASS_ID');
           $feecategory->SECTION_ID=$request->input('SECTION_ID');
           $feecategory->SHIFT=$request->input('SHIFT');
           $feecategory->CATEGORY=$request->input('CATEGORY');
           $feecategory->CAMPUS_ID= Auth::user()->CAMPUS_ID;
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
                    ->where('kelex_fee_categories.CAMPUS_ID','=',Auth::user()->CAMPUS_ID)
                    ->select('FEE_CAT_ID','CATEGORY')
                    ->get()->toArray();
        return  $getfeecat;
    }

    public function edit_feecategory(Request $request)
    {

        $currentFC['record']= DB::table('kelex_fee_categories')->where(['FEE_CAT_ID' => $request->feecatid])
        ->get();
        $fetchcid= $currentFC['record'][0]->CLASS_ID;
        $fetchsid= $currentFC['record'][0]->SECTION_ID;
        $currentFC['classes']= Kelex_class::all();
        $currentFC['sections']= kelex_section::where('Section_id',$fetchsid)->
        select('Section_id','Section_name')->first();
       echo json_encode($currentFC);

    }
    public function update_feecategory(FeeCategoryRequest $request)
    {

         DB::table('kelex_fee_categories')
        ->where('FEE_CAT_ID', $request->input('FEE_CAT_ID'))
        ->update(['CLASS_ID' => $request->input('CLASS_ID'),
        'SECTION_ID' => $request->input('SECTION_ID'),
        'SHIFT' => $request->input('SHIFT'),
        'CATEGORY' => $request->input('CATEGORY')
        ]);

        $selectFC= DB::table('kelex_fee_categories')->where('FEE_CAT_ID',$request->input('FEE_CAT_ID'))
        ->get();

        return response()->json($selectFC);
    }
// FEE CATEROGORY CONTROLLER END HERE



// FEE type CONTROLLER START HERE
    public function fee_type()
    {
        $sessions = Kelex_sessionbatch::all();
        $feecategory = Kelex_fee_category::all()->where('CAMPUS_ID',Auth::user()->CAMPUS_ID);
        $getfeecat = DB::table('kelex_fee_types')
                                ->join('kelex_sections', 'kelex_sections.Section_id', '=', 'kelex_fee_types.SECTION_ID')
                                ->join('kelex_classes', 'kelex_classes.Class_id', '=', 'kelex_fee_types.CLASS_ID')
                                ->join('kelex_sessionbatches', 'kelex_sessionbatches.SB_ID', '=', 'kelex_fee_types.SESSION_ID')
                                ->join('kelex_fee_categories', 'kelex_fee_categories.FEE_CAT_ID', '=', 'kelex_fee_types.FEE_CAT_ID')
                                ->select('kelex_fee_categories.CATEGORY','kelex_classes.Class_name','kelex_sections.Section_name',
                                'kelex_sessionbatches.SB_NAME','kelex_fee_types.*')
                                ->get()->toArray();

        $class= Kelex_class::all();
        $data = ['sessions' => $sessions,'classes'=>$class,'getfeecat'=>$getfeecat,'feecategory'=> $feecategory];
        return view('Admin.FeesManagement.fee_type')->with($data);
    }
    public function get_fee_type($session_id,$class_id,$section_id,$fee_cat_id)
    {
        // dd($session_id);
        $getfeecat = DB::table('kelex_fee_types')
                        ->join('kelex_sessionbatches', 'kelex_sessionbatches.SB_ID', '=', 'kelex_fee_types.SESSION_ID')
                            ->where('kelex_fee_types.CAMPUS_ID','=',Auth::user()->CAMPUS_ID)
                            ->where('kelex_fee_types.CLASS_ID','=',$class_id)
                            ->where('kelex_fee_types.SECTION_ID','=',$section_id)
                            ->where('kelex_fee_types.FEE_CAT_ID','=',$fee_cat_id)
                            ->select('kelex_fee_types.*')
                            ->get()
                            ->toArray();
                            return $getfeecat;
    }

    public function add_fee_structure(Request $request)
    {
        // dd
    }


    public function add_fee_type(FeetypeRequest $request)
    {
        // dd($request->all());
        $result= DB::table('kelex_fee_types')
            ->where('CLASS_ID','=', $request->input('CLASS_ID'))
            ->where('SECTION_ID','=',$request->input('SECTION_ID'))
            ->where('SESSION_ID','=',$request->input('SESSION_ID'))
            ->where('FEE_CAT_ID', $request->input('FEE_CAT_ID'))
            ->where('FEE_TYPE', $request->input('FEE_TYPE'))
            ->select('kelex_fee_types.FEE_CAT_ID')
            ->get()->toArray();
        if(count($result) == 0)
        {
            $data = ['CLASS_ID'=>$request->CLASS_ID,
                    'SESSION_ID'=>$request->SESSION_ID,
                    'SECTION_ID'=>$request->SECTION_ID,
                    'FEE_CAT_ID'=>$request->FEE_CAT_ID,
                    'CAMPUS_ID'=> Auth::user()->CAMPUS_ID,
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
        ->select('kelex_fee_types.FEE_ID')
        ->get()->toArray();
        if(count($result) == 0)
        {

            $feetype= Kelex_fee_type::where('FEE_ID', $request->FEE_ID)->
            update(['CLASS_ID'=>$request->CLASS_ID,'SESSION_ID'=>$request->SESSION_ID,
            'SECTION_ID'=>$request->SECTION_ID,
            'FEE_CAT_ID'=>$request->FEE_CAT_ID,'CAMPUS_ID'=> Auth::user()->CAMPUS_ID,
            'UPDATE_BY'=> Auth::user()->id,
            'SHIFT'=>$request->SHIFT,
            'FEE_AMOUNT'=>$request->FEE_AMOUNT]);
            return response()->json();
            }
            else
            {
                return response()->json("Another Record Already Existed");
            }
    }

    public function fee_structure()
    {
        $sessions = Kelex_sessionbatch::all()->where('CAMPUS_ID',Auth::user()->CAMPUS_ID);
        $feecategory = Kelex_fee_category::all()->where('CAMPUS_ID',Auth::user()->CAMPUS_ID);
        $getfeeStructure = DB::table('kelex_fee_types')
                                ->join('kelex_sections', 'kelex_sections.Section_id', '=', 'kelex_fee_types.SECTION_ID')
                                ->join('kelex_classes', 'kelex_classes.Class_id', '=', 'kelex_fee_types.CLASS_ID')
                                ->join('kelex_sessionbatches', 'kelex_sessionbatches.SB_ID', '=', 'kelex_fee_types.SESSION_ID')
                                ->join('kelex_fee_categories', 'kelex_fee_categories.FEE_CAT_ID', '=', 'kelex_fee_types.FEE_CAT_ID')
                                ->where('kelex_sessionbatches.CAMPUS_ID', '=',Auth::user()->CAMPUS_ID)
                                ->select('kelex_fee_categories.CATEGORY','kelex_classes.Class_name','kelex_sections.Section_name',
                                'kelex_sessionbatches.SB_NAME','kelex_fee_types.*')
                                ->get()->toArray();


        $class= Kelex_class::all()->where('CAMPUS_ID',Auth::user()->CAMPUS_ID);;
        // dd($getfeecat);
          $data = ['sessions' => $sessions,'classes'=>$class, 'getfeeStructure'=> $getfeeStructure,'feecategory'=> $feecategory];
        return view('Admin.FeesManagement.fee_structure')->with($data);
    }

    public function fee_define_new($session_id = null)
    {

        $fee_cat = Kelex_fee_category::all()->where('CAMPUS_ID', Auth::user()->CAMPUS_ID);
        $sessions = Kelex_sessionbatch::all()->where('CAMPUS_ID', Auth::user()->CAMPUS_ID);
        $record = DB::table('kelex_sections')
        ->join('kelex_classes', 'kelex_classes.Class_id', '=', 'kelex_sections.Class_id')
        ->LeftJoin('kelex_fee_structures', 'kelex_fee_structures.SECTION_ID', '=', 'kelex_sections.Section_id')
        ->where('kelex_sections.CAMPUS_ID', '=', Auth::user()->CAMPUS_ID)
        ->select(
            'kelex_classes.Class_name',
            'kelex_classes.Class_id',
            'kelex_sections.Section_name',
            'kelex_sections.Section_id',
            'kelex_fee_structures.*'
        )
        ->get()->toArray();
        $data = ['sessions' => $sessions,  'record' => $record,'fee_cat' => $fee_cat,'sessionID' => $record[0]->SESSION_ID];
        // $data = json_decode(json_encode($data,true));
        return view('Admin.FeesManagement.fee_define_new')->with($data);
    }

    public function apply_fee_structure(Request $request)
    {
        $session_id = $request->SESSION_ID;
        $record = $request->record; //dd($record);

       foreach ($record as $key => $value) {
            $ammount_array = [];
        if(!empty($value['cat_amount']) OR $value['cat_amount'] != null):
            for ($i=0; $i < count($value['cat_amount']); $i++) {
              array_push($ammount_array,[$value['cat_id'][$i] => $value['cat_amount'][$i] ]);
            }

        endif;
         $data = [
             'SESSION_ID' => $session_id,
             'CAMPUS_ID' => Auth::user()->CAMPUS_ID,
             'USER_ID' => Auth::user()->id,
             'CLASS_ID' => $value['class_id'],
             'SECTION_ID' => $value['section_id'],
             'FEE_CATEGORY_ID' => isset($value['cat_id']) ? json_encode($value['cat_id']) : null ,
             'CATEGORY_AMOUNT' => json_encode($ammount_array)
         ];
         if($value['fee_structure_id'] == null OR $value['fee_structure_id'] == ""):
             KelexFee_structure::create($data);
         else:
             KelexFee_structure::where('FEE_STRUCTURE_ID',$value['fee_structure_id'])->update($data);
         endif;
         unset($ammount_array);
       }
       return array('type' => 1,'response' => 'Fee Structure record Saved Successfully.');
    }

}

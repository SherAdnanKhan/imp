<?php

namespace App\Http\Controllers;

use KelexClass;
use App\Models\Kelex_class;
use App\Models\Kelex_month;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\kelex_section;
use App\Models\Kelex_fee_type;
use App\Models\Kelex_fee_category;
use App\Models\Kelex_sessionbatch;
use App\Models\KelexFee_structure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FeetypeRequest;
use App\Models\Kelex_students_session;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\FeeCategoryRequest;
use App\Models\Kelex_fee;
use App\Models\Kelex_student_fee;

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

    public function fee_define_new($session_id = null)
    {

        $fee_cat = Kelex_fee_category::all()->where('CAMPUS_ID', Auth::user()->CAMPUS_ID);
        $sessions = Kelex_sessionbatch::all()->where('CAMPUS_ID', Auth::user()->CAMPUS_ID);
        $record = DB::table('kelex_sections')
        ->join('kelex_classes', 'kelex_classes.Class_id', '=', 'kelex_sections.Class_id')
        ->LeftJoin('kelex_fee_structures', 'kelex_fee_structures.SECTION_ID', '=', 'kelex_sections.Section_id')
        ->leftJoin('kelex_sessionbatches', 'kelex_sessionbatches.SB_ID', '=', 'kelex_fee_structures.SESSION_ID')
        ->where('kelex_sections.CAMPUS_ID', '=', Auth::user()->CAMPUS_ID)
        ->select(
            'kelex_classes.Class_name',
            'kelex_classes.Class_id',
            'kelex_sections.Section_name',
            'kelex_sections.Section_id',
            'kelex_fee_structures.*'
        )
        ->get()->toArray();
        // dd($record);
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
        if(isset($value['cat_amount']) AND !empty($value['cat_amount']) OR $value['cat_amount'] != null):
            for ($i=0; $i < count($value['cat_amount']); $i++) {
              $ammount_array[][$value['cat_id'][$i]] = $value['cat_amount'][$i] ;
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

    public function apply_fee()
    {
        $sessions = Kelex_sessionbatch::all()->where('CAMPUS_ID', Auth::user()->CAMPUS_ID);
        $classes = Kelex_class::all()->where('CAMPUS_ID', Auth::user()->CAMPUS_ID);
        $months = Kelex_month::where('CAMPUS_ID', Auth::user()->CAMPUS_ID)->orderBy('NUMBER','ASC')->get(); //print_r($months); die;
        $months = json_decode(json_encode($months,true));
        $months = array_chunk($months,6);
        $data = ['sessions' => $sessions,  'classes' => $classes,'months'=>$months];
        return view('Admin.FeesManagement.apply_fee_view')->with($data);

    }
    public function get_section_fee_category($session_id,$class_id,$section_id)
    {
        $record = KelexFee_structure::select('CATEGORY_AMOUNT','FEE_CATEGORY_ID')->where(['CAMPUS_ID'=> Auth::user()->CAMPUS_ID,'SECTION_ID' => $section_id])->first();
        $cat_ids = json_decode($record->FEE_CATEGORY_ID,true);// dd($cat_ids);
        $category = Kelex_fee_category::whereIn('FEE_CAT_ID',$cat_ids)->select('CATEGORY')->get();
        $checkWhere = ['CAMPUS_ID' => Auth::user()->CAMPUS_ID,'SESSION_ID'=> $session_id,'CLASS_ID' => $class_id, 'section_id' => $section_id];
        $check_record = Kelex_fee::where($checkWhere)->select('FEE_ID','FEE_DATA','MONTHS')->get();
        $old_record = [];
        // dd($check_record);
        if(count($check_record) > 0 ):
            $check_record = json_decode(json_encode($check_record, true));
            $old_record['fee_id'] = $check_record[0]->FEE_ID;
            $old_record['months'] = json_decode($check_record[0]->MONTHS);
            $old_record['feedata'] = json_decode($check_record[0]->FEE_DATA);
        endif;
        $data['check_record'] = $old_record;
        $data['FEE_AMOUNT'] = json_decode($record->CATEGORY_AMOUNT, true); //dd($old_record);
        $data['category'] = json_decode(json_encode($category,true));
        $data['category'] = array_column($data['category'],'CATEGORY');
        return $data;

    }
    public function apply_fee_on_sections(Request $request)
    {
        $section_id = $request->section_id; //dd($request->all());
        $class_id = $request->class_id;
        $session_id = $request->session_id;
        $fee_category = $request->category;
        $months = $request->months;
        $due_date = $request->due_date;
        $where = ['SESSION_ID' => $session_id, 'CLASS_ID' => $class_id, 'SECTION_ID' => $section_id];
        $student_ids = Kelex_students_session::where($where)
                            ->select('STUDENT_ID')
                            ->get();
        $student_ids = json_decode(json_encode($student_ids,true));
        $student_ids = array_column($student_ids,'STUDENT_ID');
        $fee_structure = KelexFee_structure::where($where)->select('FEE_CATEGORY_ID','CATEGORY_AMOUNT')->get();
        $fee_structure = json_decode(json_encode($fee_structure,true));
        // $fee_cat_ids_from_structure = json_decode(array_column($fee_structure, "FEE_CATEGORY_ID")[0]);
        $fee_cat_amount_from_structure = json_decode(array_column($fee_structure, "CATEGORY_AMOUNT")[0],true);
        $fee_structure_data = [];
        $fee_detail_array = [];
        foreach($fee_cat_amount_from_structure as $key => $value):
            foreach($value as $k => $val):
                $fee_structure_data[$k] = $val;
            endforeach;
        endforeach;
        foreach($fee_category as $key => $value):
            array_push($fee_detail_array,['FEE_CATEGORY_ID' => $value, 'FEE_CATEGORY_AMOUNT'=> $fee_structure_data[$value] ]);
        endforeach;
        $fee_data = [
            'CAMPUS_ID' => Auth::user()->CAMPUS_ID,
            'USER_ID' => Auth::user()->id,
            // 'STUDENT_ID' => $student_ids[$i],
            'SESSION_ID' => $session_id,
            'CLASS_ID' => $class_id,
            'SECTION_ID' => $section_id,
            'MONTHS' => json_encode($months),
            'FEE_DATA' => json_encode($fee_detail_array),
            'FEE_AMOUNT' => array_sum(array_column($fee_detail_array, 'FEE_CATEGORY_AMOUNT')),
            'DUE_DATE' => $due_date,
        ];
         Kelex_fee::create($fee_data);
         $fee_id  = Kelex_fee::orderBy('FEE_ID', 'DESC')->first()->FEE_ID; //dd($student_ids);
        for($i = 0; $i<count($student_ids);$i++):
            $student_fee = [
                'FEE_ID' => $fee_id,
                'STUDENT_ID' => $student_ids[$i],
                'STATUS' => '0',
            ];
            // echo "<pre>";print_r($student_fee);
            Kelex_student_fee::create($student_fee);
        endfor;
        return ['type' =>1,'response' => 'Fee Applied Successfully..'];
        // dd($data);
    }

    public function fee_voucher()
    {
        $sessions = Kelex_sessionbatch::all()->where('CAMPUS_ID', Auth::user()->CAMPUS_ID);
        $classes = Kelex_class::all()->where('CAMPUS_ID', Auth::user()->CAMPUS_ID);

        $data = ['sessions' => $sessions,  'classes' => $classes];
        return view('Admin.FeesManagement.print_fee_voucher')->with($data);
    }
    public function get_section_fee($session_id,$class_id,$section_id)
    {
        $record = Kelex_fee::where(['STATUS' => '0','SESSION_ID' =>$session_id,'CLASS_ID' => $class_id,'SECTION_id'=> $section_id,'CAMPUS_ID' => Auth::user()->CAMPUS_ID])
                            ->select('FEE_DATA','MONTHS')
                            ->get();
        $record = json_decode(json_encode($record,true));
        if(empty($record)):
            return redirect()->route('fee-voucher')->with('msg', 'No Fee Record Found for required Selections');
            die;
        endif;
        $fee_data_months_arr = [];
        $fee_data = [];
        $complete_fee_details = [];
        foreach($record as $key => $value):
            $fee_data[] = $value->FEE_DATA;
            $fee_data_months_arr[] =  json_decode($value->MONTHS);
        endforeach;
        $months = DB::table('kelex_months')
                                ->whereIn('NUMBER',$fee_data_months_arr[0])
                                ->orderBy('NUMBER','ASC')
                                ->pluck('MONTH');
        $fee_details = [];
        foreach($fee_data as $key => $val):
            $fee_details[] = json_decode($val);
            // print_r(json_decode($val) );
        endforeach;
        $i = 0;
        foreach($fee_details as $k => $v):
            foreach($v as  $n => $m):
                $fee_category = Kelex_fee_category::select('CATEGORY')
                                                            ->where(['FEE_CAT_ID' => $m->FEE_CATEGORY_ID])
                                                            ->get()[0]->CATEGORY;
                $complete_fee_details[$i]['fee_category'] = $fee_category;
                $complete_fee_details[$i]['fee_amount'] = $m->FEE_CATEGORY_AMOUNT;
                $i++;
            endforeach;
        endforeach;
        $std_record = DB::table('kelex_student_fees')
                            ->join('kelex_fees','kelex_fees.FEE_ID','=', 'kelex_student_fees.FEE_ID')
                            ->join('kelex_students', 'kelex_students.STUDENT_ID', '=', 'kelex_student_fees.STUDENT_ID')
                            // ->join('kelex_students_sessions', 'kelex_students_sessions.SESSION_ID', '=', 'kelex_fees.SESSION_ID') //temporary off
                            ->join('kelex_classes', 'kelex_classes.Class_id', '=', 'kelex_fees.CLASS_ID')
                            ->join('kelex_sections', 'kelex_sections.Section_id', '=', 'kelex_fees.SECTION_ID')
                            ->get();
        $std_record = json_decode(json_encode($std_record),true);
        // echo "<pre>";print_r($std_record);
        for ($i=0;$i<count($std_record); $i++):
            // print_r($std_record[$i]);
            $std_record[$i]['student_fee_months'] = $months;
            $std_record[$i]['student_fees'] = $complete_fee_details;
        endfor;
        // echo "<pre>";print_r($std_record); die;
        return view('Admin.FeesManagement.print_fee_slip')->with(['record' => $std_record]);

    }

}

<?php

namespace App\Http\Controllers;

use Excel;
use Carbon\Carbon;
use App\Models\Kelex_class;
use Illuminate\Http\Request;
use App\Models\kelex_section;
use App\Models\Kelex_student;
use App\Models\Kelex_fee_discount;
use App\Models\Kelex_sessionbatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\studentrequest;
use Illuminate\Support\Facades\Crypt;
use App\Models\Kelex_students_session;
use App\Http\Requests\CsvImportRequest;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Response;
use Illuminate\Contracts\Encryption\DecryptException;

class StudentController extends Controller
{


    public function index_student()
    {
        $class= Kelex_class::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        $session= Kelex_sessionbatch::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        return view("Admin.Students.addstudent")->with(['classes'=>$class,'sessions'=>$session]);
    }
    public function getImport()
    {
        $class= Kelex_class::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        $session= Kelex_sessionbatch::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        return view("Admin.Students.import")->with(['classes'=>$class,'sessions'=>$session]);
    }

    public function processImport(CsvImportRequest $request)
    {
        $count=0;
        $success=true;
        // try {

    $row = $this->csvToArray($request->csv_file);
    // dd($row);
    $image = $request->file('IMAGE');
    $my_image =null;
    if(!empty($image)):

        $my_image = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload'), $my_image);
    endif;

            $regno=0;
                $date=0;
            for ($i = 0; $i < count($row); $i ++)
            {
                $regno= DB::table('kelex_students')
                ->where('CAMPUS_ID',Auth::user()->CAMPUS_ID)
                ->select('REG_NO')
                ->latest('created_at')
                ->first();
                $rollno= DB::table('kelex_students_sessions')
                ->where('CAMPUS_ID',Auth::user()->CAMPUS_ID)
                ->select('ROLL_NO')
                ->latest('created_at')
                ->first();

                $myDate =  date("Y/n/j",strtotime(str_replace('/','-',$row[$i]["DOB"])));

                $regno = ( $regno == NULL) ? 1 : $regno->REG_NO+1;
                $rollno = ( $rollno == NULL) ? 1 : $rollno->ROLL_NO+1;
                $recent_entry_student=   Kelex_student::create([
                    "NAME" => $row[$i]["NAME"], "FATHER_NAME" => $row[$i]["FATHER_NAME"],
                    "FATHER_CONTACT" => $row[$i]["FATHER_CONTACT"],"SECONDARY_CONTACT"  => $row[$i]["SECONDARY_CONTACT"],
                    "GENDER" => $row[$i]["GENDER"],"DOB"  => Carbon::parse($myDate)->format('Y-m-d'),
                    "RELIGION" => $row[$i]["RELIGION"],
                    "SHIFT" => $row[$i]["SHIFT"],
                    "PRESENT_ADDRESS"  => $row[$i]["PRESENT_ADDRESS"],"PERMANENT_ADDRESS" => $row[$i]["PERMANENT_ADDRESS"],
                    "STD_PASSWORD" => Hash::make('123456'),
                    'REG_NO'=> $regno,'CAMPUS_ID'=> Auth::user()->CAMPUS_ID,'USER_ID'=>Auth::user()->id
                ]);

                $studentid= $recent_entry_student->STUDENT_ID;
                Kelex_students_session::Create([
                    'SESSION_ID'=>$request->SESSION_ID,
                    'CLASS_ID'=>$request->CLASS_ID,
                    'IS_ACTIVE'=>'1',
                    'SECTION_ID'=>$request->SECTION_ID,
                    'STUDENT_ID'=>$studentid,
                    'ROLL_NO'=> $rollno,
                    'CAMPUS_ID'=>Auth::user()->CAMPUS_ID,
                    'USER_ID'=> Auth::user()->id
                 ]);
                 $count++;

            }
        // }
        // catch (\Exception $e) {
        //     $success=false;
        // }

        return response()->json(array('status' => $success,'totalstudents'=>$count,'url'=>url('/showstudent')));
    }


    public function getDownload()
{
    //PDF file is stored under project/public/download/info.pdf
    $file= public_path(). "/kelex_students.csv";

    $headers = array(
              'Content-Type: application/csv',
            );

    return Response::download($file, 'SampleStudent.csv', $headers);
}

    public function add_student(studentrequest $request)
    {
        // dd($request->all());


        $image = $request->file('IMAGE');
        $my_image =null;
        if(!empty($image)):
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload'), $my_image);
        endif;
        // $regno = 0;
        $regno= DB::table('kelex_students')
        ->where('CAMPUS_ID',Auth::user()->CAMPUS_ID)
        ->select('REG_NO')
        ->latest('created_at')
        ->first();
        // dd($regno['']);
        $rollno= DB::table('kelex_students_sessions')
        ->where('CAMPUS_ID',Auth::user()->CAMPUS_ID)
        ->select('ROLL_NO')
        ->latest('created_at')
        ->first();
        $regno = ( $regno == NULL) ? 1 : $regno->REG_NO+1;
        $rollno = ( $rollno == NULL) ? 1 : $rollno->ROLL_NO+1;
        // dd($regno);
        $recent_entry_student= Kelex_student::create([
            'NAME' => $request->NAME,
            'FATHER_NAME' => $request->FATHER_NAME,
            'FATHER_CONTACT' => $request->FATHER_CONTACT,
            'SECONDARY_CONTACT' => $request->SECONDARY_CONTACT,
            'GENDER' => $request->GENDER,
            'DOB' => $request->DOB,
            'CNIC' => $request->CNIC,
            'RELIGION' => $request->RELIGION,
            'FATHER_CNIC' => $request->FATHER_CNIC,
            'SHIFT' => $request->SHIFT,
            'PRESENT_ADDRESS' => $request->PRESENT_ADDRESS,
            'PERMANENT_ADDRESS' => $request->PERMANENT_ADDRESS,
             'GUARDIAN' => $request->GUARDIAN,
             'GUARDIAN_CNIC' => $request->GUARDIAN_CNIC,
             'IMAGE' => $my_image,
             'STD_PASSWORD'=> Hash::make("123456"),
              'PREV_CLASS' => $request->PREV_CLASS,
              'SLC_NO' => $request->SLC_NO,
             'PREV_CLASS_MARKS' => $request->PREV_CLASS_MARKS,
             'PREV_BOARD_UNI' => $request->PREV_BOARD_UNI,
             'PASSING_YEAR' => $request->PASSING_YEAR,
             'CAMPUS_ID' => Auth::user()->CAMPUS_ID,
             'REG_NO'=> $regno,
              'USER_ID' => Auth::user()->id,
        ]);
        $studentid= $recent_entry_student->STUDENT_ID;
        Kelex_students_session::Create([
            'SESSION_ID'=>$request->SESSION_ID,
            'CLASS_ID'=>$request->CLASS_ID,
            'IS_ACTIVE'=>'1',
            'SECTION_ID'=>$request->SECTION_ID,
            'STUDENT_ID'=>$studentid,
            'ROLL_NO'=> $rollno,
            'CAMPUS_ID'=>Auth::user()->CAMPUS_ID,
            'USER_ID'=> Auth::user()->id
         ]);
        if (!empty($request->fee_discount)) :

            foreach ($request->fee_discount as $key => $val) :
                Kelex_fee_discount::create([
                    'STUDENT_ID' => $studentid,
                    'FEE_CAT_ID' => $key,
                    'DISCOUNT' => $val,
                    'CAMPUS_ID' => Auth::user()->CAMPUS_ID,
                    'USER_ID' => Auth::user()->id,
                ]);
            endforeach;
        endif;



        $msg='Student Record inserted successfully';
        return response()->json($msg);
    }
    public function showstudent()
    {

    $student= Kelex_student::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();


    return view('Admin.Students.view')->with('students',$student);
    }

    public function getstudentdata($id){
        list($data,$class,$section,$session,$std_session_data,$fee_discount) =  $this->getstudentdetails($id);
        $record = (['student'=>$data,'fee_discount' => $fee_discount,'classes'=>$class,'sessions'=>$session,'sections'=>$section,'std_session_data'=>$std_session_data]);
        // dd($record);
        return view('Admin.Students.editstudent')->with($record);

    }
    public function get_student_data_for_id_card($id){
        list($data,$class,$section,$session,$std_session_data)=  $this->getstudentdetails($id);
        $classid= $std_session_data['CLASS_ID'];
        $selectedclass= Kelex_class::where('Class_id',$classid)
        ->where('CAMPUS_ID', Session::get('CAMPUS_ID'))->first();
        $sessionid= $std_session_data['SESSION_ID'];
        $selectedsession= Kelex_sessionbatch::where('SB_ID',$sessionid)
        ->where('CAMPUS_ID', Session::get('CAMPUS_ID'))->first();

        return view('Admin.Students.student_id_card')->with(['student'=>$data,'classes'=>$selectedclass,'sessions'=>$sessionid,'sections'=>$section]);

    }
    public function update_student(studentrequest $request)
    {

        // dd($request->all());
        $image = $request->file('IMAGE');
        $img=Kelex_student::where('STUDENT_ID',$request->STUDENT_ID)
                                ->where('CAMPUS_ID', Session::get('CAMPUS_ID'))->first();
        $my_image =$img['IMAGE'];
        if(!empty($image)):

            $image_path =public_path()."/upload/".$my_image;  // Value is not URL but directory file path

            if(File::exists($image_path)) {
                    File::delete($image_path);
            }

            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload'), $my_image);

        endif;
        $where = [
            'NAME' => $request->NAME,
            'FATHER_NAME' => $request->FATHER_NAME,
            'FATHER_CONTACT' => $request->FATHER_CONTACT,
            'SECONDARY_CONTACT' => $request->SECONDARY_CONTACT,
            'GENDER' => $request->GENDER,
            'DOB' => $request->DOB,
            'CNIC' => $request->CNIC,
            'RELIGION' => $request->RELIGION,
            'FATHER_CNIC' => $request->FATHER_CNIC,
            'SHIFT' => $request->SHIFT,
            'PRESENT_ADDRESS' => $request->PRESENT_ADDRESS,
            'PERMANENT_ADDRESS' => $request->PERMANENT_ADDRESS,
            'GUARDIAN' => $request->GUARDIAN,
            'GUARDIAN_CNIC' => $request->GUARDIAN_CNIC,
            'IMAGE' => $my_image,
            'PREV_CLASS' => $request->PREV_CLASS,
            'SLC_NO' => $request->SLC_NO,
            'PREV_CLASS_MARKS' => $request->PREV_CLASS_MARKS,
            'PREV_BOARD_UNI' => $request->PREV_BOARD_UNI,
            'PASSING_YEAR' => $request->PASSING_YEAR,
            'CAMPUS_ID' => '1',
            'USER_ID' => '1',
        ];
        dd($where);
        Kelex_student::where('STUDENT_ID',$request->STUDENT_ID)
        ->where('CAMPUS_ID', Session::get('CAMPUS_ID'))
          ->update($where);
        Kelex_students_session::where('STUDENT_ID',$request->STUDENT_ID)->
        where('CAMPUS_ID', Session::get('CAMPUS_ID'))->
        update(['SESSION_ID'=>$request->SESSION_ID,'CLASS_ID'=>$request->CLASS_ID,
        'IS_ACTIVE'=>'1','SECTION_ID'=>$request->SECTION_ID]);
        if(!empty($request->fee_discount)):
            Kelex_fee_discount::where('STUDENT_ID', $request->STUDENT_ID)->delete();
            foreach ($request->fee_discount as $key => $val) :
                Kelex_fee_discount::create([
                    'STUDENT_ID' => $request->STUDENT_ID,
                    'FEE_CAT_ID' => $key,
                    'DISCOUNT' => $val,
                    'CAMPUS_ID' => Auth::user()->CAMPUS_ID,
                    'USER_ID' => Auth::user()->id,
                ]);
            endforeach;
        endif;
        $msg='Student Record Updated successfully';
        return response()->json($msg);
    }


    public function show()
    {

    $class= Kelex_class::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
    return view('Admin.Students.view')->with('classes',$class);
    }

    public function fetch($id)
    {
        echo json_encode(DB::table('kelex_sections')->where('Class_id',$id)->
        where('CAMPUS_ID','=', Session::get('CAMPUS_ID'))->get());
    }

    public function fetchstudentdata($id)
    {

     $explode_id = array_map('intval', explode('.', $id));
     $SECTION_ID=$explode_id[0];
     $CLASS_ID=$explode_id[1];
       $result=  DB::table('kelex_students_sessions')
        ->leftJoin('kelex_students', 'kelex_students_sessions.STUDENT_ID', '=', 'kelex_students.STUDENT_ID')
        ->where('kelex_students_sessions.SECTION_ID', '=',$SECTION_ID)
        ->where('kelex_students_sessions.CLASS_ID', '=',$CLASS_ID)
        ->where('kelex_students_sessions.CAMPUS_ID','=', Session::get('CAMPUS_ID'))
        ->select('kelex_students.*')
        ->get()->toArray();

        return response()->json($result);
    }

    public function showdetails($id)
    {
        try {
            $id = Crypt::decryptString($id);
            } catch (DecryptException $e) {
            //
            }
      list($data,$class,$section,$session,$std_session_data)=  $this->getstudentdetails($id);
      $classid= $std_session_data['CLASS_ID'];
      $selectedclass= Kelex_class::where('Class_id',$classid)
      ->where('CAMPUS_ID', Session::get('CAMPUS_ID'))->first();
      $sessionid= $std_session_data['SESSION_ID'];
      $selectedsession= Kelex_sessionbatch::where('SB_ID',$sessionid)
      ->where('CAMPUS_ID', Session::get('CAMPUS_ID'))->first();
      return view('Admin.Students.view_students_details')->with(['student'=>$data,'class'=>$selectedclass,'session'=>$selectedsession,'section'=>$section]);

    }

    public function searchstudent(Request $request)
    {


    }

   private function getstudentdetails($id="")
    {
        $data = Kelex_student::find($id)->toArray();
        $std_session_data= Kelex_students_session::where('STUDENT_ID',$id)
                                                    ->where('CAMPUS_ID', Session::get('CAMPUS_ID'))->first();
        $class= Kelex_class::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        $sectionid= $std_session_data['SECTION_ID'];
        $section= kelex_section::where('Section_id',$sectionid)
                                        ->where('CAMPUS_ID', Session::get('CAMPUS_ID'))->first();
        $session=Kelex_sessionbatch::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->get();
        $fee_discount = DB::table('kelex_fee_discounts')
                                ->leftJoin('kelex_fee_categories', 'kelex_fee_categories.FEE_CAT_ID','=', 'kelex_fee_discounts.FEE_CAT_ID')
                                ->where('kelex_fee_discounts.STUDENT_ID',$id)
                                ->select('kelex_fee_categories.FEE_CAT_ID','kelex_fee_categories.CATEGORY','kelex_fee_discounts.DISCOUNT')
                                ->get()->toArray();
        $fee_discount = (empty($fee_discount)) ? [] :  $fee_discount;
                                // dd($fee_discount);
        return array($data,$class,$section,$session,$std_session_data,$fee_discount);
    }

//Supporting Function here

    function csvToArray($filename = '', $delimiter = ',')
{
    if (!file_exists($filename) || !is_readable($filename))
        return false;

    $header = null;
    $data = array();
    if (($handle = fopen($filename, 'r')) !== false)
    {
        while (($row = fgetcsv($handle, 1000, $delimiter)) !== false)
        {
            if (!$header)
                $header = $row;
            else
                $data[] = array_combine($header, $row);
        }
        fclose($handle);
    }

    return $data;
}



}

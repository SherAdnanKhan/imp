<?php

namespace App\Http\Controllers;

use App\Models\Kelex_class;
use Illuminate\Http\Request;
use App\Models\kelex_section;
use App\Models\Kelex_student;
use App\Models\Kelex_sessionbatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\studentrequest;
use Illuminate\Support\Facades\Crypt;
use App\Models\Kelex_students_session;
use Illuminate\Support\Facades\Session;
use App\Models\Kelex_student_application;
use App\Http\Requests\StudentApplicationRequest;
use Illuminate\Contracts\Encryption\DecryptException;

class StudentController extends Controller
{
   
   
    public function index_student()
    {
        $class= Kelex_class::all(); 
        $session= Kelex_sessionbatch::all(); 
        return view("Admin.Students.addstudent")->with(['classes'=>$class,'sessions'=>$session]);
    }
    public function add_student(studentrequest $request)
    {
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
             'STD_PASSWORD'=> Hash::make('123456'),
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
        Kelex_students_session::Create(['SESSION_ID'=>$request->SESSION_ID,'CLASS_ID'=>$request->CLASS_ID,
        'IS_ACTIVE'=>'1','SECTION_ID'=>$request->SECTION_ID,'STUDENT_ID'=>$studentid,
        'ROLL_NO'=> $rollno,'CAMPUS_ID'=>Auth::user()->CAMPUS_ID,
         'USER_ID'=> Auth::user()->id]);

        $msg='Student Record inserted successfully';
        return response()->json($msg);
    }
    public function showstudent()
    {

    $student= Kelex_student::all();
    

    return view('Admin.Students.view')->with('students',$student);
    }

    public function getstudentdata($id){
        list($data,$class,$section,$session,$std_session_data)=  $this->getstudentdetails($id);
        return view('Admin.Students.editstudent')->with(['student'=>$data,'classes'=>$class,'sessions'=>$session,'sections'=>$section,'std_session_data'=>$std_session_data]);
       
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
        $image = $request->file('IMAGE');
        $img=Kelex_student::where('STUDENT_ID',$request->STUDENT_ID)
        ->where('CAMPUS_ID', Session::get('CAMPUS_ID'))->first();
        $my_image =$img['IMAGE'];
        if(!empty($image)):
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload'), $my_image);
        endif;
        Kelex_student::where('STUDENT_ID',$request->STUDENT_ID)
        ->where('CAMPUS_ID', Session::get('CAMPUS_ID'))
          ->update([ 'NAME' => $request->NAME,
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
        ]);
        Kelex_students_session::where('STUDENT_ID',$request->STUDENT_ID)->
        where('CAMPUS_ID', Session::get('CAMPUS_ID'))->
        update(['SESSION_ID'=>$request->SESSION_ID,'CLASS_ID'=>$request->CLASS_ID,
        'IS_ACTIVE'=>'1','SECTION_ID'=>$request->SECTION_ID]);
        $msg='Student Record Updated successfully';
        return response()->json($msg);
    }


    public function show()
    {

    $class= Kelex_class::all();
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
        $class= Kelex_class::all(); 
        $sectionid= $std_session_data['SECTION_ID'];
        $section= kelex_section::where('Section_id',$sectionid)
        ->where('CAMPUS_ID', Session::get('CAMPUS_ID'))->first();
        $session=Kelex_sessionbatch::all();
        return array($data,$class,$section,$session,$std_session_data);
    }



}
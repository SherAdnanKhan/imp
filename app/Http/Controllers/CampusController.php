<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kelex_campus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = getCities();
      //  dd($cities);
        return view("Admin.Campuses.add_campus")->with('cities',$cities);
    }

    public function showcampus()
    {
      
    $campus= Kelex_campus::all();
    

    return view('Admin.Campuses.view_campuses')->with('campuses',$campus);
    }


    public function store(Request $request)
    {
        $request->validate([
            'schoolname' => 'required|max:255',
            'phoneno' =>     'required',
            'city' =>        'required',  'max:255',
            'instuition' =>  'required',
            'billingcharges' => 'required','max:255',
            'discount' => 'required',
        ]);
        $image = $request->file('schoollogo');
        $my_image =null;
        if(!empty($image)):
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload'), $my_image);
        endif;
       
        $billingdate= Carbon::parse( $request->input("billingdate"));
        $agreementdate= Carbon::parse($request->input("agreementdate"));
      
        $kelexcampus= new Kelex_campus();
     
        $kelexcampus->SCHOOL_NAME=      $request->input("schoolname");
        $kelexcampus->SCHOOL_ADDRESS=   $request->input("schooladdress");
        $kelexcampus->PHONE_NO=     $request->input("phoneno");
        $kelexcampus->MOBILE_NO=    $request->input("mobileno");
        $kelexcampus->LOGO_IMAGE=  $my_image;
        $kelexcampus->SCHOOL_REG=   $request->input("schoolregistration");
        $kelexcampus->SCHOOL_WEBSITE=   $request->input("schoolwebsite");
        $kelexcampus->CONTROLLLER=  "abc";
        $kelexcampus->USER_ID= Auth::user()->id;
        $kelexcampus->CITY_ID=  $request->input("city");
        $kelexcampus->TYPE= $request->input("instuition");
        $kelexcampus->BILLING_CHARGE= $request->input("billingcharges") ;
        $kelexcampus->BILLING_DISCOUNT=	   $request->input("discount");
        $kelexcampus->DUE_DATE=   $billingdate;	
        $kelexcampus->STATUS=   $request->input("status");	
        $kelexcampus->SMS_ALLOWED=	$request->input("smsstatus");
        $kelexcampus->AGREEMENT=   $request->input("Aggreement");
        $kelexcampus->AGREEMENT_DATE= $agreementdate;
        if ($kelexcampus->save()) {
            return response()->json($kelexcampus);
        }
    }
    public function getcampusdata(Request $request){
        $currentcampus = (array) DB::table('kelex_campuses')->where(['CAMPUS_ID' => $request->campusid])
        ->get();


       echo json_encode($currentcampus);
    }
    public function updatecampusdata(Request $request)
    {
        $image = $request->file('schoollogo');
        $my_image = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload'), $my_image);
        $billingdate= Carbon::parse( $request->input("billingdate"));
        $agreementdate= Carbon::parse($request->input("agreementdate"));
        
    $affected = DB::table('kelex_campuses')
              ->where('CAMPUS_ID', $request->input('campusid'))
              ->update(["SCHOOL_NAME"=>$request->input("schoolname"),
              "SCHOOL_ADDRESS"=>$request->input("schooladdress"),
              "PHONE_NO"=>$request->input("phoneno"),
              "MOBILE_NO"=>$request->input("mobileno"),
              "LOGO_IMAGE"=>  $my_image,
              "SCHOOL_REG"=>$request->input("schoolregistration"),
              "SCHOOL_WEBSITE"=>   $request->input("schoolwebsite"),
              "CONTROLLLER"=>  "abc",
              "USER_ID"=> Auth::user()->id,
              "CITY_ID"=>  $request->input("city"),
              "TYPE"=> $request->input("instuition"),
              "BILLING_CHARGE"=> $request->input("billingcharges") ,
              "BILLING_DISCOUNT"=>	   $request->input("discount"),
              "DUE_DATE"=>$billingdate,
              "STATUS"=>   $request->input("status"),
              "SMS_ALLOWED"=>	$request->input("smsstatus"),
              "AGREEMENT"=>   $request->input("Aggreement"),
              "AGREEMENT_DATE"=> $agreementdate,
              ]);
        if (is_null( $affected)) {
           echo 1;
        }
    }
}

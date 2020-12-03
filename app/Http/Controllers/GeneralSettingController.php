<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\General_setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GeneralSettingController extends Controller
{
  public function fee_terms(Request $request)
  {
      if(!empty( $request->all() ) ):
        $data = [
            'FEE_TERMS_CONDETIONS' => $request->terms,
            'USER_ID' =>  Auth::user()->id,
            'CAMPUS_ID' => Session::get('CAMPUS_ID'),
        ];
        // dd($data);
       General_setting::updateOrCreate(['SETTING_ID'=> $request->setting_id],$data);
       return ['type'=>1,'response'=> 'record Updated successfully'];
      endif;
      $fee_terms = General_setting::where('CAMPUS_ID',Session::get('CAMPUS_ID'))->first();
      $data['fee_terms'] = $fee_terms;
      return view('Admin.Settings.fee_terms')->with($data);
  }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminLoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\resetPasswordRequest;

class AdminLoginController extends Controller
{
    public function login_Admin(AdminLoginRequest $request)
    {
        $authSuccess = Auth::attempt(['username' => $request->username, 'password' => $request->password]);
            
        if($authSuccess) {
            $request->session()->regenerate();
            $user = User::where('username',$request->username)->first();
            Session::put([
                
                    'is_admin'=>true,
                    'user_id'=>$user['id'],
                    'CAMPUS_ID'=>$user['CAMPUS_ID']
                ]);
                return response()->json(['url'=>url('/admin')]);
            }

        return response()->json();
    }
    public function resetpassword(resetPasswordRequest $request, $hash)
    {
        $reset = DB::table('password_resets')->where('email','=',$request->email)->first();
        if($reset) 
        {
            User::where('email',$reset->email)->update(['password'=> Hash::make($request->password)]);
            return response(['success' => true,'message' => 'Your Password has been changed You can Login now.']);
        }
        else
        {
            return response([
                'success' => false,
                'message' => 'Something Went Wrong.'
            ]);
        }
    }
    public function logout_Admin(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }




}

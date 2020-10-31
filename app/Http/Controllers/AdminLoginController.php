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
use App\Models\Kelex_campus;

class AdminLoginController extends Controller
{
    public function login_Admin(AdminLoginRequest $request)
    {
        $authSuccess = Auth::attempt(['username' => $request->username, 'password' => $request->password]);
        if($authSuccess) {
            $request->session()->regenerate();
            $user = User::where('username',$request->username)->first();
            $campus = Kelex_campus::where('CAMPUS_ID',$user['CAMPUS_ID'])->first();
            Session::put([
                    'CAMPUS'=>$campus,
                    'is_admin'=>true,
                    'user_id'=>$user['id'],
                    'CAMPUS_ID'=>$user['CAMPUS_ID'],
                    'permissions'=>$user['permissions']
                ]);
                return response()->json(['url'=>url('/admin')]);
            }

        return response()->json();
    }
    
    public function logout_Admin(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }




}

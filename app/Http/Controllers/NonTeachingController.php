<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NonTeachingController extends Controller
{
    public function index_staff(Request $request)
    {
            $user=User::where('isadmin',true)->
            select('permissions')->first();
            $currentpermission=$user['permissions'];
            return view('Admin/Hrmanagement/add_staff_with_permissions')->with('permissionstaff',$currentpermission);
    }


    public function store_staff(StaffRequest $request)
    {
    $permission= json_encode($request->role_per);
    $staff= new User();
        $staff->username=$request->username;
        $staff->email=$request->email;
        $staff->CAMPUS_ID=Auth::user()->CAMPUS_ID;
        $staff->password=Hash::Make($request->password);
        $staff->permissions=$permission;
        $staff->save();
        return response()->json(array('status' => 1,'response' => 'Campus Created Sucessfully..'));
    }
}


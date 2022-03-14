<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MultiUsers;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;

class AdminUserManagementController extends Controller
{
    public function userManagement(){
        $data = array();
        
        if(Session::has('loginId')){
            $data = User::where('id','=',Session::get('loginId'))->first();
            $division= DB::table("roles")->where("role","division")->select("role","sub_role")->get();
            $guest = DB::table("roles")->where("role","guest")->select("role","sub_role")->get();
            $users = MultiUsers::all();            
        }
        return view("admin.user-management", compact('division','users','guest'));
    }

    public function multiUser(Request $request){
            
        $request->validate([
            'name'=>'required',
            'sub_role'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:15'
                        
        ]);

        $user = new MultiUsers();
        $user->name = $request->name;
        $user->sub_role = $request->sub_role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $res = $user->save();
        
        if($res){
            return back()->with('success', 'User registered successfully');
        } else{
            return back()->with('fail', 'Something wrong');
        }                        
}
}

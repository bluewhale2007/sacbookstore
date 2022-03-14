<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MultiUsers;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;

class GuestDivisionAuthController extends Controller
{

    public function login(){
        return view("auth.login");
    }

    public function multiLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:15'
            ]);  
            
            $user = MultiUsers::where('email','=',$request->email)->first();
      
            if($user){
                //if user type is DIVISION
                if($user->is_admin){
                    if(Hash::check($request->password,$user->password)){
                        $request->session()->put('DivisionLoginId', $user->id);
                        $request->session()->put('DivisionLoginRole', $user->sub_role);
                        return redirect("division");
                    }else{
                        return back()->with('fail', 'Password not matches.'); 
                    }
                }


                else{
                    if(Hash::check($request->password,$user->password)){
                        $request->session()->put('GuestLoginId', $user->id);
                        $request->session()->put('GuestLoginRole', $user->sub_role);
                        $request->session()->put('GuestLoginName', $user->name);
                        return redirect("guest");
                    }else{
                        return back()->with('fail', 'Password not matches.'); 
                    }
                }

                
                
            }else{
               return back()->with('fail', 'This email is not registered.'); 
            }
    }
    
    public function logoutGuest(){
        
        if(Session::has('GuestLoginId')){
            Session::pull('GuestLoginId');
            return view('index');
        }
    }

    public function logoutDivision(){
        
        if(Session::has('DivisionLoginId')){
            Session::pull('DivisionLoginId');
            return view('index');
        }
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MultiUsers;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;

class CustomAuthController extends Controller
{
    public function login(){
        return view("auth.login");
    }
    
    public function registration(){
        return view("auth.registration");
    }

    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = MultiUsers::where('id','=',Session::get('loginId'))->first();
        }
       return view("admin.dashboard",compact('data'));
      
    }

    public function userManagement(){
        $data = array();
        if(Session::has('loginId')){
            $data = MultiUsers::where('id','=',Session::get('loginId'))->first();
        }
        return view("admin.user-management");
    }

    
    public function registerUser(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:15'
            ]);     
            
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $res = $user->save();
            
            if($res){
                return back()->with('success', 'You have registered successfully');
            } else{
                return back()->with('fail', 'Something wrong');
            }
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
    
    public function loginUser(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:15'
            ]);  
            
            $user = User::where('email','=',$request->email)->first();
           
            if($user){
                
                if(Hash::check($request->password,$user->password)){
                    $request->session()->put('loginId', $user->id);
                    return redirect('dashboard');
                }else{
                    return back()->with('fail', 'Password not matches.'); 
                }
                
            }else{
               return back()->with('fail', 'This email is not registered.'); 
            }
    }

    public function multiLogin(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:15'
            ]);  
            
            $user = MultiUsers::where('email','=',$request->email)->first();
      
            if($user){
                
                if($user->is_admin){
                    if(Hash::check($request->password,$user->password)){
                        $request->session()->put('loginId', $user->id);
                        return redirect("dashboard");
                    }else{
                        return back()->with('fail', 'Password not matches.'); 
                    }
                }


                else{
                    if(Hash::check($request->password,$user->password)){
                        $request->session()->put('GuestLoginId', $user->id);
                        return redirect("guest");
                    }else{
                        return back()->with('fail', 'Password not matches.'); 
                    }
                }

                
                
            }else{
               return back()->with('fail', 'This email is not registered.'); 
            }
    }
    


    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
        else if(Session::has('GuestLoginId')){
            Session::pull('GuestLoginId');
            return redirect('login');
        }
    }



}

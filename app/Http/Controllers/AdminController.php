<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MultiUsers;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;

class AdminController extends Controller
{
    public function adminLogin(){
        return view("admin.admin-login");
    }
    
    // public function registration(){
    //     return view("auth.registration");
    // }

    
    // public function registerUser(Request $request){
    //     $request->validate([
    //         'name'=>'required',
    //         'email'=>'required|email|unique:users',
    //         'password'=>'required|min:5|max:15'
    //         ]);     
            
    //         $user = new User();
    //         $user->name = $request->name;
    //         $user->email = $request->email;
    //         $user->password = Hash::make($request->password);
    //         $res = $user->save();
            
    //         if($res){
    //             return back()->with('success', 'You have registered successfully');
    //         } else{
    //             return back()->with('fail', 'Something wrong');
    //         }
    // }


    
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

   
    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return view('index');
        }

    }


}

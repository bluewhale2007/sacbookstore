<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MultiUsers;
use App\Models\Roles;
use App\Models\Finance;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;

class FinanceAuthController extends Controller
{
    public function financeLogin(){
        return view('auth.finance-login');

    }

    public function loginFinance(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:15'
            ]);  
            
            $user = Finance::where('email','=',$request->email)->first();
           
            if($user){
                
                if(Hash::check($request->password,$user->password)){
                    $request->session()->put('FinanceLoginId', $user->id);
                    return redirect("finance");
                }else{
                    return back()->with('fail', 'Password not matches.'); 
                }
                
            }else{
               return back()->with('fail', 'This email is not registered.'); 
            }
    }

    public function logoutFinance(){
        if(Session::has('FinanceLoginId')){
            Session::pull('FinanceLoginId');
            return view('index');
        }
    }
}

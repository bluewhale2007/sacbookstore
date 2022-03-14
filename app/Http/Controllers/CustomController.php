<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MultiUsers;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Auth;

class CustomController extends Controller
{


    public function guestView(){
        $data = array();
        if(Session::has('GuestLoginId')){
            $data = MultiUsers::where('id','=',Session::get('GuestLoginId'))->first();
                    
        }

        return view("guest.index",compact('data'));
    }

    // public function divisionView(){
    //     $data = array();
    //     if(Session::has('DivisionLoginId')){
    //         $data = MultiUsers::where('id','=',Session::get('DivisionLoginId'))->first();
           
            
    //     }
    //     return view("division.index",compact('data'));
    // }

}

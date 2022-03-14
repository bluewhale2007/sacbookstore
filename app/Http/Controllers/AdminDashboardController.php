<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MultiUsers;
use App\Models\Roles;
use App\Models\Stock;
use App\Models\DivisionRequest;
use App\Models\OrderTransaction;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;

class AdminDashboardController extends Controller
{
    public function dashboard(){
        $data = array();
        if(Session::has('loginId')){
            $data = MultiUsers::where('id','=',Session::get('loginId'))->first();
            $transaction = OrderTransaction::all();
            $order = Order::all();
            $sum =  DB::table('orders')->first();

           
        }
       return view("admin.dashboard",compact('data','transaction','order','sum'));
      
    }
}

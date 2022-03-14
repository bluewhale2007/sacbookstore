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


class AdminFinanceController extends Controller
{
    public function financeView(){
        $data = array();
       
        if(Session::has('loginId')){
            $data = MultiUsers::where('id','=',Session::get('loginId'))->first();      
            $transaction = OrderTransaction::all();
            $order = Order::all();
            $sum =  DB::table('orders')->first();
        }

        return view("finance.index",compact('data','transaction','order','sum'));
    }

    public function acceptStatus($id){

       $status =  OrderTransaction::find($id);
       $status->status = "ACCEPTED";
       $status->save();

       return redirect('finance');

    }

    public function declinedStatus($id){

        $status =  OrderTransaction::find($id);
        $status->status = "DECLINED";
        $status->save();
 
        return redirect('finance');
 
     }
}

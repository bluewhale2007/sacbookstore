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

class AdminTransactionController extends Controller
{
    public function transactionShow(){
        $data = array();

        if(Session::has('loginId')){
            $data = MultiUsers::where('id','=',Session::get('loginId'))->first();  
            $transaction = OrderTransaction::all();
            $order = Order::all();
            $sum =  DB::table('orders')->first();

            return view("admin.transaction",compact('data','transaction','order','sum')); 

        } 
    }

    public function adminSuccessStatus($id){

       $status =  OrderTransaction::find($id);
       $status->status = "SUCCESSFUL";
       $status->save();

       return redirect('transaction');

    }

    public function adminDeclinedStatus($id){

        $status =  OrderTransaction::find($id);
        $status->status = "DECLINED";
        $status->save();
 
        return redirect('transaction');
 
     }
}

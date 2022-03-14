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

class AdminReportController extends Controller
{
    public function reportShow(){
        $data = array();
        
        if(Session::has('loginId')){
            $data = MultiUsers::where('id','=',Session::get('loginId'))->first();
            $transaction = OrderTransaction::all();
            $order = Order::all();
            $transactionCount = $transaction->count();

            $pendingCount = OrderTransaction::where('status','=','PENDING')->count();
            $successfulCount = OrderTransaction::where('status','=','SUCCESSFUL')->count();
            $declinedCount = OrderTransaction::where('status','=','DECLINED')->count();


            return view("admin.report",compact('transactionCount','pendingCount','successfulCount','declinedCount'));  
        } 
    }
}

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
use App\Http\Requests\StoreOrderRequest;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;

class DivisionController extends Controller
{
    public function divisionView(){
        $data = array();
        
       
        if(Session::has('DivisionLoginId')){
            $data = MultiUsers::where('id','=',Session::get('DivisionLoginId'))->first();
            $dep = MultiUsers::where('sub_role','=',Session::get('DivisionLoginRole'))->first();
            #$stock = DB::table("stocks")->select("stock_name","stock_cost")->get();
            $stock = Stock::all();
            $price  = DB::table("stocks")->select("stock_cost")->get();
            $unit = DB::table("stocks")->select("stock_format")->get();
            $division= DB::table("roles")->where("role","division")->select("role","sub_role")->get();
            $transaction = OrderTransaction::all();
            $order = Order::all();
            
                    
        }

        return view("division.index",compact('data','division','dep','stock','price','transaction','order','unit'));
    }



    public function stockRequest(Request $request){

        $sub_role = Session::get('DivisionLoginRole'); //Get user Department
        $div_id = Session::get('DivisionLoginId'); //Get user id
       

       

        $department = $sub_role;
      
        $quantity = $request->request_quantity;
        $item = $request->request_stock_name;
        $price = $request->request_stock_price;
        $status = 'PENDING';

        $generateOrderId = rand(1000,9999); //Generate Order ID
        
            
            $datasave = [
               
                'department' => $department,
                'order_id' => $generateOrderId,
                'status' => $status,
                "created_at" => now(),
                "updated_at" => now()

            ];
            DB::table('order_transactions')->insert($datasave);

       

        for ($i=0; $i < count($item); $i++) { 
            
            $datasave = [

                'order_id' => $generateOrderId,
                'name' => $item[$i],
                'quantity' =>  $quantity[$i],
                'price' =>  $price[$i],
                'amount' => $price[$i] * $quantity[$i]
              

            ];
            DB::table('orders')->insert($datasave);

        }

        return back()->with('success', 'Stock requested successfully');

    }

  

 
}

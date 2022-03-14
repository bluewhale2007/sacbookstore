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
use Session;
use Illuminate\Support\Facades\Auth;
use PDF;

class GuestController extends Controller
{
    public function guestView(){
        $data = array();
        
            // $data = MultiUsers::where('id','=',Session::get('GuestLoginId'))->first();
            // $dep = MultiUsers::where('sub_role','=',Session::get('GuestLoginRole'))->first();
            // $name = MultiUsers::where('name','=',Session::get('GuestLoginName'))->first();
            $stock = Stock::all();
            $price  = DB::table("stocks")->select("stock_cost")->get();
            // $division= DB::table("roles")->where("role","guest")->select("role","sub_role")->get();
            // $transaction = OrderTransaction::all();
            $order = Order::all();
                   
        

        return view("guest.index",compact('data','stock','price','order'));
    }

    public function guestReceipt($username,$order_id){
        $transaction = OrderTransaction::all();
        $order = Order::all();
        return view("guest.receipt", compact('transaction','order','username','order_id'));
    }

    public function downloadPDF($username,$order_id){
        $transaction = OrderTransaction::all();
        $order = Order::all();
        $pdf = PDF::loadView('guest.receipt',compact('transaction','order','username','order_id'));
        return $pdf->download("$order_id-$username-Receipt-Slip.pdf");
    }

    public function GuestStockRequest(Request $request){
        $transaction = OrderTransaction::all();
        $order = Order::all();
        $username = $request->request_name;
        $quantity = $request->request_quantity;
        $item = $request->request_stock_name;
        $price = $request->request_stock_price;
        $status = 'PENDING';
        $guest = 'GUEST';

        $generateOrderId = rand(1000,9999); //Generate Order ID
        
            
            $datasave = [
                'name' => $username,
                'department' => $guest,
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

        //return back()->with('success', 'Stock requested successfully');

        
        //$pdf = PDF::loadHtmlFile("guest-receipt/$username/$generateOrderId");
        //return $pdf->download('receipt-slip.pdf');
        //return view("guest.receipt",compact('username','generateOrderId','transaction','order'));
        return redirect("guest-receipt/$username/$generateOrderId");
    }


}

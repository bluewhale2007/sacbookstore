<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MultiUsers;
use App\Models\Roles;
use App\Models\Stock;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;

class AdminInventoryController extends Controller
{
        public function inventoryShow(){
            $data = array();
            
            if(Session::has('loginId')){
                $data = User::where('id','=',Session::get('loginId'))->first();
                $stocks = Stock::all();
            }
            return view("admin.inventory",compact('stocks'));   
         }

        public function addStock(Request $request){
            $request->validate([
                // 'stock_format'=>'required',
                // 'stock_type'=>'required',
                'stock_name'=>'required',
                'stock_description'=>'required',
                'stock_count'=>'required',
                'stock_cost'=>'required', 
                                    
            ]);


            $stock = new Stock();
            $stock->stock_format = $request->stock_format;
            $stock->stock_type = $request->stock_type;
            $stock->stock_name = $request->stock_name;
            $stock->stock_description = $request->stock_description;
            $stock->stock_count = $request->stock_count;
            $stock->stock_cost = $request->stock_cost;
            $stock->stock_amount = $request->stock_cost * $request->stock_count ;
            $add = $stock->save();

            if($add){
                return back()->with('success', 'Stock added successfully');
            } 
             else{
                return back()->with('fail', 'Something wrong');
            } 
            
        }
       
    
}

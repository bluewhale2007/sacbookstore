<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MultiUsers;
use App\Models\Roles;
use Illuminate\Support\Facades\DB;
use Hash;
use Session;

class AdminSupplierController extends Controller
{
    public function supplierShow(){
        $data = array();
        
        if(Session::has('loginId')){
            return view("admin.supplier");
        }   
    }
}

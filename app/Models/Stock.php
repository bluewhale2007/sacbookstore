<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
           'stock_name', 
           'stock_type',
           'stock_description',  
           'stock_format', 
           'stock_count',
           'stock_cost',
           'stock_amount',   
    ];

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}

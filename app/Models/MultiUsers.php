<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class MultiUsers extends Authenticatable
{
    

    public function is_admin(){
        if($this->admin){
            return true;
        }
        return false;
    }

}

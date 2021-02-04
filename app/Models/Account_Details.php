<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account_Details extends Model
{
    public function users(){
        return $this->belongsTo('App\User');
    }
    use HasFactory;
}

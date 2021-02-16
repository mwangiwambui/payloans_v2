<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Loan_Applications extends Model
{
//    use SoftDeletes;
    protected $guarded = [];
//    protected $fillable= ['name','description','size','image','category_id','price','quantity','synopsis','author'];

    public function users(){
        return $this->belongsTo('App\User');
    }
    use HasFactory;



}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function units(){
        return $this->hasOne('App\Models\Unit');
    }

    public function batch(){
        return $this->belongsTo('App\Models\Batch');
    }

    public function people(){
        return $this->hasOne('App\Models\Person');
    }
   
    protected $guarded = [];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    public function products(){
        return $this->hasOne('App\Models\Product');
    }

    protected $guarded = [];
    
}

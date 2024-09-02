<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function batch(){
        return $this->belongsTo('App\Models\Batch');
    }
    public function movement(){
        return $this->belongsTo('App\Models\Movement');
    }
}

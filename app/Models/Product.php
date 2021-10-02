<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function orderItems(){
        return $this->hasMany('App\Models\OrderItem');
    }

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier');
    }

    public function inventory(){
        return $this->hasOne('App\Models\Inventory');
    }
}

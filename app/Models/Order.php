<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function customer() {
        return $this->belongsTo('App\Models\Customer');
    }

    public function items(){
        return $this->hasMany('App\Models\OrderItem');
    }
}

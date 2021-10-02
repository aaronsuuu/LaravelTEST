<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    public function supplier(){
        return $this->belongsTo('App\Models\Supplier');
    }

    public function purchaseItems(){
        return $this->hasMany('App\Models\PurchaseItem');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;

    public function purchase(){
        return $this->belongsTo('App\Models\Purchase');
    }

    public function product(){
        return $this->belongsTo('App\Models\Product');
    }

    public function getTotalPriceAttribute(){
        return $this->quantity * $this->price;
    }
}

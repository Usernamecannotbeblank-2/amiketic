<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parquet extends Model
{
    public function cartItems() { 
        return $this->hasMany(Cart::class, 'parquets_id'); 
    }

    public function supply(){
        return $this->belongsTo(Supply::class, 'supply_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = 'products';
    public function categories(){
        return $this->belongsTo(Categories::class);
    }
    public function images(){
        return $this->hasMany(images::class);
    }
    public function orderdeatils(){
        return $this->hasMany(orders_details::class);
    }
    public function shipment_items(){
        return $this->hasMany(Shipments_items::class);
    }
    public function cart_items(){
        return $this->hasMany(cart_items::class);
    }
}

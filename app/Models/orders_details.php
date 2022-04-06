<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders_details extends Model
{
    use HasFactory;
    public function orders(){
        return $this->belongsTo(orders::class);
    }
    public function products(){
        return $this->belongsTo(Products::class);
    }
}

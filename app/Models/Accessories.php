<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    protected $table = 'accessories';

    public function Product(){
            return $this->hasOne(Product::class,'id','product_id');
         } 
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    protected $table = 'condition';
    public function Product(){
        return $this->hasOne(Product::class,'id','product_id');
    } 
}

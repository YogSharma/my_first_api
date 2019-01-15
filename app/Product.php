<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'details',
        'price',
        'discount',
        'stock',
    ];
    public function review(){
        return $this->hasMany(Review::class);
    }
}

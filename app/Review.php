<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'customer',
        'product_id',
        'review',
        'star',
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
}

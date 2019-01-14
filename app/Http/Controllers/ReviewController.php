<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function getValue(){

        dd(Review::find(2)->products) ;
    }
}

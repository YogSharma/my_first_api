<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewResource;
use App\Product;
use App\Review;

class ReviewController extends Controller
{
    public function index(Product $productId){
        return ReviewResource::collection($productId->review);
    }
}

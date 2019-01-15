<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewResource;
use App\Product;
use App\Review;
use Symfony\Component\HttpFoundation\Response;

class ReviewController extends Controller
{
    public function index(Product $productId){
        return ReviewResource::collection($productId->review);
    }

    public function store(\Illuminate\Http\Request $request,Product $productId){
        $review = new Review($request->all());
        $productId->review()->save($review);
        return response([
            'data' => new ReviewResource($review),
            Response::HTTP_CREATED,
        ]);
    }
}

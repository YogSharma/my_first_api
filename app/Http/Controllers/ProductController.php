<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Product;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('auth:api')->except('index', 'show');
    }

    public function index(){
        return ProductCollection::collection(Product::paginate(5));
    }

    public function show(Product $product){
        return new ProductResource($product);
    }

    public function store(ProductRequest $request){
        $product = new Product;
        $product->name = $request->name;
        $product->details = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->discount = $request->discount;
        $product->save();
        return response([
            'data' => new ProductResource($product)
        ], \Symfony\Component\HttpFoundation\Response::HTTP_CREATED);
    }

    public function update(ProductRequest $request, Product $product){
        $request['details'] = $request->description;
        unset($request['description']);
        $product->update($request->all());
        return response([
            'data' => new ProductResource($product)
        ], \Symfony\Component\HttpFoundation\Response::HTTP_CREATED);
    }
}

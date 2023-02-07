<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class IndexController extends Controller
{
    public function __invoke()
    {
        $products = ProductResource::collection(Product::all());
        return view('product.index', compact('products'));
    }
}

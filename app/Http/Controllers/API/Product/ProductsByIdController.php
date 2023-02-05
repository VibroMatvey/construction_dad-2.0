<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Product;

class ProductsByIdController extends Controller
{
    public function __invoke(Product $product)
    {
        return new ProductResource($product);
    }
}

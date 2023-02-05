<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductResource;
use App\Models\Category;
use App\Models\Product;

class ProductsByCategoryController extends Controller
{
    public function __invoke(Category $category)
    {
        $products = Product::all()->where('category_id', '=', $category->id);
        return ProductResource::collection($products);
    }
}

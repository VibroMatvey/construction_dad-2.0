<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductTag;

class ShowController extends Controller
{
    public function __invoke(Product $product)
    {
        $images = Image::all()->where('product_id', '=', $product->id);
        return view('product.show', compact('product', 'images'));
    }
}

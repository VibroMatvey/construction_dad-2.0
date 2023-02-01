<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Tag;

class EditController extends Controller
{
    public function __invoke(Product $product)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $images = Image::all()->where('product_id', '=', $product->id);

        $content_data = json_decode($product['content']);

        foreach($content_data as $d) {
            $array[] = implode('-', $d);
        }

        $content = implode(',', $array);

        return view('product.edit', compact('product', 'tags', 'categories', 'content', 'images'));
    }
}

<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class EditController extends Controller
{
    public function __invoke(Product $product)
    {
        $tags = Tag::all();
        $categories = Category::all();

        $content_data = json_decode($product['content']);
        array_walk($content_data, function(&$value, $key) {
            $value = "{$key} - {$value}";
        });

        foreach($content_data as $d) {
            $array[]=$d;
        }

        $content = implode(', ', $array);

        return view('product.edit', compact('product', 'tags', 'categories', 'content'));
    }
}

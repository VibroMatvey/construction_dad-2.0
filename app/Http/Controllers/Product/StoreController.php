<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['preview_img'] = Storage::disk('public')->put('/images', $data['preview_img']);
        if(!$request->has('tags')) {
            $data['tags'] = [];
        }
        $tags = $data['tags'];
        unset($data['tags']);

        $product = Product::firstOrCreate([
           'title' => $data['title']
        ], $data);

        foreach ($tags as $tag) {
            ProductTag::firstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tag
            ]);
        }

        return redirect()->route('product.index');
    }
}

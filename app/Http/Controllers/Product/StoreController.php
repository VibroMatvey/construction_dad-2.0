<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        if (!$request->has('tags')) {
            $data['tags'] = [];
        }

        $content = explode(',', trim($data['content']));

        foreach ($content as $item) {
            $item = explode('-', $item);
            $content_data[] = $item;
        }

        $data['content'] = json_encode($content_data, JSON_UNESCAPED_UNICODE);

        $data['preview_img'] = Storage::disk('public')->put('/images', $data['preview_img']);

        $tags = $data['tags'];
        unset($data['tags']);

        $images = $data['images'];
        unset($data['images']);

        $product = Product::firstOrCreate([
            'title' => $data['title']
        ], $data);

        foreach ($tags as $tag) {
            ProductTag::firstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tag,
            ]);
        }

        foreach ($images as $image) {
            $url = Storage::disk('public')->put('/images', $image);
            Image::firstOrCreate([
                'product_id' => $product->id,
                'image' => $url,
            ]);
        }

        return redirect()->route('product.index');
    }
}

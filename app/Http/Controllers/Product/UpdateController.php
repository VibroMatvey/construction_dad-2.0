<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Image;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        if(!$request->has('tags')) {
            $data['tags'] = [];
        }

        if(!$request->has('images')) {
            $data['images'] = [];
        }

        if(!$request->has('preview_img')) {
            $data['preview_img'] = $product->preview_img;
        }

        $content = explode(',', trim($data['content']));

        foreach ($content as $item) {
            $item = explode('-', $item);
            $content_data[] = $item;
        }

        $data['content'] = json_encode($content_data, JSON_UNESCAPED_UNICODE);

        if (!Storage::disk('public')->exists($data['preview_img'])) {
            Storage::disk('public')->delete($product->preview_img);
            $data['preview_img'] = Storage::disk('public')->put('/images', $data['preview_img']);
        }
        $tags = $data['tags'];
        unset($data['tags']);

        $images = $data['images'];
        unset($data['images']);

        $product->update($data);

        foreach ($tags as $tag) {
            ProductTag::firstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tag
            ]);
        }

        foreach ($images as $image) {
            $image = Storage::disk('public')->put('/images', $image);
            Image::firstOrCreate([
                'product_id' => $product->id,
                'image' => $image
            ]);
        }

        return redirect()->route('product.show', $product->id);
    }
}

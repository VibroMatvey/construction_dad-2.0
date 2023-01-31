<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
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

        if(!$request->has('preview_img')) {
            $data['preview_img'] = $product->preview_img;
        }

        $content = explode(',', str_replace(' ', '', $this->content));

        foreach ($content as $item) {
            $item_content = [];
            $item = explode('-', $item);
            $item_content[$item[0]] = $item[1];
            $content_data[] = $item_content;
        }

        $data['content'] = json_encode($content_data, JSON_UNESCAPED_UNICODE);

        if (!Storage::disk('public')->exists($data['preview_img'])) {
            Storage::disk('public')->delete($product->preview_img);
            $data['preview_img'] = Storage::disk('public')->put('/images', $data['preview_img']);
        }
        $tags = $data['tags'];
        unset($data['tags']);

        $product->update($data);

        foreach ($tags as $tag) {
            ProductTag::firstOrCreate([
                'product_id' => $product->id,
                'tag_id' => $tag
            ]);
        }

        return view('product.show', compact('product'));
    }
}

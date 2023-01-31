<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke(Product $product)
    {
        ProductTag::where('product_id', $product->id)->delete();
        Storage::disk('public')->delete($product->preview_img);
        $product->delete();

        return redirect()->route('product.index');
    }
}

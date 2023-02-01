<?php

namespace App\Http\Controllers\Image;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    public function __invoke(Image $image)
    {
        Storage::disk('public')->delete($image->image);
        $product_id = $image->product_id;
        $image->delete();

        return redirect()->route('product.edit', $product_id);
    }
}

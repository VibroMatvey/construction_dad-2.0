<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tag.index');
    }
}

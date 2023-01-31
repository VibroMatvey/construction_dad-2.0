<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Tag $tag)
    {
        return view('tag.show', compact('tag'));
    }
}

<?php

namespace App\Http\Controllers\Options;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $options = Option::all();
        return view('options.index', compact('options'));
    }
}

<?php

namespace App\Http\Controllers\Options;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Option $option)
    {
        return view('options.edit', compact('option'));
    }
}

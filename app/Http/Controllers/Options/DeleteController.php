<?php

namespace App\Http\Controllers\Options;

use App\Http\Controllers\Controller;
use App\Models\Option;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Option $option)
    {
        $option->delete();

        return redirect()->route('options.index');
    }
}

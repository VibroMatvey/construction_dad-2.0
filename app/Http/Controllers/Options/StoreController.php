<?php

namespace App\Http\Controllers\Options;

use App\Http\Controllers\Controller;
use App\Http\Requests\Options\StoreRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Option::firstOrCreate($data);

        return redirect()->route('options.index');
    }
}

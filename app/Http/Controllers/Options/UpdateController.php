<?php

namespace App\Http\Controllers\Options;

use App\Http\Controllers\Controller;
use App\Http\Requests\Options\UpdateRequest;
use App\Models\Option;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Option $option)
    {
        $data = $request->validated();
        $option->update($data);

        return view('options.show', compact('option'));
    }
}

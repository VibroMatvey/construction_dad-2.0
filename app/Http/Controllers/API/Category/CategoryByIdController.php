<?php

namespace App\Http\Controllers\API\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryByIdController extends Controller
{
    public function __invoke(Category $category)
    {
        return $category;
    }
}

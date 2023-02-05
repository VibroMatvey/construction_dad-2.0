<?php

namespace App\Http\Controllers\API\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;

class IndexController extends Controller
{
   public function __invoke()
   {
       $categories = Category::all();
       return $categories;
   }
}

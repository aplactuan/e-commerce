<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $categories = Category::tree()->get()->toTree();

        return view('home', [
            'categories' => $categories
        ]);
    }
}

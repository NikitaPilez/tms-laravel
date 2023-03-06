<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->where('is_active', 1)->get();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function category(Category $category)
    {
        return view('categories.category', [
            'category' => $category
        ]);
    }
}

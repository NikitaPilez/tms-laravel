<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function product(Product $product)
    {
        return view('product', [
            'product' => $product
        ]);
    }

    public function products()
    {
        $products = Product::query()->where('is_active', 1)->get();

        $categories = DB::table('categories')
            ->selectRaw('categories.id, count(categories.id) as count, categories.name as name')
            ->leftJoin('products', 'categories.id', '=', 'products.category_id')
            ->groupBy('categories.id')
            ->get();

        $latestProducts = Product::query()->where('is_active', 1)->orderBy('created_at', 'DESC')->take(3)->get();

        return view('products', [
            'products' => $products,
            'categories' => $categories,
            'latestProducts' => $latestProducts
        ]);
    }

    public function category()
    {

    }
}

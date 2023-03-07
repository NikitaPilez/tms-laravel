<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

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
        $products = Product::where('is_active', 1)->get();

        return view('products', [
            'products' => $products
        ]);
    }

    public function category()
    {

    }
}

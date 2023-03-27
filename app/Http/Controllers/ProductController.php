<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use App\Services\ProductService;
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

    public function products(Request $request, ProductService $productService)
    {
        $products = $productService->getProducts($request->all());

        $latestProducts = Product::query()->latestActive(3)->get();

        return view('products', [
            'products' => $products,
            'latestProducts' => $latestProducts,
            'tags' => Tag::all(),
            'params' => $request->all()
        ]);
    }

    public function category()
    {

    }
}

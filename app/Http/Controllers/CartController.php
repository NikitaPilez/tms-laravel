<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]++;
        } else {
            $cart[$product->id] = 1;
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product add to cart successfully!');
    }

    public function getCart()
    {
        return view('cart', [
            'products' => session()->get('cart')
        ]);
    }

    public function remove(Product $product)
    {
        $cart = session()->get('cart');

        if(isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Product successfully removed!');

    }
}

<?php

namespace App\Services;

use App\Models\Product;

class CartService
{
    public function addProduct(Product $product)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $currentQuantity = $cart[$product->id]['quantity'];
            $cart[$product->id] = [
                'quantity' => $currentQuantity + 1,
                'added_at' => time()
            ];
        } else {
            $cart[$product->id] = [
                'quantity' => 1,
                'added_at' => time()
            ];
        }

        session()->put('cart', $cart);
    }

    public function removeProduct(Product $product)
    {
        $cart = session()->get('cart');

        if(isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function getTotalCartSum()
    {
        $cart = session()->get('cart');
        $sum = 0;

        if ($cart) {
            foreach ($cart as $key => $item) {
                $product = Product::find($key);
                $sum += ($item['quantity'] * $product->price);
            }
        }

        return $sum;
    }
}

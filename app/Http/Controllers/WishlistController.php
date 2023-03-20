<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function get()
    {
        return view('wishlist', [
            'user' => Auth::user()
        ]);
    }

    public function add(Product $product)
    {
        $user = Auth::user();

        if (!$user->wishlist()->where('product_id', $product->id)->first()) {
            $user->wishlist()->attach($product);
        }

        return redirect()->back();
    }

    public function delete(Product $product)
    {
        $user = Auth::user();

        $user->wishlist()->detach($product);

        return redirect()->back();
    }
}

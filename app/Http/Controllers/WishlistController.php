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

        $user->wishlist()->attach($product);

        return redirect()->route('wishlist.get');
    }

    public function delete(Product $product)
    {
        $user = Auth::user();

        $user->wishlist()->detach($product);

        return redirect()->route('wishlist.get');
    }
}

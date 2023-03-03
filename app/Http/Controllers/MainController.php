<?php

namespace App\Http\Controllers;

use App\Models\Banner;

class MainController extends Controller
{
    public function main()
    {
        $banners = Banner::where('is_active', 1)->get();

        return view('main', [
            'banners' => $banners
        ]);
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        return view('checkout');
    }
}

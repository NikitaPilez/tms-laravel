<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function main()
    {
        return view('main');
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

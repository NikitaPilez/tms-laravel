<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function main()
    {
        $banners = Banner::where('is_active', 1)->get();

        return view('main', [
            'banners' => $banners
        ]);
    }

    public function changeLang(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);

        return redirect()->back();
    }

    public function about()
    {
        return view('about');
    }
}

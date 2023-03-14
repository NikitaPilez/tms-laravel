<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    CONST DARK_HEADER_ROUTES = [
        'about',
        'contacts',
        'main',
        'auth.loginPage',
        'auth.registerPage'
    ];

    public function __construct()
    {
        View::share('isDarkHeader', $this->isDarkHeader());
    }

    private function isDarkHeader(): bool
    {
        $actionName = Route::getCurrentRoute()->getName();

        return in_array($actionName, self::DARK_HEADER_ROUTES);
    }
}

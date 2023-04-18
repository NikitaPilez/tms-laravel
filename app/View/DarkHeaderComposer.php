<?php

namespace App\View;

use Illuminate\Support\Facades\Route;
use Illuminate\View\View;

class DarkHeaderComposer
{

    public function compose(View $view)
    {
        $view->with('isDarkHeader', $this->isDarkHeader());
    }

    private function isDarkHeader(): bool
    {
        return in_array(Route::currentRouteName(), $this->getDarkHeaderRoutes());
    }

    private function getDarkHeaderRoutes(): array
    {
        return [
            'about',
            'contacts',
            'main',
            'auth.loginPage',
            'auth.registerPage'
        ];
    }
}

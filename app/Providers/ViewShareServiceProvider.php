<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewShareServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::share('isDarkHeader', $this->isDarkHeader());
    }

    private function isDarkHeader(): bool
    {
//        dd(URL::current());
        $actionName = '';

        return in_array($actionName, $this->getDarkHeaderRoutes());
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

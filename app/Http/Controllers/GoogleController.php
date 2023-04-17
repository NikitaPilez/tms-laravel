<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(AuthService $authService)
    {
        $googleUser = Socialite::driver('google')->user();
        $user = $authService->getInternalUser($googleUser, 'google');
        $authService->googleUpdateAdditionalUserInformation($googleUser, $user);
        Auth::login($user);

        return redirect()->route('main')->with('success', 'Success logged in');
    }
}

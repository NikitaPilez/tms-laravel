<?php

namespace App\Http\Controllers;

use App\Services\AuthService;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback(AuthService $authService)
    {
        $githubUser = Socialite::driver('github')->user();
        $user = $authService->getInternalUser($githubUser, 'github');
        $authService->githubUpdateAdditionalUserInformation($githubUser, $user);
        Auth::login($user);

        return redirect()->route('main')->with('success', 'Success logged in');
    }
}

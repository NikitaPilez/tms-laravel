<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('github')->redirect();
    }

    public function callback()
    {
        $githubUser = Socialite::driver('github')->user();

        $email = $githubUser->getEmail();
        $user = User::query()->where('email', $email)->first();
        if (!$user) {
            $user = User::query()->create([
                'email' => $email,
                'name' => $githubUser->getName()
            ]);
        }

        Auth::login($user);

        return redirect()->route('main')->with('success', 'Success logged in');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $googleUser = Socialite::driver('google')->user();

        $email = $googleUser->getEmail();
        $user = User::query()->where('email', $email)->first();
        if (!$user) {
            $user = User::query()->create([
                'email' => $email,
                'name' => $googleUser->getName()
            ]);
        }

        Auth::login($user);

        return redirect()->route('main');
    }
}

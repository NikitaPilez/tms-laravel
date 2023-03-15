<?php

namespace App\Http\Controllers;

use App\Helpers\Country;
use App\Services\AccountService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function account()
    {
        $geos = Country::getAllGeos();
        $timezones = Country::getAllTimezones();

        return view('auth.account', [
            'user' => Auth::user(),
            'geos' => $geos,
            'timezones' => $timezones
        ]);
    }

    public function updateAccount(Request $request, AccountService $accountService)
    {
        $accountService->updateAccount($request->all());
        return redirect()->route('account.show');
    }
}

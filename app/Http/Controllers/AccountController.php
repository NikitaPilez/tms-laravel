<?php

namespace App\Http\Controllers;

use App\Helpers\Country;
use App\Http\Requests\AccountRequest;
use App\Services\AccountService;
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

    public function updateAccount(AccountRequest $request, AccountService $accountService)
    {
        $accountService->updateAccount($request->validated());
        return redirect()->route('account.show');
    }
}

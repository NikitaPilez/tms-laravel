<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Services\ForgetPasswordService;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    private ForgetPasswordService $forgetPasswordService;

    public function __construct(ForgetPasswordService $forgetPasswordService)
    {
        $this->forgetPasswordService = $forgetPasswordService;
    }

    public function forgotPasswordView()
    {
        return view('auth.forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $this->forgetPasswordService->sendResetPasswordLink($request->input('email'));
        return redirect()->back()->with('success', 'Link send successfully');
    }

    public function resetPasswordView(string $token)
    {
        return view('auth.reset-password', [
            'token' => $token
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $validated = $request->validated();
        $this->forgetPasswordService->resetPassword($validated['email'], $validated['token'], $validated['password']);
        return redirect()->back()->with('success', 'Password successfully updated');
    }
}

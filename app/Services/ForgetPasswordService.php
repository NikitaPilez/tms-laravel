<?php

namespace App\Services;

use App\Mail\ResetPassword;
use App\Models\User;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgetPasswordService
{

    /**
     * @throws Exception
     */
    public function sendResetPasswordLink(string $email): void
    {
        $user = User::query()->where('email', $email)->first();

        if (!$user) {
            throw new Exception('User not found exception');
        }

        $record = DB::table('password_reset_tokens')->where('email', $email)->first();

        if ($record && Carbon::parse($record->created_at)->addSeconds(
                60
            )->isFuture()) {
            throw new Exception('Link was sent recently');
        }

        $token = Str::random(32);

        DB::table('password_reset_tokens')->upsert([
            'email' => $email,
            'token' => $token,
            'created_at' => Carbon::now()
        ], 'email');

        Mail::to($email)->send(new ResetPassword($token));
    }

    /**
     * @throws Exception
     */
    public function resetPassword(string $email, string $token, string $password)
    {
        $user = User::query()->where('email', $email)->first();

        if (!$user) {
            throw new Exception('User not found exception');
        }

        $record = DB::table('password_reset_tokens')->where('email', $email)->first();

        if (!($record->token === $token && Carbon::parse($record->created_at)->addSeconds(600)->isFuture())) {
            throw new Exception('Token wrong or expired');
        }

        $user->password = Hash::make($password);
        $user->save();
    }
}

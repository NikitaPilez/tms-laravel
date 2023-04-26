<?php

namespace App\Listeners;

use App\Models\UserLogin;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Jenssegers\Agent\Agent;

class SaveUserLoginInfo
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        $agent = new Agent();

        UserLogin::query()->create([
            'user_id' => $event->user->id,
            'platform' => $_SERVER['HTTP_SEC_CH_UA_PLATFORM'],
            'ip' => $_SERVER['REMOTE_ADDR'],
            'browser' => $agent->browser()
        ]);
    }
}

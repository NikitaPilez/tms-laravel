<?php

namespace App\Listeners;

use App\Events\UserLogged;
use App\Mail\NewLoginMail;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendLoggedUserNotification
{

    /**
     * Create the event listener.
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     */
    public function handle(Login $event): void
    {
        Mail::to('pileznikita99@gmail.com')->send(new NewLoginMail($event->user));
    }
}

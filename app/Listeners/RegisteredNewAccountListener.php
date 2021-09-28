<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewRegistration;
use App\Models\User;
use App\Providers\RegisteredNewAccount;

class RegisteredNewAccountListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(RegisteredNewAccount $event)
    {
        //
        $users = User::all()->where('role_id', '==', 3);
        // $users->first()->notify(new NewRegistration($event->user));
        Notification::send($users, new NewRegistration($event->user));
    }
}

<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NewRegistrationNotification;
use App\Models\User;
use App\Events\RegisteredNewAccountEvent;

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
    public function handle(RegisteredNewAccountEvent $event)
    {
        //
        $users = User::all()->where('role_id', '==', 3);
        // $users->first()->notify(new NewRegistrationNotificationNotification($event->user));
        Notification::send($users, new NewRegistrationNotification($event->user));
    }
}

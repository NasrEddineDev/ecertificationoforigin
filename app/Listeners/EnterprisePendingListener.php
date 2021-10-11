<?php

namespace App\Listeners;

use App\Events\EnterprisePendingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EnterprisePendingNotification;
use App\Models\User;

class EnterprisePendingListener implements ShouldQueue
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
     * @param  EnterprisePendingEvent  $event
     * @return void
     */
    public function handle(EnterprisePendingEvent $event)
    {
        //
        $users = User::all()->where('role_id', '==', 3);
        Notification::send($users, new EnterprisePendingNotification($event->certificate));
    }
}

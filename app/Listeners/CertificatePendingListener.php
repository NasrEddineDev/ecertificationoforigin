<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CertificatePendingNotification;
use App\Models\User;
use App\Events\CertificatePendingEvent;

class CertificatePendingListener implements ShouldQueue
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
    public function handle(CertificatePendingEvent $event)
    {
        //
        $users = User::all()->where('role_id', '==', 3);
        Notification::send($users, new CertificatePendingNotification($event->certificate));
    }
}

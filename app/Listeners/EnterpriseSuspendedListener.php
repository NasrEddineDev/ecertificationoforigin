<?php

namespace App\Listeners;

use App\Events\EnterpriseSuspendedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EnterpriseSuspendedNotification;

class EnterpriseSuspendedListener implements ShouldQueue
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
     * @param  EnterpriseSuspendedEvent  $event
     * @return void
     */
    public function handle(EnterpriseSuspendedEvent $event)
    {
        //
        Notification::send($event->certificate->enterprise->user, new EnterpriseSuspendedNotification($event->certificate));
    }
}

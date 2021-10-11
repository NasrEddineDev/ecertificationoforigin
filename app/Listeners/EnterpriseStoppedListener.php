<?php

namespace App\Listeners;

use App\Events\EnterpriseStoppedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\EnterpriseStoppedNotification;

class EnterpriseStoppedListener implements ShouldQueue
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
     * @param  EnterpriseStoppedEvent  $event
     * @return void
     */
    public function handle(EnterpriseStoppedEvent $event)
    {
        //
        Notification::send($event->certificate->enterprise->user, new EnterpriseStoppedNotification($event->certificate));
    }
}

<?php

namespace App\Listeners;

use App\Events\EnterpriseActivatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\EnterpriseActivatedNotification;
use Illuminate\Support\Facades\Notification;

class EnterpriseActivatedListener implements ShouldQueue
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
     * @param  EnterpriseActivatedEvent  $event
     * @return void
     */
    public function handle(EnterpriseActivatedEvent $event)
    {
        //
        Notification::send($event->enterprise->user, new EnterpriseActivatedNotification($event->enterprise));
    }
}

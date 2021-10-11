<?php

namespace App\Listeners;

use App\Events\CertificateRejectedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CertificateRejectedNotification;

class CertificateRejectedListener implements ShouldQueue
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
     * @param  CertificateRejectedEvent  $event
     * @return void
     */
    public function handle(CertificateRejectedEvent $event)
    {
        //
        Notification::send($event->certificate->enterprise->user, new CertificateRejectedNotification($event->certificate));
    }
}

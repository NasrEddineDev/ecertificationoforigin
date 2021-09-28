<?php

namespace App\Listeners;

use App\Providers\CertificateSignedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CertificateSignedNotification;

class CertificateSignedListener implements ShouldQueue
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
     * @param  CertificateSignedEvent  $event
     * @return void
     */
    public function handle(CertificateSignedEvent $event)
    {
        //
        Notification::send($event->certificate->enterprise->user, new CertificateSignedNotification($event->certificate));
    }
}

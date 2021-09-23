<?php

namespace App\Providers;

use App\Providers\CertificatePendingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CertificatePendingNotification1
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
     * @param  CertificatePendingEvent  $event
     * @return void
     */
    public function handle(CertificatePendingEvent $event)
    {
        //
    }
}

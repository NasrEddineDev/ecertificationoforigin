<?php

namespace App\Providers;

use App\Providers\CertificateSignedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CertificateSignedNotification
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
    }
}

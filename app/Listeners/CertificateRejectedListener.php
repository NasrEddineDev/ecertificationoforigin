<?php

namespace App\Listeners;

use App\Providers\CertificateRejectedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

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
    }
}

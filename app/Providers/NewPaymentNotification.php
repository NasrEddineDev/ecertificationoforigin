<?php

namespace App\Providers;

use App\Providers\NewPaymentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewPaymentNotification
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
     * @param  NewPaymentEvent  $event
     * @return void
     */
    public function handle(NewPaymentEvent $event)
    {
        //
    }
}

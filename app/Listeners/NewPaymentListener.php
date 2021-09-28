<?php

namespace App\Listeners;

use App\Providers\NewPaymentEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewPaymentListener implements ShouldQueue
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

<?php

namespace App\Providers;

use App\Providers\EnterprisePendingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EnterprisePendingNotification
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
     * @param  EnterprisePendingEvent  $event
     * @return void
     */
    public function handle(EnterprisePendingEvent $event)
    {
        //
    }
}

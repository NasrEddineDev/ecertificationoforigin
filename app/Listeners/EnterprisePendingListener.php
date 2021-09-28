<?php

namespace App\Listeners;

use App\Providers\EnterprisePendingEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EnterprisePendingListener implements ShouldQueue
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

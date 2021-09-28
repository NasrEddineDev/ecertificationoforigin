<?php

namespace App\Listeners;

use App\Providers\EnterpriseSuspendedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EnterpriseSuspendedListener implements ShouldQueue
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
     * @param  EnterpriseSuspendedEvent  $event
     * @return void
     */
    public function handle(EnterpriseSuspendedEvent $event)
    {
        //
    }
}

<?php

namespace App\Listeners;

use App\Providers\EnterpriseStoppedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EnterpriseStoppedListener implements ShouldQueue
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
     * @param  EnterpriseStoppedEvent  $event
     * @return void
     */
    public function handle(EnterpriseStoppedEvent $event)
    {
        //
    }
}

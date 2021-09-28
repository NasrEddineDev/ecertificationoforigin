<?php

namespace App\Listeners;

use App\Providers\EnterpriseActivatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EnterpriseActivatedListener implements ShouldQueue
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
     * @param  EnterpriseActivatedEvent  $event
     * @return void
     */
    public function handle(EnterpriseActivatedEvent $event)
    {
        //
    }
}

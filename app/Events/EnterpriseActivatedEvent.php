<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EnterpriseActivatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $enterprise;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($enterprise)
    {
        $this->enterprise = $enterprise;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
    public function broadcastWith()
    {
        return [            
            'status' => __($this->enterprise->status) ?? '',
            'type' => __($this->certificate->type) ?? '',
            'enterprise' => $this->enterprise,
            'enterprise_name' => App()->currentLocale() == 'ar' ? ($this->certificate->enterprise->name_ar ?? '') 
                                : (App()->currentLocale() == 'en' ? ($this->certificate->enterprise->name ?? '')
                                : ($this->certificate->enterprise->name_fr ?? ''))
        ];
    }
}

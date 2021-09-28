<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CertificateSignedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $certificate;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($certificate)
    {
        $this->certificate = $certificate;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('user.'. $this->certificate->enterprise->user->id);
    }
    public function broadcastWith()
    {
        return [            
            'certificate' => $this->certificate ?? '',
            'status' => __($this->certificate->status) ?? '',
            'dri_signature_date' => now(),
            'type' => __($this->certificate->type) ?? '',
            'name' => $this->certificate->enterprise->user->username ?? '',
            'email' => $this->certificate->enterprise->user->email ?? '',
            'enterprise_name' => App()->currentLocale() == 'ar' ? ($this->certificate->enterprise->name_ar ?? '') 
                                : (App()->currentLocale() == 'en' ? ($this->certificate->enterprise->name ?? '')
                                : ($this->certificate->enterprise->name_fr ?? ''))
        ];
    }
}

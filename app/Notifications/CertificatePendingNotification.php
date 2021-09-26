<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CertificatePendingNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($certificate)
    {
        //
        $this->certificate = $certificate;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            // 'certificate_id' => '$this->certificate->id',
            'certificate_id' => $this->certificate->id,
            'status' => $this->certificate->status,
            'name' => $this->certificate->enterprise->user->username,
            'email' => $this->certificate->enterprise->user->email,
            'enterprise_name_ar' => $this->certificate->enterprise->name_ar,
            'enterprise_name' => $this->certificate->enterprise->name,
            'enterprise_name_fr' => $this->certificate->enterprise->name_fr
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'notifications' => $this->certificate->enterprise->user->notifications,
            // 'certificate_id' => $this->certificate->id,
            // 'status' => $this->certificate->status,
            // 'name' => $this->certificate->enterprise->user->username,
            // 'email' => $this->certificate->enterprise->user->email,
            // 'enterprise_name_ar' => $this->certificate->enterprise->name_ar,
            // 'enterprise_name' => $this->certificate->enterprise->name,
            // 'enterprise_name_fr' => $this->certificate->enterprise->name_fr
        ]);
    }
}

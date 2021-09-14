<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewRegistration extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        //
        $this->user = $user;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    // public function toMail($notifiable)
    // {
    //     return (new MailMessage)
    //                 ->line('The introduction to the notification.')
    //                 ->action('Notification Action', url('/'))
    //                 ->line('Thank you for using our application!');
    // }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return json_encode([
            //
            'id' => $this->user->id,
            'name' => $this->user->username,
            'email' => $this->user->email,
            'enterprise_name_ar' => $this->user->enterprise->name_ar,
            'enterprise_name' => $this->user->enterprise->name,
            'enterprise_name_fr' => $this->user->enterprise->name_fr
        ]);
    }


    public function toBroadcast($notifiable)
    {
        return BroadcastMessage([
            'id' => $this->user->id,
            'name' => $this->user->username,
            'email' => $this->user->email,
            'enterprise_name_ar' => $this->user->enterprise->name_ar,
            'enterprise_name' => $this->user->enterprise->name,
            'enterprise_name_fr' => $this->user->enterprise->name_fr
        ]);
    }
}

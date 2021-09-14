<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\RegisteredNewAccountListener;
use App\Providers\RegisteredNewAccount;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        RegisteredNewAccount::class => [
            RegisteredNewAccountListener::class,
        ],
        EnterprisePendingEvent::class => [
            EnterprisePendingNotification::class,
        ],
        EnterpriseActivatedEvent::class => [
            EnterpriseActivatedNotification::class,
        ],
        EnterpriseSuspendedEvent::class => [
            EnterpriseSuspendedNotification::class,
        ],
        EnterpriseStoppedEvent::class => [
            EnterpriseStoppedNotification::class,
        ],
        CertificatePendingEvent::class => [
            CertificatePendingNotification::class,
        ],
        CertificateSignedEvent::class => [
            CertificateSignedNotification::class,
        ],
        CertificateRejectedEvent::class => [
            CertificateRejectedNotification::class,
        ],
        NewPaymentEvent::class => [
            NewPaymentNotification::class,
        ],
        'Illuminate\Auth\Events\Verified' => [
            'App\Listeners\LogVerifiedUser',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

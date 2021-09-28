<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\RegisteredNewAccountListener;
use App\Listeners\EnterprisePendingListener;
use App\Listeners\EnterpriseActivatedListener;
use App\Listeners\EnterpriseSuspendedListener;
use App\Listeners\EnterpriseStoppedListener;
use App\Listeners\CertificatePendingListener;
use App\Listeners\CertificateSignedListener;
use App\Listeners\CertificateRejectedListener;
use App\Providers\RegisteredNewAccount;
use App\Events\CertificatePendingEvent;

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
            EnterprisePendingListener::class,
        ],
        EnterpriseActivatedEvent::class => [
            EnterpriseActivatedListener::class,
        ],
        EnterpriseSuspendedEvent::class => [
            EnterpriseSuspendedListener::class,
        ],
        EnterpriseStoppedEvent::class => [
            EnterpriseStoppedListener::class,
        ],
        CertificatePendingEvent::class => [
            CertificatePendingListener::class,
        ],
        CertificateSignedEvent::class => [
            CertificateSignedListener::class,
        ],
        CertificateRejectedEvent::class => [
            CertificateRejectedListener::class,
        ],
        NewPaymentEvent::class => [
            NewPaymentListener::class,
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

<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Cerificate::class => CertificatePolicy::class,
        City::class => CityPolicy::class,
        Country::class => CountryPolicy::class,
        Dashboard::class => DashboardPolicy::class,
        Document::class => DocumentPolicy::class,
        Enterprise::class => EnterprisePolicy::class,
        ExportManager::class => ExportManagerPolicy::class,
        Importer::class => ImporterPolicy::class,
        Invoice::class => InvoicePolicy::class,
        Manager::class => ManagerPolicy::class,
        Payment::class => PaymentPolicy::class,
        Permission::class => PermissionPolicy::class,
        Product::class => ProductPolicy::class,
        Request::class => RequestPolicy::class,
        Signature::class => SignaturePolicy::class,
        State::class => StatePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('list-user', function () { return Auth::user()->role->name != 'user';});
        Gate::define('view-enterprise-user', function () { return Auth::user()->role->name != 'user';});

        Gate::define('update-user', [UserPolicy::class, 'update']);
    }
}

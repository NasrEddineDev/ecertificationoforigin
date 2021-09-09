<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('permissions')->insert([
            // user permissions
            [
                'name' => 'create-user',
                'description' => '',
                'group' => 'user',
            ], [
                'name' => 'view-user',
                'description' => '',
                'group' => 'user',
            ], [
                'name' => 'list-users',
                'description' => '',
                'group' => 'user',
            ], [
                'name' => 'update-user',
                'description' => '',
                'group' => 'user',
            ], [
                'name' => 'delete-user',
                'description' => '',
                'group' => 'user',
            ],
            // role permissions
            [
                'name' => 'create-role',
                'description' => '',
                'group' => 'role',
            ], [
                'name' => 'view-role',
                'description' => '',
                'group' => 'role',
            ], [
                'name' => 'list-roles',
                'description' => '',
                'group' => 'role',
            ], [
                'name' => 'update-role',
                'description' => '',
                'group' => 'role',
            ], [
                'name' => 'delete-role',
                'description' => '',
                'group' => 'role',
            ],
            // permission permissions
            [
                'name' => 'create-permission',
                'description' => '',
                'group' => 'permission',
            ], [
                'name' => 'view-permission',
                'description' => '',
                'group' => 'permission',
            ], [
                'name' => 'list-permissions',
                'description' => '',
                'group' => 'permission',
            ], [
                'name' => 'update-permission',
                'description' => '',
                'group' => 'permission',
            ], [
                'name' => 'delete-permission',
                'description' => '',
                'group' => 'permission',
            ],
            // certificate permissions
            [
                'name' => 'create-certificate',
                'description' => '',
                'group' => 'certificate',
            ], [
                'name' => 'view-certificate',
                'description' => '',
                'group' => 'certificate',
            ], [
                'name' => 'list-certificates',
                'description' => '',
                'group' => 'certificate',
            ], [
                'name' => 'update-certificate',
                'description' => '',
                'group' => 'certificate',
            ], [
                'name' => 'delete-certificate',
                'description' => '',
                'group' => 'certificate',
            ], [
                'name' => 'duplicate-certificate',
                'description' => '',
                'group' => 'certificate',
            ], [
                'name' => 'retrospective-certificate',
                'description' => '',
                'group' => 'certificate',
            ], [
                'name' => 'enterprise-certificate',
                'description' => '',
                'group' => 'certificate',
            ],
            // producer permissions
            [
                'name' => 'create-producer',
                'description' => '',
                'group' => 'producer',
            ], [
                'name' => 'view-producer',
                'description' => '',
                'group' => 'producer',
            ], [
                'name' => 'list-producers',
                'description' => '',
                'group' => 'producer',
            ], [
                'name' => 'update-producer',
                'description' => '',
                'group' => 'producer',
            ], [
                'name' => 'delete-producer',
                'description' => '',
                'group' => 'producer',
            ], [
                'name' => 'enterprise-producer',
                'description' => '',
                'group' => 'producer',
            ],
            // product permissions
            [
                'name' => 'create-product',
                'description' => '',
                'group' => 'product',
            ], [
                'name' => 'view-product',
                'description' => '',
                'group' => 'product',
            ], [
                'name' => 'list-products',
                'description' => '',
                'group' => 'product',
            ], [
                'name' => 'update-product',
                'description' => '',
                'group' => 'product',
            ], [
                'name' => 'delete-product',
                'description' => '',
                'group' => 'product',
            ], [
                'name' => 'enterprise-product',
                'description' => '',
                'group' => 'product',
            ],
            // importer permissions
            [
                'name' => 'create-importer',
                'description' => '',
                'group' => 'importer',
            ], [
                'name' => 'view-importer',
                'description' => '',
                'group' => 'importer',
            ], [
                'name' => 'list-importers',
                'description' => '',
                'group' => 'importer',
            ], [
                'name' => 'update-importer',
                'description' => '',
                'group' => 'importer',
            ], [
                'name' => 'delete-importer',
                'description' => '',
                'group' => 'importer',
            ], [
                'name' => 'filter-country-importer',
                'description' => '',
                'group' => 'importer',
            ], [
                'name' => 'enterprise-importer',
                'description' => '',
                'group' => 'importer',
            ],
            // enterprise permissions
            [
                'name' => 'create-enterprise',
                'description' => '',
                'group' => 'enterprise',
            ], [
                'name' => 'view-enterprise',
                'description' => '',
                'group' => 'enterprise',
            ], [
                'name' => 'list-enterprises',
                'description' => '',
                'group' => 'enterprise',
            ], [
                'name' => 'update-enterprise',
                'description' => '',
                'group' => 'enterprise',
            ], [
                'name' => 'delete-enterprise',
                'description' => '',
                'group' => 'enterprise',
            ], [
                'name' => 'filter-type-enterprise',
                'description' => '',
                'group' => 'enterprise',
            ],
            // manager permissions
            [
                'name' => 'create-manager',
                'description' => '',
                'group' => 'manager',
            ], [
                'name' => 'view-manager',
                'description' => '',
                'group' => 'manager',
            ], [
                'name' => 'list-managers',
                'description' => '',
                'group' => 'manager',
            ], [
                'name' => 'update-manager',
                'description' => '',
                'group' => 'manager',
            ], [
                'name' => 'delete-manager',
                'description' => '',
                'group' => 'manager',
            ],
            // signature permissions
            [
                'name' => 'create-signature',
                'description' => '',
                'group' => 'signature',
            ], [
                'name' => 'view-signature',
                'description' => '',
                'group' => 'signature',
            ], [
                'name' => 'list-signatures',
                'description' => '',
                'group' => 'signature',
            ], [
                'name' => 'update-signature',
                'description' => '',
                'group' => 'signature',
            ], [
                'name' => 'delete-signature',
                'description' => '',
                'group' => 'signature',
            ],
            // request permissions
            [
                'name' => 'create-request',
                'description' => '',
                'group' => 'request',
            ], [
                'name' => 'view-request',
                'description' => '',
                'group' => 'request',
            ], [
                'name' => 'list-requests',
                'description' => '',
                'group' => 'request',
            ], [
                'name' => 'update-request',
                'description' => '',
                'group' => 'request',
            ], [
                'name' => 'delete-request',
                'description' => '',
                'group' => 'request',
            ],
            // payment permissions
            [
                'name' => 'create-payment',
                'description' => '',
                'group' => 'payment',
            ], [
                'name' => 'dhahabia-payment',
                'description' => '',
                'group' => 'payment',
            ], [
                'name' => 'view-payment',
                'description' => '',
                'group' => 'payment',
            ], [
                'name' => 'balance-payment',
                'description' => '',
                'group' => 'payment',
            ], [
                'name' => 'list-payments',
                'description' => '',
                'group' => 'payment',
            ], [
                'name' => 'update-payment',
                'description' => '',
                'group' => 'payment',
            ], [
                'name' => 'delete-payment',
                'description' => '',
                'group' => 'payment',
            ], [
                'name' => 'enterprise-payment',
                'description' => '',
                'group' => 'payment',
            ],
            // setting permissions
            [
                'name' => 'create-setting',
                'description' => '',
                'group' => 'setting',
            ], [
                'name' => 'view-setting',
                'description' => '',
                'group' => 'setting',
            ], [
                'name' => 'list-settings',
                'description' => '',
                'group' => 'setting',
            ], [
                'name' => 'update-setting',
                'description' => '',
                'group' => 'setting',
            ], [
                'name' => 'delete-setting',
                'description' => '',
                'group' => 'setting',
            ],
            // invoice permissions
            [
                'name' => 'create-invoice',
                'description' => '',
                'group' => 'invoice',
            ], [
                'name' => 'view-invoice',
                'description' => '',
                'group' => 'invoice',
            ], [
                'name' => 'list-invoices',
                'description' => '',
                'group' => 'invoice',
            ], [
                'name' => 'update-invoice',
                'description' => '',
                'group' => 'invoice',
            ], [
                'name' => 'delete-invoice',
                'description' => '',
                'group' => 'invoice',
            ],
            // document permissions
            [
                'name' => 'create-document',
                'description' => '',
                'group' => 'document',
            ], [
                'name' => 'view-document',
                'description' => '',
                'group' => 'document',
            ], [
                'name' => 'list-documents',
                'description' => '',
                'group' => 'document',
            ], [
                'name' => 'update-document',
                'description' => '',
                'group' => 'document',
            ], [
                'name' => 'delete-document',
                'description' => '',
                'group' => 'document',
            ],
            // country permissions
            [
                'name' => 'create-country',
                'description' => '',
                'group' => 'country',
            ], [
                'name' => 'view-country',
                'description' => '',
                'group' => 'country',
            ], [
                'name' => 'list-countries',
                'description' => '',
                'group' => 'country',
            ], [
                'name' => 'update-country',
                'description' => '',
                'group' => 'country',
            ], [
                'name' => 'delete-country',
                'description' => '',
                'group' => 'country',
            ],
            // state permissions
            [
                'name' => 'create-state',
                'description' => '',
                'group' => 'state',
            ], [
                'name' => 'view-state',
                'description' => '',
                'group' => 'state',
            ], [
                'name' => 'list-states',
                'description' => '',
                'group' => 'state',
            ], [
                'name' => 'update-state',
                'description' => '',
                'group' => 'state',
            ], [
                'name' => 'delete-state',
                'description' => '',
                'group' => 'state',
            ],
            // city permissions
            [
                'name' => 'create-city',
                'description' => '',
                'group' => 'city',
            ], [
                'name' => 'view-city',
                'description' => '',
                'group' => 'city',
            ], [
                'name' => 'list-cities',
                'description' => '',
                'group' => 'city',
            ], [
                'name' => 'update-city',
                'description' => '',
                'group' => 'city',
            ], [
                'name' => 'delete-city',
                'description' => '',
                'group' => 'city',
            ],
            // logger permissions
            [
                'name' => 'create-logger',
                'description' => '',
                'group' => 'logger',
            ], [
                'name' => 'view-logger',
                'description' => '',
                'group' => 'logger',
            ], [
                'name' => 'list-loggers',
                'description' => '',
                'group' => 'logger',
            ], [
                'name' => 'update-logger',
                'description' => '',
                'group' => 'logger',
            ], [
                'name' => 'delete-logger',
                'description' => '',
                'group' => 'logger',
            ],
            // dashboard permissions
            [
                'name' => 'create-dashboard',
                'description' => '',
                'group' => 'dashboard',
            ], [
                'name' => 'view-dashboard',
                'description' => '',
                'group' => 'dashboard',
            ], [
                'name' => 'list-dashboards',
                'description' => '',
                'group' => 'dashboard',
            ], [
                'name' => 'update-dashboard',
                'description' => '',
                'group' => 'dashboard',
            ], [
                'name' => 'delete-dashboard',
                'description' => '',
                'group' => 'dashboard',
            ]

        ]);

        // Admin Permissions
        $role = Role::where('name', '=', "admin")->first();
        $permissions = Permission::all();
        foreach ($permissions as $permission) {
            if($permission) $role->givePermissionTo($permission);
        }

        // DRI Permissions
        $role = Role::where('name', '=', "dri_user")->first();
        $role->givePermissionTo(Permission::where('name', '=', "view-dashboard")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-dashboards")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-dashboard")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-dashboard")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-certificate")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-certificates")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-certificate")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-certificate")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-product")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-products")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-product")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-product")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-importer")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-importers")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-importer")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-importer")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-enterprise")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-enterprises")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-enterprise")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-enterprise")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-manager")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-managers")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-manager")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-manager")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-payments")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "balance-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "enterprise-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-producer")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-producers")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-producer")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-producer")->first());
        $role->givePermissionTo(Permission::where('name', '=', "enterprise-producer")->first());

        // User Permissions
        $role = Role::where('name', '=', "user")->first();
        $role->givePermissionTo(Permission::where('name', '=', "view-dashboard")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-dashboards")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-dashboard")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-dashboard")->first());
        $role->givePermissionTo(Permission::where('name', '=', "create-certificate")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-certificate")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-certificates")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-certificate")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-certificate")->first());
        $role->givePermissionTo(Permission::where('name', '=', "duplicate-certificate")->first());
        $role->givePermissionTo(Permission::where('name', '=', "retrospective-certificate")->first());
        $role->givePermissionTo(Permission::where('name', '=', "create-product")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-product")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-products")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-product")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-product")->first());
        $role->givePermissionTo(Permission::where('name', '=', "create-importer")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-importer")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-importers")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-importer")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-importer")->first());
        $role->givePermissionTo(Permission::where('name', '=', "create-manager")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-manager")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-managers")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-manager")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-manager")->first());
        $role->givePermissionTo(Permission::where('name', '=', "create-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-payments")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "dhahabia-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "balance-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "enterprise-payment")->first());
        $role->givePermissionTo(Permission::where('name', '=', "create-producer")->first());
        $role->givePermissionTo(Permission::where('name', '=', "view-producer")->first());
        $role->givePermissionTo(Permission::where('name', '=', "list-producers")->first());
        $role->givePermissionTo(Permission::where('name', '=', "update-producer")->first());
        $role->givePermissionTo(Permission::where('name', '=', "delete-producer")->first());
    }
}

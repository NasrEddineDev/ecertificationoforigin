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
        ],[
            'name' => 'view-user',
            'description' => '',
            'group' => 'user',
        ],[
            'name' => 'list-users',
            'description' => '',
            'group' => 'user',
        ],[
            'name' => 'update-user',
            'description' => '',
            'group' => 'user',
        ],[
            'name' => 'delete-user',
            'description' => '',
            'group' => 'user',
        ],
        // role permissions
        [
        'name' => 'create-role',
        'description' => '',
        'group' => 'role',
    ],[
        'name' => 'view-role',
        'description' => '',
        'group' => 'role',
    ],[
        'name' => 'list-roles',
        'description' => '',
        'group' => 'role',
    ],[
        'name' => 'update-role',
        'description' => '',
        'group' => 'role',
    ],[
        'name' => 'delete-role',
        'description' => '',
        'group' => 'role',
    ],
    // permission permissions
    [
    'name' => 'create-permission',
    'description' => '',
    'group' => 'permission',
],[
    'name' => 'view-permission',
    'description' => '',
    'group' => 'permission',
],[
    'name' => 'list-permissions',
    'description' => '',
    'group' => 'permission',
],[
    'name' => 'update-permission',
    'description' => '',
    'group' => 'permission',
],[
    'name' => 'delete-permission',
    'description' => '',
    'group' => 'permission',
],
// certificate permissions
[
'name' => 'create-certificate',
'description' => '',
'group' => 'certificate',
],[
'name' => 'view-certificate',
'description' => '',
'group' => 'certificate',
],[
'name' => 'list-certificates',
'description' => '',
'group' => 'certificate',
],[
'name' => 'update-certificate',
'description' => '',
'group' => 'certificate',
],[
'name' => 'delete-certificate',
'description' => '',
'group' => 'certificate',
],
// product permissions
[
'name' => 'create-product',
'description' => '',
'group' => 'product',
],[
'name' => 'view-product',
'description' => '',
'group' => 'product',
],[
'name' => 'list-products',
'description' => '',
'group' => 'product',
],[
'name' => 'update-product',
'description' => '',
'group' => 'product',
],[
'name' => 'delete-product',
'description' => '',
'group' => 'product',
],
// importer permissions
[
'name' => 'create-importer',
'description' => '',
'group' => 'importer',
],[
'name' => 'view-importer',
'description' => '',
'group' => 'importer',
],[
'name' => 'list-importers',
'description' => '',
'group' => 'importer',
],[
'name' => 'update-importer',
'description' => '',
'group' => 'importer',
],[
'name' => 'delete-importer',
'description' => '',
'group' => 'importer',
],
// enterprise permissions
[
'name' => 'create-enterprise',
'description' => '',
'group' => 'enterprise',
],[
'name' => 'view-enterprise',
'description' => '',
'group' => 'enterprise',
],[
'name' => 'list-enterprises',
'description' => '',
'group' => 'enterprise',
],[
'name' => 'update-enterprise',
'description' => '',
'group' => 'enterprise',
],[
'name' => 'delete-enterprise',
'description' => '',
'group' => 'enterprise',
],
// export manager permissions
[
'name' => 'create-export-manager',
'description' => '',
'group' => 'export-manager',
],[
'name' => 'view-export-manager',
'description' => '',
'group' => 'export-manager',
],[
'name' => 'list-export-managers',
'description' => '',
'group' => 'export-manager',
],[
'name' => 'update-export-manager',
'description' => '',
'group' => 'export-manager',
],[
'name' => 'delete-export-manager',
'description' => '',
'group' => 'export-manager',
],
// manager permissions
[
'name' => 'create-manager',
'description' => '',
'group' => 'manager',
],[
'name' => 'view-manager',
'description' => '',
'group' => 'certificate',
],[
'name' => 'list-managers',
'description' => '',
'group' => 'manager',
],[
'name' => 'update-manager',
'description' => '',
'group' => 'manager',
],[
'name' => 'delete-manager',
'description' => '',
'group' => 'manager',
],
// signature permissions
[
'name' => 'create-signature',
'description' => '',
'group' => 'signature',
],[
'name' => 'view-signature',
'description' => '',
'group' => 'signature',
],[
'name' => 'list-signatures',
'description' => '',
'group' => 'signature',
],[
'name' => 'update-signature',
'description' => '',
'group' => 'signature',
],[
'name' => 'delete-signature',
'description' => '',
'group' => 'signature',
],
// request permissions
[
'name' => 'create-request',
'description' => '',
'group' => 'request',
],[
'name' => 'view-request',
'description' => '',
'group' => 'request',
],[
'name' => 'list-requests',
'description' => '',
'group' => 'request',
],[
'name' => 'update-request',
'description' => '',
'group' => 'request',
],[
'name' => 'delete-request',
'description' => '',
'group' => 'request',
],
// payment permissions
[
'name' => 'create-payment',
'description' => '',
'group' => 'payment',
],[
'name' => 'view-payment',
'description' => '',
'group' => 'payment',
],[
'name' => 'list-payments',
'description' => '',
'group' => 'payment',
],[
'name' => 'update-payment',
'description' => '',
'group' => 'payment',
],[
'name' => 'delete-payment',
'description' => '',
'group' => 'payment',
],
// setting permissions
[
'name' => 'create-setting',
'description' => '',
'group' => 'setting',
],[
'name' => 'view-setting',
'description' => '',
'group' => 'setting',
],[
'name' => 'list-settings',
'description' => '',
'group' => 'setting',
],[
'name' => 'update-setting',
'description' => '',
'group' => 'setting',
],[
'name' => 'delete-setting',
'description' => '',
'group' => 'setting',
],
// invoice permissions
[
'name' => 'create-invoice',
'description' => '',
'group' => 'invoice',
],[
'name' => 'view-invoice',
'description' => '',
'group' => 'invoice',
],[
'name' => 'list-invoices',
'description' => '',
'group' => 'invoice',
],[
'name' => 'update-invoice',
'description' => '',
'group' => 'invoice',
],[
'name' => 'delete-invoice',
'description' => '',
'group' => 'invoice',
],
// document permissions
[
'name' => 'create-document',
'description' => '',
'group' => 'document',
],[
'name' => 'view-document',
'description' => '',
'group' => 'document',
],[
'name' => 'list-documents',
'description' => '',
'group' => 'document',
],[
'name' => 'update-document',
'description' => '',
'group' => 'document',
],[
'name' => 'delete-document',
'description' => '',
'group' => 'document',
],
// country permissions
[
'name' => 'create-country',
'description' => '',
'group' => 'country',
],[
'name' => 'view-country',
'description' => '',
'group' => 'country',
],[
'name' => 'list-countries',
'description' => '',
'group' => 'payment',
],[
'name' => 'update-country',
'description' => '',
'group' => 'country',
],[
'name' => 'delete-country',
'description' => '',
'group' => 'country',
],
// state permissions
[
'name' => 'create-state',
'description' => '',
'group' => 'state',
],[
'name' => 'view-state',
'description' => '',
'group' => 'state',
],[
'name' => 'list-states',
'description' => '',
'group' => 'state',
],[
'name' => 'update-state',
'description' => '',
'group' => 'state',
],[
'name' => 'delete-state',
'description' => '',
'group' => 'state',
],
// city permissions
[
'name' => 'create-city',
'description' => '',
'group' => 'city',
],[
'name' => 'view-city',
'description' => '',
'group' => 'city',
],[
'name' => 'list-cities',
'description' => '',
'group' => 'city',
],[
'name' => 'update-city',
'description' => '',
'group' => 'city',
],[
'name' => 'delete-city',
'description' => '',
'group' => 'city',
],
// logger permissions
[
'name' => 'create-city',
'description' => '',
'group' => 'city',
],[
'name' => 'view-city',
'description' => '',
'group' => 'city',
],[
'name' => 'list-cities',
'description' => '',
'group' => 'city',
],[
'name' => 'update-city',
'description' => '',
'group' => 'city',
],[
'name' => 'delete-city',
'description' => '',
'group' => 'city',
],
// dashboard permissions
[
'name' => 'create-dashboard',
'description' => '',
'group' => 'dashboard',
],[
'name' => 'view-dashboard',
'description' => '',
'group' => 'dashboard',
],[
'name' => 'list-dashboards',
'description' => '',
'group' => 'dashboard',
],[
'name' => 'update-dashboard',
'description' => '',
'group' => 'dashboard',
],[
'name' => 'delete-dashboard',
'description' => '',
'group' => 'dashboard',
]
        
        ]);

      $role = Role::where('name', '=', "Admin")->first();
      $permissions = Permission::all();
      foreach ($permissions as $permission) {
        $role->givePermissionTo($permission);
      }
    }
}
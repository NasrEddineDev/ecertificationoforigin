<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Profile;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([[
            'username'  => 'نصرالدين',
            'email' => 'n.guelfout@caci.dz',
            'password' => Hash::make('password'),
            'email_verified_at'  => date('Y-m-d H:i:s'),
            'role_id' => Role::where('name', 'admin')->first()->id,
            'profile_id' => Profile::where('firstname', 'nasr eddine')->first()->id,
        ],[
            'username'  => 'أمين',
            'email' => 'a.ouennadi@caci.dz',
            'password' => Hash::make('password'),
            'email_verified_at'  => date('Y-m-d H:i:s'),
            'role_id' => Role::where('name', 'dri_admin')->first()->id,
            'profile_id' => Profile::where('firstname', 'amine')->first()->id,
        ],[
            'username'  => 'كريم',
            'email' => 'k.toudert@caci.dz',
            'password' => Hash::make('password'),
            'email_verified_at'  => date('Y-m-d H:i:s'),
            'role_id' => Role::where('name', 'dri_user')->first()->id,
            'profile_id' => Profile::where('firstname', 'كريم')->first()->id,
        ],[
            'username'  => 'سوداني',
            'email' => 'o.soudani@caci.dz',
            'password' => Hash::make('password'),
            'email_verified_at'  => date('Y-m-d H:i:s'),
            'role_id' => Role::where('name', 'dri_user')->first()->id,
            'profile_id' => Profile::where('firstname', 'soudani')->first()->id,
        ],[
            'username'  => 'طرافي',
            'email' => 'b.tarafi@caci.dz',
            'password' => Hash::make('password'),
            'email_verified_at'  => date('Y-m-d H:i:s'),
            'role_id' => Role::where('name', 'dri_user')->first()->id,
            'profile_id' => Profile::where('firstname', 'tarafi')->first()->id,
        ],[
            'username'  => 'بسطال',
            'email' => 'a.bestal@caci.dz',
            'password' => Hash::make('password'),
            'email_verified_at'  => date('Y-m-d H:i:s'),
            'role_id' => Role::where('name', 'dri_user')->first()->id,
            'profile_id' => Profile::where('firstname', 'bestal')->first()->id,
        ],[
            'username'  => 'حمان',
            'email' => 'h.hamane@caci.dz',
            'password' => Hash::make('password'),
            'email_verified_at'  => date('Y-m-d H:i:s'),
            'role_id' => Role::where('name', 'dri_user')->first()->id,
            'profile_id' => Profile::where('firstname', 'hamane')->first()->id,
        ],[
            'username'  => 'عزوز',
            'email' => 'f.azzouz@caci.dz',
            'password' => Hash::make('password'),
            'email_verified_at'  => date('Y-m-d H:i:s'),
            'role_id' => Role::where('name', 'dri_user')->first()->id,
            'profile_id' => Profile::where('firstname', 'azzouz')->first()->id,
        ],[
            'username'  => 'أحسن',
            'email' => 'a.meliani@caci.dz',
            'password' => Hash::make('password'),
            'email_verified_at'  => date('Y-m-d H:i:s'),
            'role_id' => Role::where('name', 'user')->first()->id,
            'profile_id' => Profile::where('firstname', 'ahsan')->first()->id,
        ],[
            'username'  => 'فؤاد',
            'email' => 'f.hasni@caci.dz',
            'password' => Hash::make('password'),
            'email_verified_at'  => date('Y-m-d H:i:s'),
            'role_id' => Role::where('name', 'user')->first()->id,
            'profile_id' => Profile::where('firstname', 'fouad')->first()->id,
        ],[
            'username'  => 'سيف الدين',
            'email' => 'customer.caci@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at'  => date('Y-m-d H:i:s'),
            'role_id' => Role::where('name', 'user')->first()->id,
            'profile_id' => Profile::where('firstname', 'seifeddine')->first()->id,
        ],[
            'username'  => 'محمد',
            'email' => 'eurl.nakhla.djamila@gmail.com',
            'password' => Hash::make('password'),
            'email_verified_at'  => date('Y-m-d H:i:s'),
            'role_id' => Role::where('name', 'user')->first()->id,
            'profile_id' => Profile::where('firstname', 'محمد')->first()->id
        ]]);
    }
}

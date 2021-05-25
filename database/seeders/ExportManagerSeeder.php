<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;

class ExportManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('export_managers')->insert([[
            'firstname'  => 'nasreddine1',
            'lastname' => 'mohamed1',
            'birthday'  => date('Y-m-d H:i:s'),
            'gender' => '1',
            'position' => 'Agent',
            'address' => 'Said hamdin Alger',
            'email' => 'customer.caci@gmail.com',
            'mobile' => '065482474785',
            'tel' => '023456789',
        ],[
            'firstname'  => 'aek1',
            'lastname' => 'sebti1',
            'birthday'  => date('Y-m-d H:i:s'),
            'gender' => '1',
            'position' => 'Membre',
            'address' => 'Route de l\'Aéroport . Dar El Beida.Bp 162 Alger',
            'email' => 'customer.caci@gmail.com',
            'mobile' => '065482474785',
            'tel' => '023456789',
        ],[
            'firstname'  => 'ahmed1',
            'lastname' => 'guelfout1',
            'birthday'  => date('Y-m-d H:i:s'),
            'gender' => '1',
            'position' => 'Administrator',
            'address' => 'Chemin Abdelkader Gadouche.Hydra.Bp 340.Cité Malki.Ben Aknoun Alger',
            'email' => 'customer.caci@gmail.com',
            'mobile' => '065482474785',
            'tel' => '023456789',
        ]]);
    }
}

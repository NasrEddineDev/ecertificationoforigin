<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ManagerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('managers')->insert([[
            'firstname'  => 'nasreddine',
            'lastname' => 'mohamed',
            'birthday'  => date('Y-m-d H:i:s'),
            'gender' => '1',
            'address' => 'Said hamdin Alger',
            'email' => 'customer.caci@gmail.com',
            'mobile' => '065482474785',
            'tel' => '023456789',
            'city_id' => '45',
        ],[
            'firstname'  => 'aek',
            'lastname' => 'sebti',
            'birthday'  => date('Y-m-d H:i:s'),
            'gender' => '1',
            'address' => 'Route de l\'Aéroport . Dar El Beida.Bp 162 Alger',
            'email' => 'customer.caci@gmail.com',
            'mobile' => '065482474785',
            'tel' => '023456789',
            'city_id' => '45',
        ],[
            'firstname'  => 'ahmed',
            'lastname' => 'guelfout',
            'birthday'  => date('Y-m-d H:i:s'),
            'gender' => '1',
            'address' => 'Chemin Abdelkader Gadouche.Hydra.Bp 340.Cité Malki.Ben Aknoun Alger',
            'email' => 'customer.caci@gmail.com',
            'mobile' => '065482474785',
            'tel' => '023456789',
            'city_id' => '45',
        ],[
            'firstname'  => 'منير',
            'lastname' => 'عرسلان',
            'birthday'  => date('Y-m-d H:i:s'),
            'gender' => '1',
            'address' => 'حي الورود المسيلة الجزائر',
            'email' => 'eurl.nakhla.djamila@gmail.com',
            'mobile' => '00213655288300',
            'tel' => '',
            'city_id' => '45',
        ]]);
    }
}

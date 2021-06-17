<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ImporterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('importers')->insert([[
            'name'  => 'mohamed',
            'category_id' => '06',
            'legal_form' => '1',
            'type' => '2',
            'address' => 'Said hamdin Alger',
            'email' => 'importer1.caci@gmail.com',
            'mobile' => '065482474785',
            'website' => 'abdullah.dz',
            'tel' => '023456789',
            'fax' => '023456789',
            'enterprise_id' => '1',
            'state_id' => '45',
        ],[
            'name'  => 'abdullah',
            'category_id' => '06',
            'legal_form' => '1',
            'type' => '2',
            'address' => 'Said hamdin Alger',
            'email' => 'importer2.caci@gmail.com',
            'mobile' => '065482474786',
            'website' => 'abdullah.dz',
            'tel' => '023456781',
            'fax' => '023456789',
            'enterprise_id' => '1',
            'state_id' => '45',
        ],[
            'name'  => 'abdurrahman',
            'category_id' => '06',
            'legal_form' => '1',
            'type' => '2',
            'address' => 'Said hamdin Alger',
            'email' => 'importer3.caci@gmail.com',
            'mobile' => '065482474787',
            'website' => 'abdullah.dz',
            'tel' => '023456780',
            'fax' => '023456789',
            'enterprise_id' => '1',
            'state_id' => '45',
        ]]);
    }
}

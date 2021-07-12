<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('settings')->insert([[
            'name' => 'Offers List',
            'value' => '5,10,15,20,50,100,200',
        ],[
            'name' => 'Unit Price',
            'value' => '500',
        ],[
            'name' => 'Username Poste',
            'value' => 'CACIAPI',
        ],[
            'name' => 'Password Poste',
            'value' => 'CACI2021',
        ],[
            'name' => 'Order Registration Url Poste',
            'value' => 'https://webmerchant.poste.dz/payment/rest/register.do',
        ],[
            'name' => 'Order Status Url Poste',
            'value' => 'https://webmerchant.poste.dz/payment/rest/getOrderStatus.do',
        ],[
            'name' => 'Order Status Extended Url Poste',
            'value' => 'https://webmerchant.poste.dz/payment/rest/getOrderStatusExtended.do',
        ],[
            'name' => 'File Path Of The Round Stamp AR',
            'value' => 'data/documents/round_stamp_ar.png',
        ],[
            'name' => 'File Path Of The Round Stamp EN',
            'value' => 'data/documents/round_stamp_en.png',
        ],[
            'name' => 'AGCE ORIGINATOR ID',
            'value' => 'CACI-6523985471',
        ],[
            'name' => 'File Path Of The AGCE SSL Certificate',
            'value' => 'documents/caci.crt',
        ],[
            'name' => 'File Path Of The AGCE SSL Key',
            'value' => 'documents/caci.key',
        ],[
            'name' => 'Activate Digital Signature',
            'value' => 'No',
        ]]);
    }
}

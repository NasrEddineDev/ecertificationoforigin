<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('profiles')->insert([[
            'firstname'  => 'nasr eddine',
            'lastname'  => '',
            'birthday' => null,
            'gender'  => null,
            'address'  => '',
            'mobile'  => '',
            'signature'  => '1_signature.png',
            'square_stamp'  => '1_square_stamp.png',
            'round_stamp' => '1_round_stamp.png',
            'agce_user_id' => 'ouennadi.amine',
            'city_id' => '115',
            'picture' => '',
            'language' => 'ar',
            'theme' => 'default',
        ],[
            'firstname'  => 'kamel',
            'lastname'  => '',
            'birthday' => null,
            'gender'  => null,
            'address'  => '',
            'mobile'  => '',
            'signature' => '2_signature.png',
            'square_stamp' => '2_square_stamp.png',
            'round_stamp' => '2_stamp.png',
            'agce_user_id' => 'meskine.kamel',
            'city_id' => '110',
            'picture' => '',
            'language' => 'ar',
            'theme' => 'default',
        ],[
            'firstname'  => 'كريم',
            'lastname'  => 'تودرت',
            'birthday' => null,
            'gender'  => null,
            'address'  => '',
            'mobile'  => '',
            'signature' => '3_signature.png',
            'square_stamp' => '3_square_stamp.png',
            'round_stamp' => '',
            'agce_user_id' => 'ouennadi.amine',
            'city_id' => '105',
            'picture' => '',
            'language' => 'ar',
            'theme' => 'default',
        ],[
            'firstname'  => 'soudani',
            'lastname'  => 'soudani',
            'birthday' => null,
            'gender'  => null,
            'address'  => '',
            'mobile'  => '',
            'signature' => '4_signature.png',
            'square_stamp' => '4_square_stamp.png',
            'round_stamp' => '',
            'agce_user_id' => 'ouennadi.amine',
            'city_id' => '100',
            'picture' => '',
            'language' => 'ar',
            'theme' => 'default',
        ],[
            'firstname'  => 'tarafi',
            'lastname'  => 'tarafi',
            'birthday' => null,
            'gender'  => null,
            'address'  => '',
            'mobile'  => '',
            'signature' => '5_signature.png',
            'square_stamp' => '5_square_stamp.png',
            'round_stamp' => '',
            'agce_user_id' => 'ouennadi.amine',
            'city_id' => '1',
            'picture' => '',
            'language' => 'ar',
            'theme' => 'default',
        ],[
            'firstname'  => 'bestal',
            'lastname'  => 'bestal',
            'birthday' => null,
            'gender'  => null,
            'address'  => '',
            'mobile'  => '',
            'signature' => '6_signature.png',
            'square_stamp' => '6_square_stamp.png',
            'round_stamp' => '',
            'agce_user_id' => 'ouennadi.amine',
            'city_id' => '5',
            'picture' => '',
            'language' => 'ar',
            'theme' => 'default',
        ],[
            'firstname'  => 'hamane',
            'lastname'  => 'hamane',
            'birthday' => null,
            'gender'  => null,
            'address'  => '',
            'mobile'  => '',
            'signature' => '7_signature.png',
            'square_stamp' => '7_square_stamp.png',
            'round_stamp' => '',
            'agce_user_id' => 'ouennadi.amine',
            'city_id' => '10',
            'picture' => '',
            'language' => 'ar',
            'theme' => 'default',
        ],[
            'firstname'  => 'azzouz',
            'lastname'  => 'azzouz',
            'birthday' => null,
            'gender'  => null,
            'address'  => '',
            'mobile'  => '',
            'signature' => '8_signature.png',
            'square_stamp' => '8_square_stamp.png',
            'round_stamp' => '',
            'agce_user_id' => 'ouennadi.amine',
            'city_id' => '15',
            'picture' => '',
            'language' => 'ar',
            'theme' => 'default',
        ],[
            'firstname'  => 'mohamed',
            'lastname'  => '',
            'birthday' => null,
            'gender'  => null,
            'address'  => '',
            'mobile'  => '',
            'signature' => '9_signature.png',
            'square_stamp' => '9_square_stamp.png',
            'round_stamp' => '9_round_stamp.png',
            'agce_user_id' => 'ouennadi.amine',
            'city_id' => '20',
            'picture' => '',
            'language' => 'ar',
            'theme' => 'default',
        ],[
            'firstname'  => 'fouad',
            'lastname'  => '',
            'birthday' => null,
            'gender'  => null,
            'address'  => '',
            'mobile'  => '',
            'signature' => '10_signature.png',
            'square_stamp' => '10_square_stamp.png',
            'round_stamp' => '10_round_stamp.png',
            'agce_user_id' => 'ouennadi.amine',
            'city_id' => '25',
            'picture' => '',
            'language' => 'ar',
            'theme' => 'default',
        ],[
            'firstname'  => 'mohamed 1',
            'lastname'  => '',
            'birthday' => null,
            'gender'  => null,
            'address'  => '',
            'mobile'  => '',
            'signature' => '11_signature.png',
            'square_stamp' => '11_square_stamp.png',
            'round_stamp' => '11_round_stamp.png',
            'agce_user_id' => 'ouennadi.amine',
            'city_id' => '30',
            'picture' => '',
            'language' => 'ar',
            'theme' => 'default',
        ],[
            'firstname'  => 'محمد',
            'lastname'  => '',
            'birthday' => null,
            'gender'  => null,
            'address'  => '',
            'mobile'  => '',
            'signature' => '12_signature.png',
            'square_stamp' => '12_square_stamp.png',
            'round_stamp' => '12_round_stamp.png',
            'agce_user_id' => 'ouennadi.amine',
            'city_id' => '35',
            'picture' => '',
            'language' => 'ar',
            'theme' => 'default',
        ]]);
    }
}

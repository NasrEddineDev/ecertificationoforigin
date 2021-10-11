<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;
use App\Models\Manager;

class EnterpriseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('enterprises')->insert([[
            'name' => 'AADL / Agence Nationale de l\'Amélioration et du Dévelopement du Logement ',
            'name_ar' => 'عدل، الوكالة الوطنية لتحسين السكن وتطويره',
            'name_fr' => 'AADL / Agence Nationale de l\'Amélioration et du Dévelopement du Logement ',
            'status' => 'ACTIVATED',
            'balance' => '100',
            // 'activity_type' => '05',
            // 'activity_type_name' => '',            
            'legal_form' => '2',
            'exporter_type' => '1',
            'rc' => '1_rc.jpg',
            'rc_number' => '54546784',
            'nif' => '1_nis.png',
            'nif_number' => '54546784',
            'nis' => '1_nif.png',
            'nis_number' => '54546784',
            'address_ar' => 'سعيد حمدين، العاصمة',
            'address' => 'Said hamdin Algiers',
            'address_fr' => 'Said hamdin Alger',
            'email' => 'customer.caci@gmail.com',
            'mobile' => '065482474785',
            'tel' => '021 56 14 95',
            'fax'  => '021 56 32 41',
            'website' => 'http://www.aadl.com.dz',
            'user_id' => User::where('username', 'فؤاد')->first()->id,
            'manager_id' => Manager::where('firstname', 'nasreddine')->first()->id,
            'city_id' => '10',
        ],[
            'name' => 'ALPHYT',
            'name_ar' => 'ألفيت',
            'name_fr' => 'ALPHYT',
            'status' => '1',
            'balance' => '100',
            // 'activity_type' => '06',
            // 'activity_type_name' => '',
            'legal_form' => '1',
            'exporter_type' => '2',
            'rc' => '2_rc.jpg',
            'rc_number' => '54546784',
            'nif' => '2_nis.png',
            'nif_number' => '54546784',
            'nis' => '2_nif.png',
            'nis_number' => '54546784',
            // 'export_activity_code' => '07',
            'address' => 'Route de l\'Aéroport . Dar El Beida.Bp 162 Alger',
            'address_ar' => 'Route de l\'Aéroport . Dar El Beida.Bp 162 Alger',
            'address_fr' => 'Route de l\'Aéroport . Dar El Beida.Bp 162 Alger',
            'email' => 'customer.caci@gmail.com',
            'mobile' => '065482474785',
            'tel' => '023456789',
            'fax'  => '023456789',
            'website' => 'http://www.alphyt.com',
            'user_id' => User::where('username', 'محمد 01')->first()->id,
            'manager_id' => Manager::where('firstname', 'aek')->first()->id,
            'city_id' => '15',
        ],[
            'name' => 'Ambassade de l\'Etat du Koweit',
            'name_ar' => 'سفارة دولة الكويت',
            'name_fr' => 'Embassy of Kuwait State',
            'status' => '0',
            'balance' => '100',
            // 'activity_type' => '05',
            // 'activity_type_name' => '',
            'legal_form' => '2',
            'exporter_type' => '1',
            'rc' => '3_rc.jpg',
            'rc_number' => '54546784',
            'nif' => '3_nis.png',
            'nif_number' => '54546784',
            'nis' => '3_nif.png',
            'nis_number' => '54546784',
            // 'export_activity_code' => '07',
            'address' => 'chemin Abdelkader Gadouche.Hydra.Bp 340.Cité Malki.Ben Aknoun Alger',
            'address_ar' => 'chemin Abdelkader Gadouche.Hydra.Bp 340.Cité Malki.Ben Aknoun Alger',
            'address_fr' => 'chemin Abdelkader Gadouche.Hydra.Bp 340.Cité Malki.Ben Aknoun Alger',
            'email' => 'customer.caci@gmail.com',
            'mobile' => '065482474785',
            'tel' => '023456789',
            'fax'  => '023456789',
            'website' => 'www.algeria.gov.kw',
            'user_id' => User::where('username', 'محمد 02')->first()->id,
            'manager_id' => Manager::where('firstname', 'ahmed')->first()->id,
            'city_id' => '20',
        ],[
            'name' => 'ش و ذ م م النخلة الجميلة للإستيراد والتصدير',
            'name_ar' => 'ش و ذ م م النخلة الجميلة للإستيراد والتصدير',
            'name_fr' => 'ش و ذ م م النخلة الجميلة للإستيراد والتصدير',
            'status' => '2',
            'balance' => '1000',
            // 'activity_type' => '05',
            // 'activity_type_name' => '',
            'legal_form' => '2',
            'exporter_type' => '1',
            'rc' => '3_rc.jpg',
            'rc_number' => '28/01-0564134B16',
            'nif' => '3_nis.png',
            'nif_number' => '001628056413487',
            'nis' => '3_nif.png',
            'nis_number' => '54546784',
            // 'export_activity_code' => '07',
            'address' => 'حي الورود المسيلة الجزائر',
            'address_ar' => 'حي الورود المسيلة الجزائر',
            'address_fr' => 'حي الورود المسيلة الجزائر',
            'email' => 'eurl.nakhla.djamila@gmail.com',
            'mobile' => '00213550947623',
            'tel' => '',
            'fax'  => '',
            'website' => '',
            'user_id' => User::where('username', 'محمد')->first()->id,
            'manager_id' => Manager::where('lastname', 'عرسلان')->first()->id,
            'city_id' => '25',
        ]]);
    }
}

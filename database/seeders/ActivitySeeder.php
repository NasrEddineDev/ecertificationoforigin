<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('activities')->insert([[
            'code' => '701101',
            'name'  => '',
            'name_ar' => 'تصدير كل المواد الزراعية الغذائية (الطازجة، المبردة، المثلجة أو المجمدة)',
            'name_fr' => 'Exportation de tous les produits agroalimentaires (frais, réfrigérés, surgelés ou congelés)',
            'description' => '',
        ],[
            'code' => '702101',
            'name'  => '',
            'name_ar' => 'تصدير المواد الإصطناعية و المصنعة ماعدا المحروقات',
            'name_fr' => 'Exportation de tous les produits industriels manufacturés hors hydrocarbures',
            'description' => '',
        ],[
            'code' => '702102',
            'name'  => '',
            'name_ar' => 'تصدير كل المواد الغير محددة في مكان اخر، ماعدا المحروقات كالنباتات، المواد الخاصة بزراعة الأزهار، الحيوانات، إلخ',
            'name_fr' => 'Exportation de tous produits, hors hydrocarbures, non désignés ailleurs tels que les plantes, produits de la floriculture, d´animaux, etc',
            'description' => '',
        ],[
            'code' => '702103',
            'name'  => '',
            'name_ar' => 'تصدير كل المواد الصيدلانية و كل المواد و الأدوات الموجهة لتغليف المواد الصيدلانية',
            'name_fr' => 'Exportation de tous produits pharmaceutiques et de tous produits et articles destinés à l´emballage des produits pharmaceutiques',
            'description' => '',
        ]]);
    }
}

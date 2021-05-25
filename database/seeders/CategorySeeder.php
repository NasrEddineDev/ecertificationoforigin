<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('categories')->insert([[
            'number' => 1,
            'name'  => 'Livestock, Livestock products and agricultural products',
            'name_ar' => 'المنتوجات الزراعية، التربية الحيوانية ومنتجاتها',
            'name_fr' => 'Elevage, produits de l’élevage et produits agricoles',
            'description' => '',
        ],[
            'number' => 2,
            'name'  => 'Agro-industrial products',
            'name_ar' => 'منتجات الصناعات الغذائية',
            'name_fr' => 'Produits agro-industriels',
            'description' => '',
        ],[
            'number' => 3,
            'name'  => 'Fishery products',
            'name_ar' => 'المنتجات البحرية والصيد البحري',
            'name_fr' => 'Produits de la pêche',
            'description' => '',
        ],[
            'number' => 4,
            'name'  => 'Mining products',
            'name_ar' => 'منتجات المناجم',
            'name_fr' => 'Produits miniers',
            'description' => '',
        ],[
            'number' => 5,
            'name'  => 'Energy products and petrochemical products',
            'name_ar' => 'منتجات الطاقة والمنتجات البتروكيماوية',
            'name_fr' => 'Produits énergétiques et produits pétrochimiques',
            'description' => '',
        ],[
            'number' => 6,
            'name'  => 'Chemical, cosmetic, pharmaceutical and veterinary products',
            'name_ar' => 'المنتجات الكيماوية، التجميلية، الصيدلانية والبيطرية',
            'name_fr' => 'Produits chimiques, cosmétiques, pharmaceutiques et vétérinaires',
            'description' => '',
        ],[
            'number' => 7,
            'name'  => 'Plastic products, rubber products and glass products',
            'name_ar' => 'منتجات البلاستيك ومنتجات المطاط والزجاج',
            'name_fr' => 'Produits plastiques, produits en caoutchouc et produits en verre',
            'description' => '',
        ],[
            'number' => 8,
            'name'  => 'Iron and metal products',
            'name_ar' => 'منتجات المعادن والصلب',
            'name_fr' => 'Produits sidérurgiques et métalliques',
            'description' => '',
        ],[
            'number' => 9,
            'name'  => 'Ferrous and nonferrous waste',
            'name_ar' => 'النفايات الحديدية وغير الحديدية',
            'name_fr' => 'Déchets ferreux et non ferreux',
            'description' => '',
        ],[
            'number' => 10,
            'name'  => 'Engineering industry equipment, materials and products',
            'name_ar' => 'معدات، مواد ومنتجات الصناعة الميكانيكية',
            'name_fr' => 'Equipements, matériels et produits de l’industrie mécanique',
            'description' => '',
        ],[
            'number' => 11,
            'name'  => 'Electric Equipment and Electronics',
            'name_ar' => 'معدات وأدوات كهربائية وإلكترونية',
            'name_fr' => 'Equipements et articles électriques, électroniques',
            'description' => '',
        ],[
            'number' => 12,
            'name'  => 'Building materials and ceramics',
            'name_ar' => 'مواد البناء والسيراميك',
            'name_fr' => 'Matériaux de construction et céramique',
            'description' => '',
        ],[
            'number' => 13,
            'name'  => 'Cork and wooden articles',
            'name_ar' => 'فلين ومواد الخشبية',
            'name_fr' => 'Liège et articles en bois',
            'description' => '',
        ],[
            'number' => 14,
            'name'  => 'Paper and cardboard',
            'name_ar' => 'ورق وكرتون',
            'name_fr' => 'Papier et carton',
            'description' => '',
        ],[
            'number' => 15,
            'name'  => 'Publishing and Graphic Design',
            'name_ar' => 'النشر وفنون التصوير',
            'name_fr' => 'Edition et arts graphiques',
            'description' => '',
        ],[
            'number' => 16,
            'name'  => 'Leather goods, leather and skin products',
            'name_ar' => 'المصنوعات الجلدية والجلود',
            'name_fr' => 'Produits de la maroquinerie, cuirs et peaux',
            'description' => '',
        ],[
            'number' => 17,
            'name'  => 'Textile and articles of clothing',
            'name_ar' => 'الاقمشة والمنسوجات ومعداتها',
            'name_fr' => 'Textile et articles de confection',
            'description' => '',
        ],[
            'number' => 18,
            'name'  => 'Craft products',
            'name_ar' => 'منتجات الحرف اليدوية',
            'name_fr' => 'Produits de l’artisanat',
            'description' => '',
        ]]);
    }
}

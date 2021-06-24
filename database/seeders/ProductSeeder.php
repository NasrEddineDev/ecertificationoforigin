<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\SubCategory;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('products')->insert([[
            'name'  => 'TV',
            'description' => 'TV Extra plat',
            // 'order_number'  => '12545cx',
            'brand' => '2',
            'hs_code' => '74785',
            'measure_unit' => 'U',
            // 'net_weight' => '2000',
            // 'real_weight' => '2500',
            'sub_category_id' => SubCategory::where('name', 'Display, Intercoms')->first()->id,
            'enterprise_id' => '1',
            'customs_tariff_id' => null,
        ],[
            'name'  => 'Laptop',
            'description' => 'Laptop HP',
            // 'order_number'  => '1245cx',
            'brand' => '1',
            'hs_code' => '74785',
            'measure_unit' => 'U',
            // 'net_weight' => '2000',
            // 'real_weight' => '2500',
            'sub_category_id' => SubCategory::where('name', 'Display, Intercoms')->first()->id,
            'enterprise_id' => '1',
            'customs_tariff_id' => null,
        ],[
            'name'  => 'PC',
            'description' => 'PC Desktop',
            // 'order_number'  => 'fd45444',
            'brand' => '2',
            'hs_code' => '74785',
            'measure_unit' => 'U',
            // 'net_weight' => '2000',
            // 'real_weight' => '2500',
            'sub_category_id' => SubCategory::where('name', 'Display, Intercoms')->first()->id,
            'enterprise_id' => '1',
            'customs_tariff_id' => null,
        ],[
            'name'  => 'Printer',
            'description' => 'Epson SX130',
            // 'order_number'  => '12545cx',
            'brand' => '2',
            'hs_code' => '74785',
            'measure_unit' => 'U',
            // 'net_weight' => '2000',
            // 'real_weight' => '2500',
            'sub_category_id' => SubCategory::where('name', 'Display, Intercoms')->first()->id,
            'enterprise_id' => '1',
            'customs_tariff_id' => null,
        ]]);
    }
}

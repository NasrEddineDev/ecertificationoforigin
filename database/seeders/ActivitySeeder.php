<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ArabicActivityImport;
use App\Imports\FrenchActivityImport;

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

        Excel::import(new ArabicActivityImport, database_path() . '/data/activities/CACI_840_18042021_AR.xlsx');

        Excel::import(new FrenchActivityImport, database_path() . '/data/activities/CACI_840_18042021_FR.xlsx');
    }
}

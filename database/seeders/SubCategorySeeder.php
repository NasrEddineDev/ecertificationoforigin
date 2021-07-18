<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Role;
use App\Models\Profile;
use App\Models\Category;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\CategoryImport;
use Illuminate\Support\Arr;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Excel::import(new CategoryImport, database_path() . '/data/categories/Products Categories.xlsx');
    }
}

<?php

namespace App\Imports;

use App\Models\SubCategory;
use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class ArabicActivityImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     // if (!empty($row['Subcategory'])){
    //     //     return new Category([
    //     //         'number' => $row['Category'],
    //     //         'name'  => $row['English'],
    //     //         'name_ar' => $row['العربية'],
    //     //         'name_fr' => $row['Français'],
    //     //         'description' => '',
    //     //     ]);
    //     // }
    //     // else{
    //         return new SubCategory([
    //             'number' => $row[1] ? $row[1] : '-1',
    //             'name'  => $row[3],
    //             'name_ar' => $row[2],
    //             'name_fr' => $row[4],
    //             'description' => '',
    //             'category_id' => Category::where('number', $row[0])->first()->id,

    //         ]);
    //     // }

    // }

    public function collection(Collection $rows)
    {
        $group = '';
        foreach ($rows as $row) 
        {
            if (empty($row[2]) && !empty($row[1])) $group = $row[1];
            else if (!empty($row[2]) && is_numeric($row[2]))
                    DB::table('activities')->insert([
                        'code' => $row[2],
                        'name_ar' => $row[1] ,
                        'description' => '',
                        'group_ar' => $group,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ]);

        }
    }
}

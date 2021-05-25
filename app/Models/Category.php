<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory; 
    protected $fillable = [
        'number',
        'name',
        'name_ar',
        'name_fr',
        'description',
    ];
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}

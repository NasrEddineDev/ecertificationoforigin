<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;    
    protected $fillable = [
        'number',
        'name',
        'name_ar',
        'name_fr',
        'description',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function Category()
    {
        return $this->hasOne(Category::class);
    }
}

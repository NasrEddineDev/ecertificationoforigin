<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class SubCategory extends Model
{
    use HasFactory, LogsActivity;   
    protected static $logName = 'subcategory';
    static $logFillable = true;
    protected $fillable = [
        'number',
        'name',
        'name_ar',
        'name_fr',
        'category_id',
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

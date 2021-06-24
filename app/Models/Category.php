<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use HasFactory, LogsActivity;
    protected static $logName = 'category';
    static $logFillable = true;
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
    public function importers()
    {
        return $this->hasMany(Importer::class);
    }
    public function producers()
    {
        return $this->hasMany(Producer::class);
    }
}

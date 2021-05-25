<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        'code', 
        'name', 
        'name_ar', 
        'name_fr'
    ];
    public function enterprises()
    {
        return $this->belongsToMany(Enterprise::class, 'enterprises_activities', 'enterprise_id', 'activity_id')
        ->using(EnterpriseActivity::class)
        ->withTimestamps();
    }
}

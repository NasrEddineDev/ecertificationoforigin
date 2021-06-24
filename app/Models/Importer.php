<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Importer extends Model
{
    use HasFactory, LogsActivity;
    protected static $logName = 'importer';

    static $logFillable = true;
    protected $fillable = [
        'name',
        'legal_form',
        'activity_type_name',
        'address',
        'email',
        'mobile',
        'tel',
        'website',
        'fax',
        'category_id',
        'enterprise_id',
        'state_id',
    ];

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }
    public function state()
    {
        return $this->belongsTo(State::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

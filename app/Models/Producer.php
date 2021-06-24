<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Producer extends Model
{
    use HasFactory, LogsActivity;
    protected static $logName = 'producer';
    static $logFillable = true;

    protected $fillable = [
        'name',
        'activity_type_name',
        'legal_form',
        'address',
        'email',
        'mobile',
        'tel',
        'website',
        'fax',
        'enterprise_id',
        'category_id',
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

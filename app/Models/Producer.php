<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'activity_type',
        'legal_form',
        'type',
        'address',
        'email',
        'mobile',
        'tel',
        'website',
        'fax',
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
}

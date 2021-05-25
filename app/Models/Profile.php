<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Profile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'firstname',
        'lastname',
        'birthday',
        'gender',
        'position',
        'address',
        'mobile',
        'signature',
        'square_stamp',
        'round_stamp',
        'agce_user_id',
        'city_id',
        'picture',
        'language',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function city()
    {
        return $this->belongsTo(AlgeriaCity::class);
    }
}

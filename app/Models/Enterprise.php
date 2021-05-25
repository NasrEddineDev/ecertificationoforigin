<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'name_ar',
        // 'name_en',
        // 'name_fr',
        'name',
        'legal_form',
        'rc',
        'rc_number',
        'nif',
        'nif_number',
        'nis',
        'nis_number',
        'exporter_type',
        // 'export_activity_code',
        // 'address_ar',
        // 'address_en',
        // 'address_fr',
        'address',
        'email',
        'mobile',
        'tel',
        'website',
        'fax',
        'balance',
        'status',
        'user_id',
        'manager_id',
        'city_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function manager()
    {
        return $this->belongsTo(Manager::class);
    }
    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
    public function importers()
    {
        return $this->hasMany(Importer::class);
    }
    public function producers()
    {
        return $this->hasMany(Producer::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
    public function activities()
    {
        return $this->belongsToMany(Activity::class, 'enterprises_activities', 'enterprise_id', 'activity_id')
        ->using(EnterpriseActivity::class)
        ->withTimestamps();
    } 
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
    public function city()
    {
        return $this->belongsTo(AlgeriaCity::class);
    }
}
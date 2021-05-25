<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'description',
        // 'order_number', 
        'brand',
        'type', 
        'hs_code', 
        // 'net_weight',
        // 'real_weight', 
        'hs_code', 
        'measure_unit',
        'sub_category_id',
        'customs_tariff_id',
        'enterprise_id'
    ];
    public function certificates()
    {
        return $this->belongsToMany(Certificate::class, 'products_certificates', 'certificate_id', 'product_id')
        ->withPivot('package_type', 'unit_price', 'currency', 'package_count', 'package_quantity', 'description')->using(ProductCertificate::class)
        ->withTimestamps();
    }
    public function enterprise()
    {
        return $this->hasOne(Enterprise::class);
    }
    public function subCategory()
    {
        return $this->hasOne(SubCategory::class);
    }
}

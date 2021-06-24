<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Spatie\Activitylog\Traits\LogsActivity;

class ProductCertificate extends Pivot
{
    use LogsActivity;
    protected static $logName = 'productcertificate';
    static $logFillable = true;
    public $incrementing = true;
    protected $fillable = [
        'certificate_id', 
        'product_id',
        'unit_price',
        'currency',
        'package_type', 
        'package_count',
        'package_quantity', 
        'description'
    ];
}

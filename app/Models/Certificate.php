<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Certificate extends Model
{
    use HasFactory, LogsActivity;
    protected static $logName = 'certificate';
    static $logFillable = true;
    protected $fillable = [
        'code', 
        'name', 
        'original_country',
        'production_country',
        'destination_country',
        // 'producer_name',
        // 'producer_address',
        'integrity_rate',
        'status',
        'notes',
        'type',
        'shipment_type', 
        'incoterm', 
        'products_description', 
        'validation_url',
        'rejection_reason', 
        'signature_date', 
        'signed_document',
        'accumulation', 
        'accumulation_country', 
        'net_weight',
        'real_weight',
        'invoice', 
        'invoice_date', 
        'invoice_number',
        'created_pdf',
        'description',
        'enterprise_id',
        'importer_id',
        'producer_id',
        'signature_id'
    ];
    
    public function products()
    {
        return $this->belongsToMany(Product::class, 'products_certificates', 'certificate_id', 'product_id')
        ->withPivot('package_type', 'unit_price', 'currency', 'package_count', 'package_quantity', 'description')->using(ProductCertificate::class)
        ->withTimestamps();
    }
    // public function invoices()
    // {
    //     return $this->hasMany(Invoice::class);
    // }
    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    public function importer()
    {
        return $this->belongsTo(Importer::class);
    }
    public function producer()
    {
        return $this->belongsTo(Producer::class);
    }
    public function signature()
    {
        return $this->belongsTo(Signature::class);
    }
    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class);
    }  
    public function certificate()
    {
        return $this->belongsTo(Certificate::class);
    }    
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
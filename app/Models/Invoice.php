<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    use HasFactory;

    protected $fillable = [
        'service_provider_id',
        'number',
        'date'
    ];

    public function claims()
    {
        return $this->hasMany(Claim::class);
    }

    public function service_provider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }

    public static function booted()
    {
        static::deleting(function ($invoice) {
            if ($invoice->approved || $invoice->settled ){
                return false;
            }
        });
    }

   
}

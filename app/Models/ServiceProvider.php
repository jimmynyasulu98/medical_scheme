<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceProvider extends Model
{
    /** @use HasFactory<\Database\Factories\ServiceProviderFactory> */
    use HasFactory;

    public function invoices():HasMany
    {
        return $this->hasMany(Invoice::class );
    }
}

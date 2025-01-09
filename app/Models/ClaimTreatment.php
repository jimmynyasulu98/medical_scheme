<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClaimTreatment extends Model
{
    /** @use HasFactory<\Database\Factories\ClaimTreatmentFactory> */
    use HasFactory;

    protected $fillable = [
        'claim_id',
        'treatment_type',
        'description',
        'charge',
    ];
    public function claim()
    {
        return $this->belongsTo(User::class);
    }
}

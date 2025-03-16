<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    /** @use HasFactory<\Database\Factories\ClaimFactory> */
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'user_id',
        'number',
        'submitted',
        'approved',
    ];

    public function claim_treatments()
    {
        return $this->hasMany(ClaimTreatment::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function booted()
    {
        static::deleting(function ($claim) {
            if ($claim->approved){
                return false;
            }
        });
    }

}

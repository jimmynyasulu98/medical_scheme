<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dependant extends Model
{
    /** @use HasFactory<\Database\Factories\DependantFactory> */
    use HasFactory;
    public function principal_member(): BelongsTo
    {
         return $this->belongsTo(User::class, 'principal_member_id', 'id');
    }
}

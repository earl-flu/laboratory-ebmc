<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Urine extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function analyst(): BelongsTo
    {
        return $this->belongsTo(MedicalTechnologist::class, 'analyst_med_tech_id');
    }

    public function verifiedBy(): BelongsTo
    {
        return $this->belongsTo(MedicalTechnologist::class, 'verified_by_med_tech_id');
    }
}

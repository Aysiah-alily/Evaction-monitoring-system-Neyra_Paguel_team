<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FamilyMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'evacuee_id',
        'barangay_evacuee_id',
        'household_id',
        'name',
        'relationship',
        'age',
        'medical_condition',
    ];

    /**
     * Get the household that owns the family member.
     */
    public function household(): BelongsTo
    {
        return $this->belongsTo(Household::class);
    }

    /**
     * Get the barangay evacuee that owns the family member.
     */
    public function barangayEvacuee(): BelongsTo
    {
        return $this->belongsTo(BarangayEvacuee::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Household extends Model
{
    use HasFactory;

    protected $table = 'households';

    protected $fillable = [
        'household_name',
        'purok',
        'barangay_name',
        'street_name',
        'house_number',
        'head_surname',
        'head_firstname',
        'head_middlename',
        'gender',
        'civil_status',
        'age',
        'priority_status',
        'priority_indicator',
        'date_registered',
        'status',
    ];

    protected $casts = [
        'priority_indicator' => 'array',
        'date_registered' => 'date',
        'age' => 'integer',
    ];

    /**
     * Get the family members for the household.
     */
    public function familyMembers(): HasMany
    {
        return $this->hasMany(FamilyMember::class);
    }

    /**
     * Get the barangay that owns the household.
     */
    public function barangay(): BelongsTo
    {
        return $this->belongsTo(Barangay::class);
    }

    /**
     * Get the evacuation center for the household.
     */
    public function evacuationCenter(): BelongsTo
    {
        return $this->belongsTo(EvacuationCenter::class);
    }

    /**
     * Get the evacuees for the household.
     */
    public function evacuees(): HasMany
    {
        return $this->hasMany(Evacuee::class);
    }

    /**
     * Get full name of household head
     */
    public function getFullNameAttribute(): string
    {
        return trim($this->head_firstname . ' ' . $this->head_middlename . ' ' . $this->head_surname);
    }

    /**
     * Get full address
     */
    public function getFullAddressAttribute(): string
    {
        return trim($this->barangay_name . ', ' . $this->street_name . ' ' . $this->house_number);
    }

    /**
     * Get priority indicators as comma-separated string
     */
    public function getPriorityIndicatorsStringAttribute(): string
    {
        return $this->priority_indicator ? implode(', ', $this->priority_indicator) : 'None';
    }

    /**
     * Scope for high priority households
     */
    public function scopeHighPriority($query)
    {
        return $query->where('priority_status', 'High');
    }

    /**
     * Scope for moderate priority households
     */
    public function scopeModeratePriority($query)
    {
        return $query->where('priority_status', 'Moderate');
    }

    /**
     * Scope for potential evacuees (High or Moderate)
     */
    public function scopePotentialEvacuees($query)
    {
        return $query->whereIn('priority_status', ['High', 'Moderate'])
                    ->orderByRaw("FIELD(priority_status, 'High', 'Moderate')");
    }

    /**
     * Convert model to array (ensures accessors are included)
     */
    public function toArray(): array
    {
        $attributes = parent::toArray();
        
        // Ensure accessors are included
        $attributes['full_name'] = $this->full_name;
        $attributes['full_address'] = $this->full_address;
        $attributes['priority_indicators'] = $this->priority_indicators_string;
        
        return $attributes;
    }
}
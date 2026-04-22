<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evacuee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'gender',
        'center_assignment',
        'medical_condition',
        'status',
        'evacuation_center_id',
        'last_name',
        'first_name',
        'middle_name',
        'contact',
        'barangay',
        'address',
        'head_of_family',
        'evac_center',
        'date_registered',
        'family_id',
        'calamity_id',
        'household_id',
    ];

    public function calamity()
    {
        return $this->belongsTo(CalamityType::class);
    }

    public function evacuationCenter()
    {
        return $this->belongsTo(EvacuationCenter::class);
    }

    public function household()
    {
        return $this->belongsTo(Household::class);
    }

    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class);
    }
}
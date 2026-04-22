<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DafacRegistration extends Model
{
    use HasFactory;

    protected $table = 'dafac_registrations';

    protected $fillable = [
        'region_id',
        'province_id',
        'city_muni_id',
        'barangay_id',
        'surname',
        'firstname',
        'middlename',
        'gender',
        'date_of_birth',
        'age',
        'housing_status',
        'vulnerable_group',
        'housing_condition',
        'casualty',
        'health_condition',
        'date_registered',
    ];

    protected $casts = [
        'housing_status' => 'array',
        'vulnerable_group' => 'array',
        'housing_condition' => 'array',
        'casualty' => 'array',
        'health_condition' => 'array',
        'date_of_birth' => 'date',
        'date_registered' => 'date',
    ];

    // Relationships
    public function familyMembers()
    {
        return $this->hasMany(DafacFamilyMember::class, 'dafac_registration_id');
    }

    public function assistanceRecords()
    {
        return $this->hasMany(DafacAssistanceRecord::class, 'dafac_registration_id');
    }
}
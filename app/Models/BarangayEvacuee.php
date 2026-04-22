<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayEvacuee extends Model
{
    use HasFactory;

    protected $table = 'barangay_evacuees';

    protected $fillable = [
        'name',
        'age',
        'gender',
        'center_assignment',
        'purok',
        'medical_condition',
        'status',
        'family_members', // ✅ Required
    ];

    protected $casts = [
        'family_members' => 'array',
        'age' => 'integer',
    ];

    // Optional: If you want to keep the relationship for future use
    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class, 'barangay_evacuee_id');
    }
    public function getRouteKeyName()
    {
        return 'id';
    }
}
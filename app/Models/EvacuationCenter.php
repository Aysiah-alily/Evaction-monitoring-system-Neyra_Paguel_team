<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\EvacuationCenter;
use App\Models\Barangay;

class EvacuationCenter extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'barangay_id',
        'capacity',
        'address',
        'is_active',
        'status',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationships
    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }

    public function evacuees()
    {
        return $this->hasMany(Evacuee::class, 'center_id');
    }

}
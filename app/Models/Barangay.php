<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'district',
        'population',
    ];

    // Relationships
    public function evacuationCenters()
    {
        return $this->hasMany(EvacuationCenter::class);
    }

    public function evacuees()
    {
        return $this->hasMany(Evacuee::class);
    }
      /**
     * Get the households for the barangay.
     */
    public function households()
    {
        return $this->hasMany(Household::class);
    }

    
}

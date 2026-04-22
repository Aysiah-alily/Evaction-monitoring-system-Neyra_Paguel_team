<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DafacAssistanceRecord extends Model
{
    use HasFactory;

    protected $table = 'dafac_assistance_records';

    protected $fillable = [
        'dafac_registration_id',
        'date',
        'family_member',
        'type',
        'quantity',
        'cost',
        'provider',
        'signature',
    ];

    public function registration()
    {
        return $this->belongsTo(DafacRegistration::class, 'dafac_registration_id');
    }
}
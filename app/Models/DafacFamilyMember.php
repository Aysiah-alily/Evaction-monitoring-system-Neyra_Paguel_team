<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DafacFamilyMember extends Model
{
    use HasFactory;

    protected $table = 'dafac_family_members';

    protected $fillable = [
        'dafac_registration_id',
        'name',
        'relationship',
        'age',
        'gender',
        'education',
        'occupation',
        'remarks',
    ];

    public function registration()
    {
        return $this->belongsTo(DafacRegistration::class, 'dafac_registration_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalamityType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    // Relationships
    public function evacuees()
    {
        return $this->hasMany(Evacuee::class);
    }
}
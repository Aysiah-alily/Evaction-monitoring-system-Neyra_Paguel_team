<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purok extends Model
{
    use HasFactory;

    protected $fillable = [
        'barangay_name',
        'purok_name',
        'captain_name',
        'household_count',
    ];
}
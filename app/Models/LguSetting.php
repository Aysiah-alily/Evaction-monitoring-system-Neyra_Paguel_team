<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LguSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key_name',
        'value_text',
    ];

    // No relationships defined in the schema
}
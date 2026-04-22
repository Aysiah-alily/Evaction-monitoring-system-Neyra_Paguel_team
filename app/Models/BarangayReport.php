<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangayReport extends Model
{
    use HasFactory;

    protected $fillable = ['barangay_id', 'report_count'];

    public function barangay()
    {
        return $this->belongsTo(Barangay::class);
    }
}
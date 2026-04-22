<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventorySupply extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'quantity',
        'status',
        'evacuation_center_id',
        'unit',
        'notes',
    ];

    public function evacuationCenter()
    {
        return $this->belongsTo(EvacuationCenter::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function bus(): BelongsTo
    {
        return $this->belongsTo(Bus::class);
    }

    public function busRoute(): BelongsTo
    {
        return $this->belongsTo(BusRoute::class);
    }
}

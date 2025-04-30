<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bus extends Model
{
    use HasFactory;
//    protected $guarded = [''];
    public function schedule(): HasMany
    {
        return $this->hasMany(Schedule::class);
    }


    protected $fillable = [
        'bus_type',
        'plate_number',
        'description',
    ];
}

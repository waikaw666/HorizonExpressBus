<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function schedule(): HasMany{
        return $this->hasMany(Schedule::class);
    }
}

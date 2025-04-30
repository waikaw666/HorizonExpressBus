<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone_number',
        'schedule_id' ,
        'bus_route_id',

        'payment_method',
        'payment_information',
        'status',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_city',
        'to_city',
        'depart_date',
        'return_date',
        'seat_selection',
        'trip_type',
        'travelers',
        'flight_class'
    ];
}

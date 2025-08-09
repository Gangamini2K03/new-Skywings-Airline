<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Hotel extends Model
{
    use HasFactory;

protected $fillable = [
    'destination',
    'check_in',
    'check_out',
    'guests_rooms',
];
}

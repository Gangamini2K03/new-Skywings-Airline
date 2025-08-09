<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
     use HasFactory;

    protected $fillable = [
        'card_number',
        'card_holder_name',
        'expiry_date',
        'cvv',
        'card_type',
    ];
}

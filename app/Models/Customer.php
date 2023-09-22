<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'store_name',
        'program',
        'channel',
        'region',
        'city',
        'cluster',
        'store_code',
        'day',
    ];
}

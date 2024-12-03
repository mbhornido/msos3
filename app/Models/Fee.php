<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{

    protected $fillable = [
        'user_id',
        'general_fee', 
    ];

    use HasFactory;
}

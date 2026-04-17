<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SensorData extends Model
{
    protected $fillable = [
        'ph',
        'ammonia',
        'turbidity',
        'water_level'
    ];
}

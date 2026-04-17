<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedingSchedule extends Model
{
    protected $fillable = [
        'feeding_time',
        'active'
    ];
}

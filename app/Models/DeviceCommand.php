<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeviceCommand extends Model
{
    protected $fillable = [
        'command',
        'executed'
    ];
}

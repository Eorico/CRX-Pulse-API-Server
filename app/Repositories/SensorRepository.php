<?php

namespace App\Repositories;

use App\Models\SensorData;

class SensorRepository
{
    public function create(array $data) { return SensorData::create($data); }
    
}

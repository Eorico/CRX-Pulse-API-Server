<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\SensorService;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    private $sensorService;

    public function __constructor(SensorService $sensorService) { $this->sensorService = $sensorService; }

    public function store(Request $request)
    {

        $validated = $request->validate([
            'ph' => 'required|numeric',
            'ammonia' => 'required|numeric',
            'turbidity' => 'required|numeric',
            'water_level' => 'required|numeric',
        ]);

        $result = $this->sensorService->store($validated);
        return response()->json($result);
    }

}

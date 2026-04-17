<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\DeviceService;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    private $deviceService;

    public function __constructor(DeviceService $deviceService) { $this->deviceService = $deviceService; }

    public function sendCommand(Request $request) 
    {
        return response()->json(
            $this->deviceService->createCommand($request->command),
        );
    }

    public function fetchCommand() 
    {
        return response()->json(
            $this->deviceService->getPendingCommands()
        );
    }
    
    public function markExecuted($id) 
    {
        return response()->json(
            $this->deviceService->markExecuted($id)
        );
    }

}

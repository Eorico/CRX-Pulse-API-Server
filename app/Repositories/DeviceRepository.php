<?php

namespace App\Repositories;

use App\Models\DeviceCommand;

class DeviceRepository
{
    public function create(string $command) 
    { 
        return DeviceCommand::create([
            'command' => $command
        ]);
    }

    public function hasPending(string $command) 
    {
        return DeviceCommand::where('command', $command)
            ->where('execute', false)
            ->exist();
        ;
    }
}

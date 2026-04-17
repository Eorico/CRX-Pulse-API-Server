<?php

namespace App\Services;
use App\Models\DeviceCommand;

class DeviceService
{
    public function createCommand(string $command) 
    {
        return DeviceCommand::create([
            'command' => $command,
        ]);
    }

    public function getPendingCommands() 
    {
        return DeviceCommand::where('executed', false)->get();
    }

    public function markExecuted(int $id)
    {
        $cmd = DeviceCommand::findOrFail($id);
        $cmd->executed = true;
        $cmd->save();

        return $cmd;
    }
}

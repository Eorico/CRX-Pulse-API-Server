<?php

namespace App\Repositories;

use App\Models\Notification;

class NotificationRepository
{
    public function create(string $message) 
    {
        return Notification::create([
            'message' => $message
        ]);
    }

    public function getAll()
    { return Notification::latest()->get(); }
}

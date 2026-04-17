<?php

namespace App\Services;
use App\Models\FeedingSchedule;

class FeedingService
{
    public function getAll()
    {
        return FeedingSchedule::all();
    }

    public function create(string $time)
    {
        return FeedingSchedule::create([
            'feeding_time' => $time,
        ]);
    }
}

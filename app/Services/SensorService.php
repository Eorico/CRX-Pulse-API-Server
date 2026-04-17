<?php

namespace App\Services;
use App\Models\SensorData;
use App\Repositories\DeviceRepository;
use App\Repositories\NotificationRepository;
use App\Repositories\SensorRepository;

class SensorService
{
    private $sensorRepo;
    private $deviceRepo;

    private $notificationRepo;

    public function __constructor(
        SensorRepository $sensorRepo,
        DeviceRepository $deviceRepo,
        NotificationRepository $notificationRepo
    ) 
    { $this->sensorRepo = $sensorRepo; $this->deviceRepo = $deviceRepo; $this->notificationRepo = $notificationRepo;}

    public function store(array $data) 
    {
        $sensor = $this->sensorRepo->create($data);
        $alerts = $this->checkThresholds($sensor);

        return [
            'data' => $sensor,
            'alerts' => $alerts,
        ];
    }

    public function checkThresholds(SensorData $sensor)
    {
        $alerts = [];

        if ($sensor->ammonia > 0.5) {
            $message = "High ammonia detected";

            $alerts[] = $message;

            $this->deviceRepo->create('filter_on');
            $this->notificationRepo->create($message);
        }

        if ($sensor->ph < 6.5 || $sensor->ph > 8.5) {
            $message[] = "pH out of range";
            $alerts[] = $message;
            $this->notificationRepo->create($message);
        }

        if ($sensor->turbidity > 50) {
            $message[] = "High turbidity";
            $alerts[] = $message;
            $this->notificationRepo->create($message);
        }

        return $alerts;
    }
}

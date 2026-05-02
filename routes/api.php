<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\FeedingController;
use App\Http\Controllers\Api\SensorController;
<<<<<<< HEAD
=======
use Illuminate\Http\Request;
>>>>>>> 0993d1e554db386a38ebd4673f2b703f462966c2
use Illuminate\Support\Facades\Route;


/* Routes => group route*/
<<<<<<< HEAD

/*
    api/auth/register
    api/auth/login
*/
Route::prefix('auth')
    ->group(function () 
    {
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
    });

/*
    api/sensor/
    api/sensor/latest

    api/feeding/

    api/device/command
    api/device/commands
    api/device/commands/{id}/done
*/
=======
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

>>>>>>> 0993d1e554db386a38ebd4673f2b703f462966c2
Route::middleware('auth:sanctum')
    ->group(function () 
    {
        Route::prefix('sensor')
            ->group(function () 
            {
                Route::get('/', [SensorController::class, 'store']);
                Route::post('/latest', [SensorController::class, 'latest']);
            });

        Route::prefix('feeding')
            ->group(function () 
            {
                Route::get('/', [FeedingController::class, 'index']);
                Route::post('/', [FeedingController::class, 'store']);
            });

        Route::prefix('device')
            ->group(function () 
            {
                Route::post('/command', [DeviceController::class, 'sendCommand']);
                Route::get('/commands', [DeviceController::class, 'fetchCommands']);
                Route::post('/commands/{id}/done', [DeviceController::class, 'markExecuted']);
            });
    });
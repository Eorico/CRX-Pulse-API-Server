<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\FeedingController;
use App\Http\Controllers\Api\SensorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/* Routes => group route*/
Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

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
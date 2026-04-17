<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\FeedingService;
use Illuminate\Http\Request;

class FeedingController extends Controller
{
    private $feedingService;

    public function __constructor(FeedingService $feedingService) { $this->feedingService = $feedingService; }

    public function index() 
    {
        return response()->json(
            $this->feedingService->getAll(),
        );
    }

    public function store(Request $request) 
    {
        return response()->json(
            $this->feedingService->create($request->feeding_time),
        );
    }

}

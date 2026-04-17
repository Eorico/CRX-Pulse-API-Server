<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $authService;

    public function __constructor(AuthService $authService) { $this->authService = $authService; }

    public function register(Request $request) 
    {
        $token = $this->authService->register($request->all());
        return response()->json(['token' => $token]);
    }

    public function login(Request $request)
    {
        $token = $this->authService->login($request->all());
        if (!$token) { return response()->json(['message' => 'Invalid Credentials']); }

        return response()->json(['token' => $token]);
    }
}

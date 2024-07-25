<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;
use App\Traits\WithApiResponses;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use WithApiResponses;

    private AuthService $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request)
    {
        $request->authenticate();

        if (!auth()->attempt($request->only('email', 'password'))) {
            return $this->error('Invalid credentials', 401);
        }

        $token = $this->authService->login($request->only('email', 'password'));

        return $this->ok(['token' => $token], 'Login successful');
    }
}

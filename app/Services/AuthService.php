<?php

namespace App\Services;

use App\Models\User;
use App\Traits\WithApiResponses;

class AuthService
{
    public function login($validated)
    {
        $user = User::where('email', $validated->email)->first();

        $token = $user->createToken('auth_token')->plainTextToken;

        return $token;
    }
}

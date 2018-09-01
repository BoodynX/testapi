<?php

namespace App\User\Api\Controllers;

use App\Framework\Http\Controllers\Controller;
use App\Core\Infrastructure\Models\User;
use App\User\Api\Requests\LoginRequest;
use App\User\Api\Requests\RegistrationRequest;

class AuthController extends Controller
{
    public function register(RegistrationRequest $request)
    {
        $user = User::create([$request->credentials()]);
        $token = auth()->login($user);

        return $this->respondWithToken($token);
    }

    public function login(LoginRequest $request)
    {
        if (!$token = auth()->attempt($request->credentials())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}

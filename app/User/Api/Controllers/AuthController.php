<?php

namespace App\User\Api\Controllers;

use App\Framework\Http\Controllers\Controller;
use App\User\Api\Requests\LoginRequest;
use App\User\Api\Requests\RegistrationRequest;
use App\User\Application\RegistrationHandler;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function register(RegistrationRequest $request, RegistrationHandler $registrationHandler)
    {
        $token = $registrationHandler->handle($request->toCommand());

        return $this->respondWithToken($token);
    }

    public function login(LoginRequest $request)
    {
        if (!$token = auth()->attempt($request->credentials())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}

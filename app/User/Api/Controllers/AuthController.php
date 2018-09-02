<?php

namespace App\User\Api\Controllers;

use App\Framework\Http\Controllers\Controller;
use App\User\Api\Requests\LoginRequest;
use App\User\Api\Requests\RegistrationRequest;
use App\User\Application\LogInHandler;
use App\User\Application\RegistrationHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(RegistrationRequest $request, RegistrationHandler $registrationHandler)
    {
        $registrationHandler->handle($request->toCommand());

        return $this->respond();
    }

    public function login(LoginRequest $request, LogInHandler $logInHandler)
    {
        $logInHandler->handle($request->toCommand());

        return $this->respond();
    }

    protected function respond(): JsonResponse
    {
        if (!$token = auth()->tokenById(Auth::id())) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}

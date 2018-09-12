<?php

namespace App\User\Api\Controllers;

use App\Framework\Http\Controllers\Controller;
use App\User\Api\Requests\LoginRequest;
use App\User\Api\Requests\RegistrationRequest;
use App\User\Application\Commands\LogIn;
use App\User\Application\Handlers\LogInHandler;
use App\User\Application\Handlers\RegistrationHandler;
use App\User\Domain\ValueObjects\Email;
use App\User\Domain\ValueObjects\Password;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /** @var LogInHandler */
    private $logInHandler;

    public function __construct(LogInHandler $logInHandler)
    {
        $this->logInHandler = $logInHandler;
    }

    public function register(RegistrationRequest $request, RegistrationHandler $registrationHandler)
    {
        $registrationHandler->handle($request->toCommand());
        $logIn = new LogIn(new Email($request->email), new Password($request->password));
        $this->logInHandler->handle($logIn);

        return $this->respond();
    }

    public function login(LoginRequest $request)
    {
        $this->logInHandler->handle($request->toCommand());

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

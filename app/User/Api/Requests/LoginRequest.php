<?php

namespace App\User\Api\Requests;

use App\Core\Api\Requests\ApiRequest;
use App\User\Application\Commands\LogIn;
use App\User\Domain\ValueObjects\Email;
use App\User\Domain\ValueObjects\Password;

class LoginRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string'
        ];
    }

    public function toCommand(): LogIn
    {
        return new LogIn(new Email($this->email), new Password($this->password));
    }
}

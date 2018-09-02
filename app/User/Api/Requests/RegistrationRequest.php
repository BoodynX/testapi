<?php

namespace App\User\Api\Requests;

use App\Core\Api\Requests\ApiRequest;
use App\User\Domain\ValueObjects\Email;
use App\User\Domain\ValueObjects\Password;
use App\User\Application\Register;

class RegistrationRequest extends ApiRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string'
        ];
    }

    public function toCommand(): Register
    {
        return new Register(
            new Email($this->email),
            new Password($this->password),
            $this->name
        );
    }
}

<?php

namespace App\User\Api\Requests;

use App\Core\Api\Requests\ApiRequest;
use App\User\Domain\ValueObjects\Password;
use App\User\Application\Register;
use WMDE\EmailAddress\EmailAddress;

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
            new EmailAddress($this->email),
            new Password($this->password),
            $this->name
        );
    }
}

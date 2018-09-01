<?php

namespace App\User\Api\Requests;

use App\Core\Api\Requests\ApiRequest;

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

    public function credentials(): array
    {
        return [
          'email' => $this->email,
          'password' => $this->password
        ];
    }
}

<?php

namespace App\User\Api\Requests;

use App\Core\Api\Requests\ApiRequest;

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
            'email' => 'required|string|email|max:255|unique:User',
            'password' => 'required|string'
        ];
    }

    public function credentials(): array
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ];
    }
}

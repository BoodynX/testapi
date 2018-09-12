<?php

namespace App\User\Domain;

use App\User\Domain\ValueObjects\Password;

class UserWasLoggedIn
{
    /** @var Password */
    private $password;

    public function __construct(Password $password)
    {
        $this->password = $password;
    }

    public function password(): Password
    {
        return $this->password;
    }
}

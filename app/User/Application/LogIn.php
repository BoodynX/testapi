<?php

namespace App\User\Application;

use App\User\Domain\ValueObjects\Email;
use App\User\Domain\ValueObjects\Password;

final class LogIn
{
    /** @var Email */
    private $email;

    /** @var Password */
    private $password;

    public function __construct(Email $email, Password $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }
}

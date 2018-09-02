<?php

namespace App\User\Application;

use App\User\Domain\ValueObjects\Email;

final class LogIn
{
    private $email;
    private $password;

    public function __construct(Email $email, string $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function getNickname(): Email
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}

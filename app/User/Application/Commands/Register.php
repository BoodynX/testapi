<?php

namespace App\User\Application\Commands;

use App\User\Domain\ValueObjects\Email;
use App\User\Domain\ValueObjects\Password;

final class Register
{
    /** @var Email */
    private $email;

    /** @var Password */
    private $password;

    /** @var string */
    private $name;

    public function __construct(Email $email, Password $password, string $name)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPassword(): Password
    {
        return $this->password;
    }

    public function getName(): string
    {
        return $this->name;
    }
}

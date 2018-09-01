<?php

namespace App\User\Application;

use App\User\Domain\ValueObjects\Password;
use WMDE\EmailAddress\EmailAddress;

final class Register
{
    /** @var EmailAddress */
    private $email;

    /** @var Password */
    private $password;

    /** @var string */
    private $name;

    public function __construct(EmailAddress $email, Password $password, string $name)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
    }

    public function getEmail(): EmailAddress
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

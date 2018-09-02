<?php

namespace App\User\Domain;

use App\User\Domain\ValueObjects\Email;
use App\User\Domain\ValueObjects\Password;

final class User
{
    private $id;
    private $email;
    private $password;
    private $name;

    public function __construct(
        ?int $id,
        Email $email,
        Password $password,
        string $name
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
    }

    public static function registrable(Email $email, Password $password, string $name): User
    {
        return new User(
            null,
            $email,
            $password,
            $name
        );
    }

    public function getId(): int
    {
        return $this->id;
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

    public function logIn(Password $password): void
    {

    }
}

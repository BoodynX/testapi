<?php

namespace App\User\Domain;

use App\User\Domain\ValueObjects\Email;
use App\User\Domain\ValueObjects\Password;

final class User
{
    /** @var int|null */
    private $id;

    /** @var Email */
    private $email;

    /** @var string */
    private $passwordHash;

    /** @var string */
    private $name;

    public function __construct(
        ?int $id,
        Email $email,
        string $password,
        string $name
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->passwordHash = bcrypt($password);
        $this->name = $name;
    }

    public static function registrable(Email $email, Password $password, string $name): User
    {
        return new User(
            null,
            $email,
            $password->toNative(),
            $name
        );
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordHash;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function logIn(Password $password): void
    {
        auth()->attempt([
            'email' => $this->getEmail()->getFullAddress(),
            'password' => $password->toNative()
        ]);
    }
}

<?php

namespace App\User\Domain;

use App\User\Domain\ValueObjects\Email;
use App\User\Domain\ValueObjects\Password;
use Carbon\Carbon;

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

    /** @var array */
    private $recordedEvents = [];

    /** @var Carbon|null */
    private $lastFailedLoginAttempt = null;

    /** @var int */
    private $failedLoginAttempts = 0;

    public static function registrable(Email $email, Password $password, string $name): User
    {
        return new User(
            null,
            $email,
            $password->generateHash(),
            $name
        );
    }

    public function __construct(
        ?int $id,
        Email $email,
        string $passwordHash,
        string $name
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->passwordHash = $passwordHash;
        $this->name = $name;
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
        if (!password_verify($password->toNative(), $this->passwordHash)) {
            $this->lastFailedLoginAttempt = Carbon::now();
            $this->failedLoginAttempts++;
            return;
        }
        $this->failedLoginAttempts = 0;
        $this->lastFailedLoginAttempt = null;
        $this->recordedEvents[] = new UserWasLoggedIn($password);
    }

    public function getRecordedEvents(): array
    {
        return $this->recordedEvents;
    }

    public function clearRecordedEvents(): void
    {
        $this->recordedEvents = [];
    }
}
